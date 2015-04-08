<?php

class SettingController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','setting-list');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = Setting::orderBy('id', 'ASC');
		if(Input::has('name')):
			$settings->where('name', 'like', '%'.Input::get('name').'%');
			$settings = $settings->paginate(10);
			$pagination = $settings->appends(array('name'=>Input::get('name')))->links();
		else:
			$settings = $settings->paginate(10);
			$pagination = $settings->links();
		endif;
		$this->layout->title = 'List Setting';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Setting',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('settings.index')->with(array('settings'=>$settings, 'pagination'=>$pagination));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New Setting';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Setting',
									            'link' => URL::route('setting-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Setting',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('settings.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'key'=>'required',
			'value'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('setting-create')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$setting = new Setting;
			$setting->key = Input::get('key');
			$setting->value = Input::get('value');
			$setting->save();

			Session::flash('message', 'Input Berhasil');
			return Redirect::route('setting-list');
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$setting = Setting::find($id);
		$this->layout->title = 'edit setting';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Setting',
									            'link' => URL::route('setting-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit Setting - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('settings.edit')->with('setting',$setting);
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
			'key'=>'required',
			'value'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('setting-edit', $id)->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$setting = Setting::find($id);
			$setting->key = Input::get('key');
			$setting->value = Input::get('value');
			$setting->save();

			Session::flash('message', 'Update Berhasil');
			return Redirect::route('setting-list');
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
		$setting = Setting::find($id);
		$setting->delete();
		Session::flash('message', 'Delete Berhasil');
		return Redirect::route('setting-list');
	}


}
