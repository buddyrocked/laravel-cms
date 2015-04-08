<?php

class SchedulesController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','schedules-list');
	}

	/**
	 * Display a listing of schedules
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = 'List schedules';

		$staffs = Staff::orderBy('id', 'DESC')->paginate(5);
		$schedules = Schedule::orderBy('id','DESC');
		if(Input::has('place')):
			$schedules->where('place','like','%'.Input::get('place').'%');
			$schedules = $schedules->paginate(10);
			$pagination = $schedules->appends(array('place'=>Input::get('place')))->links();
		else:
			$schedules = $schedules->paginate(10);
			$pagination = $schedules->links();
		endif;

		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List schedules',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('schedules.index', compact('schedules', 'pagination', 'staffs'));
	}

	/**
	 * Display count of the resource.
	 *
	 * @return Response JSON
	 */
	public function countSchedules(){

		$result = DB::select("SELECT  
			                     SUM(CASE WHEN  MONTH(s.date_start) = 1 THEN 1 ELSE 0 END) January
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 2 THEN 1 ELSE 0 END) Feburary
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 3 THEN 1 ELSE 0 END) March
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 4 THEN 1 ELSE 0 END) April
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 5 THEN 1 ELSE 0 END) May
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 6 THEN 1 ELSE 0 END) June
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 7 THEN 1 ELSE 0 END) July
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 8 THEN 1 ELSE 0 END) August
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 9 THEN 1 ELSE 0 END) September
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 10 THEN 1 ELSE 0 END) October
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 11 THEN 1 ELSE 0 END) November
			                   , SUM(CASE WHEN  MONTH(s.date_start) = 12 THEN 1 ELSE 0 END) December
			            FROM schedules s
			            WHERE DATE_FORMAT(s.date_start,'%Y') =?", array(date('Y')));
		
		$data = array();
		foreach ($result[0] as $key => $value):
			$dt = array();
			$dt['key'] = $key;
			$dt['value'] = $value;
			$dt['color'] = "#ea5a5a";			
			$data[] = $dt;
		endforeach;
		return Response::json($data);
	}
	

	/**
	 * Show the form for creating a new schedule
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New schedule';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List schedules',
									            'link' => URL::route('schedule-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Post',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('schedules.create');
	}

	/**
	 * Store a newly created schedule in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Schedule::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('file')):
			$file = Input::file('file');
			if($file->isValid()):
				$ext = $file->getClientOriginalExtension();
				$new_file_name = sha1(uniqid(mt_rand(), true));
				//THUMB IMAGE
				$path = public_path('schedule/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
				$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																    $constraint->aspectRatio();
																})->save($path);
				//UPLOAD IMAGE
				$file->move(public_path().'/schedule', $new_file_name.'.'.$file->getClientOriginalExtension());
				$data['file'] = $new_file_name.'.'.$file->getClientOriginalExtension();				
			endif;
		endif;

		Schedule::create($data);

		Session::flash('message', 'Input Berhasil.');
		return Redirect::route('schedule-list');
	}

	/**
	 * Display the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$schedule = Schedule::findOrFail($id);
		$this->layout->title = 'detail schedules';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('schedule-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit schedule - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('schedules.show', compact('schedule'));
	}

	/**
	 * Show the form for editing the specified schedule.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$schedule = Schedule::find($id);
		$this->layout->title = 'edit schedule';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('schedule-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit schedule - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );

		$this->layout->content = View::make('schedules.edit', compact('schedule'));
	}

	/**
	 * Update the specified schedule in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$schedule = Schedule::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Schedule::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('file')):
			$file = Input::file('file');
			if($file->isValid()):
				//REMOVE OLD FILE
				if(file_exists(public_path('schedule/'.$staff->file))) unlink(public_path('schedule/'.$staff->file));
				if(file_exists(public_path('schedule/'.'thumb_'.$staff->file))) unlink(public_path('schedule/'.'thumb_'.$staff->file));
				//NEW FILENAME
				$ext = $file->getClientOriginalExtension();
				$new_file_name = sha1(uniqid(mt_rand(), true));
				//THUMB IMAGE
				$path = public_path('schedule/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
				$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																    $constraint->aspectRatio();
																})->save($path);				//UPLOAD IMAGE
				$file->move(public_path().'/schedule', $new_file_name.'.'.$file->getClientOriginalExtension());
				$data['file'] = $new_file_name.'.'.$file->getClientOriginalExtension();
			endif;
		endif;

		$schedule->update($data);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('schedule-list');
	}

	/**
	 * Remove the specified schedule from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Schedule::destroy($id);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('schedule-list');
	}

}
