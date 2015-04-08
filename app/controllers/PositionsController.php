<?php

class PositionsController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','position-list');
	}

	/**
	 * Display a listing of positions
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = 'List positions';

		$positions = Position::orderBy('id','ASC');

		if(Input::has('name')):
			$positions->where('name','like','%'.Input::get('name').'%');
			$positions = $positions->paginate(10);
			$pagination = $positions->appends(array('name'=>Input::get('name')))->links();
		else:
			$positions = $positions->paginate(10);
			$pagination = $positions->links();
		endif;

		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List positions',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('positions.index', compact('positions', 'pagination'));
	}

	/**
	 * Show the form for creating a new position
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New positions';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Position',
									            'link' => URL::route('position-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Position',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('positions.create');
	}

	/**
	 * Store a newly created position in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Position::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Position::create($data);

		Session::flash('message', 'Input Berhasil.');
		return Redirect::route('position-list');
	}

	/**
	 * Display the specified position.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$position = Position::findOrFail($id);
		$this->layout->title = 'detail positions';
		$this->layout->content = View::make('positions.show', compact('position'));
	}

	/**
	 * Show the form for editing the specified position.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$position = Position::find($id);
		$this->layout->title = 'edit post';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('position-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit position - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );

		$this->layout->content = View::make('positions.edit', compact('position'));
	}

	/**
	 * Update the specified position in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$position = Position::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Position::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$position->update($data);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('position-list');
	}

	/**
	 * Remove the specified position from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Position::destroy($id);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('positions.index');
	}

}
