<?php

class UserController extends \BaseController {

	public $layout;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::orderBy('id', 'ASC');
		if(Input::has('name')):
			$users->where('name', 'like', '%'.Input::get('name').'%');
			$users = $users->paginate(1);
			$pagination = $users->appends(array('name'=>Input::get('name')))->links();
		else:
			$users = $users->paginate(1);
			$pagination = $users->links();
		endif;
		return View::make('user.index')->with(array('users'=>$users, 'pagination'=>$pagination));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'required|email',
			'password'=>'required',
			'activated'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('user/create')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->activated = Input::get('activated');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', 'Input Berhasil');
			return Redirect::to('user');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		return View::make('user.show')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('user.edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'first_name'=>'required',
			'last_name'=>'required',
			'email'=>'required|email',
			'password'=>'required',
			'activated'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('user/'.$id.'/edit')->withErrors($validator)->withInput(Input::except('password'));
		} else {
			$user = User::find($id);
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->activated = Input::get('activated');
			$user->password = Hash::make(Input::get('password'));
			$user->save();

			Session::flash('message', 'Update Berhasil');
			return Redirect::to('user');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Delete Berhasil');
		return Redirect::to('user'); 
	}

	/**
	 * Show login form.
	 *
	 *
	 * @return Response
	 */
	public function login()
	{
		$this->layout = View::make('layouts.budi-layout.login');
		$this->layout->title = 'Login';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Post',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('user.login');
	}

	/**
	 * proccess login.
	 *
	 * @return Response
	 */
	public function doLogin(){
		$rules = array(
			'username'=>'required',
			'password'=>'required|alphaNum|min:3'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			try 
			{
				$userdata = array(
					'username'=>Input::get('username'),
					'password'=>Input::get('password')
				);
				if(Sentry::authenticate($userdata, true)){
					if(Input::has('remember_token')):
						Sentry::authenticateAndRemember($userdata);
					endif;
					Session::flash('message', 'Login Sukses');
					return Redirect::intended();	
				}
			} 
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				Session::flash('message', 'username field is required');
				return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
			    Session::flash('message', 'Password field is required');
				return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
			    Session::flash('message', 'Wrong Password');
				return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
			    Session::flash('message', 'User was not found');
				return Redirect::route('login');
			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
			    Session::flash('message', 'User is not activated');
				return Redirect::route('login');
			}

			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
			    Session::flash('message', 'User is suspended');
				return Redirect::route('login');
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
			    Session::flash('message', 'User is banned');
				return Redirect::route('login')->withErrors($validator)->withInput(Input::except('password'));
			}
		}
	}

	/**
	 * proccess login.
	 *
	 * @return Response
	 */
	public function doLogout(){
		Sentry::logout();
		return Redirect::to('login');
	}




}
