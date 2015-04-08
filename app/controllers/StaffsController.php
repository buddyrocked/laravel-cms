<?php

class StaffsController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','staff-list');
	}

	/**
	 * Display a listing of staffs
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = 'List staffs';

		$schedules = Schedule::orderBy('id', 'DESC')->paginate(5);
		$staffs = Staff::orderBy('id','DESC');

		if(Input::has('name')):
			$staffs->where('name','like','%'.Input::get('name').'%');
			$staffs = $staffs->paginate(10);
			$pagination = $staffs->appends(array('name'=>Input::get('name')))->links();
		else:
			$staffs = $staffs->paginate(10);
			$pagination = $staffs->links();
		endif;

		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List staffs',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('staffs.index', compact('staffs', 'pagination', 'schedules'));
	}

	/**
	 * Show the form for creating a new staff
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New staff';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List staffs',
									            'link' => URL::route('staff-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Staff',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$groups = Sentry::getGroupProvider()->findAll();
		$currentUser = Sentry::getUser();
		$this->layout->content = View::make('staffs.create', compact('groups', 'currentUser'));
	}

	/**
	 * Store a newly created staff in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Staff::$rules);

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
				$path = public_path('profile/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
				$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																    $constraint->aspectRatio();
																})->save($path);
				//UPLOAD IMAGE
				$file->move(public_path().'/profile', $new_file_name.'.'.$file->getClientOriginalExtension());
				$data['file'] = $new_file_name.'.'.$file->getClientOriginalExtension();				
			endif;
		endif;
		Staff::create($data);
		if(Input::has('user')):
			// create user
			$data_user = Input::get('user');
	        $user = Sentry::getUserProvider()->create(array(
	            'email'    => $data_user['email'],
	            'password' => $data_user['password'],
	            'username' => $data_user['username'],
	            'last_name' => (string)'-',
	            'first_name' => (string)Input::get('name'),
	        ));

	        $data['user_id'] = $user->id;

	    	$activationCode = $user->getActivationCode();
            if(Config::get('syntara::config.user-activation') === 'auto') {
                $user->attemptActivation($activationCode);
            }

	    	$groups = Input::get('groups');
            if(isset($groups) && is_array($groups)) {
                foreach($groups as $groupId) {
                    $group = Sentry::getGroupProvider()->findById($groupId);
                    $user->addGroup($group);
                }
            }
	    endif;

	    Staff::create($data);

		Session::flash('message', 'Input Berhasil.');
		return Redirect::route('staff-list');
	}

	/**
	 * Display the specified staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$staff = Staff::findOrFail($id);
		$this->layout->title = 'detail staffs';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Staffs',
									            'link' => URL::route('staff-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit staff - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('staffs.show', compact('staff'));
	}

	/**
	 * Show the form for editing the specified staff.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$staff = Staff::find($id);
		$this->layout->title = 'edit staff';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Staffs',
									            'link' => URL::route('staff-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit staff - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$currentUser = Sentry::getUser();
		$current_groups = array();
		if($staff->user_id != 0):
			$user = Sentry::findUserById($staff->user_id);
			$currentGroups = $user->getGroups();
	    	foreach ($currentGroups as $cg) {
	    		$current_groups[] = $cg->id;
	    	}
	    endif;
		$groups = Sentry::getGroupProvider()->findAll();
		
		$this->layout->content = View::make('staffs.edit', compact('staff', 'groups', 'currentUser', 'current_groups'));
	}

	/**
	 * Update the specified staff in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$staff = Staff::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Staff::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('file')):
			$file = Input::file('file');
			if($file->isValid()):
				//REMOVE OLD FILE
				if($staff->file != '' && file_exists(public_path('profile/'.$staff->file))) unlink(public_path('profile/'.$staff->file));
				if($staff->file != '' && file_exists(public_path('profile/'.'thumb_'.$staff->file))) unlink(public_path('profile/'.'thumb_'.$staff->file));
				//NEW FILENAME
				$ext = $file->getClientOriginalExtension();
				$new_file_name = sha1(uniqid(mt_rand(), true));
				//THUMB IMAGE
				$path = public_path('profile/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
				$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																    $constraint->aspectRatio();
																})->save($path);				//UPLOAD IMAGE
				$file->move(public_path().'/profile', $new_file_name.'.'.$file->getClientOriginalExtension());
				$data['file'] = $new_file_name.'.'.$file->getClientOriginalExtension();
			endif;
		else:
			$data['file'] = $staff->file;
		endif;

		if(Input::has('user')):
			$data_user = Input::get('user');
			if($data_user['id'] == 0):
				// create user
		        $user = Sentry::getUserProvider()->create(array(
		            'email'    => $data_user['email'],
		            'password' => $data_user['password'],
		            'username' => $data_user['username'],
		            'last_name' => (string)'-',
		            'first_name' => (string)Input::get('name'),
		        ));

		        $data['user_id'] = $user->id;

		    	$activationCode = $user->getActivationCode();
	            if(Config::get('syntara::config.user-activation') === 'auto') {
	                $user->attemptActivation($activationCode);
	            };

		    	$groups = Input::get('groups');
	            if(isset($groups) && is_array($groups)) {
	                foreach($groups as $groupId) {
	                    $group = Sentry::getGroupProvider()->findById($groupId);
	                    $user->addGroup($group);
	                };
	            };
	        else:
	        	$user = Sentry::findUserById($data_user['id']);
	        	$user->email = $data_user['email'];
	        	$user->username = $data_user['username'];
	        	$user->password = $data_user['password'];
	        	$user->save();

	        	$data['user_id'] = $user->id;

	        	$currentGroups = $user->getGroups();
	        	
	        	foreach ($currentGroups as $cg) {
	        		$user->removeGroup($cg);
	        	}

	        	$groups = Input::get('groups');
	            if(isset($groups) && is_array($groups)) {
	                foreach($groups as $groupId) {
	                    $group = Sentry::findGroupById($groupId);
	                    $user->addGroup($group);
	                }
	            }
	        endif;
	    endif;

		$staff->update($data);

		Session::flash('message', 'Update Berhasil');
		return Redirect::route('staff-list');
	}

	/**
	 * Remove the specified staff from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Staff::destroy($id);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('staff-list');
	}

}
