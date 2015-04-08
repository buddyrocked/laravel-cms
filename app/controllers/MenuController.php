<?php

class MenuController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','menu-list');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->layout->title = 'List Menu';
		$menus = Menus::orderBy('id', 'ASC')->orderBy('parent_id', 'ASC');
		if (Input::has('title')) {
			$menus->where('title', 'like', '%'.Input::get('title').'%');
			$menus = $menus->paginate(10);
			$pagination = $menus->appends(array('title'=>Input::get('title')))->links();
		} else {
			$menus = $menus->paginate(10);
			$pagination = $menus->links();
		}
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Menu',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('menus.index')->with(array('menus'=>$menus, 'pagination'=>$pagination));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New Menu';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Menu',
									            'link' => URL::route('menu-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Post',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$groups = Sentry::getGroupProvider()->findAll();
		$this->layout->content = View::make('menus.create', compact(array('groups')));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title'=>'required',
			'url'=>'required',
			'parent_id'=>'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()){
			return Redirect::route('menu-create')->withErrors($validator)->withInput();
		} else {
			$menu = New Menus;
			$menu->title = Input::get('title');
			$menu->url = Input::get('url');
			$menu->parent_id = Input::get('parent_id');
			$menu->icon = Input::get('icon');
			$menu->class = Input::get('class');
			$menu->order = Input::get('order');
			$menu->disable = Input::get('disable');
			$menu->save();

			$groups = Input::get('groups');
            if(isset($groups) && is_array($groups)){
            	foreach($groups as $group):
	            	$GroupMenu = new GroupMenu;
	            	$GroupMenu->group_id = $group;
	            	$GroupMenu->menu_id = $menu->id;
	            	$GroupMenu->save();
	            endforeach;
            }

			Session::flash('message', 'Input Berhasil');
			return Redirect::route('menu-list');
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
		$menu = Menus::find($id);
		$this->layout->title = 'edit post';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Menu',
									            'link' => URL::route('menu-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit Menu - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$groups = Sentry::getGroupProvider()->findAll();
		$current_group = array();
		
		foreach($menu->groupmenus as $gm):
			$current_group[] = $gm->group_id;
		endforeach;
		
		$this->layout->content = View::make('menus.edit', compact(array('menu', 'groups', 'current_group')));
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
			'title'=>'required',
			'url'=>'required',
			'parent_id'=>'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()){
			return Redirect::route('menu-edit', $id)->withErrors($validator)->withInput();
		} else {
			$menu = Menus::find($id);
			$menu->title = Input::get('title');
			$menu->url = Input::get('url');
			$menu->parent_id = Input::get('parent_id');
			$menu->icon = Input::get('icon');
			$menu->class = Input::get('class');
			$menu->order = Input::get('order');
			$menu->disable = Input::get('disable');
			$menu->save();

			$groups = Input::get('groups');
            if(isset($groups) && is_array($groups)){
            	GroupMenu::where('menu_id', '=', $menu->id)->delete();
            	foreach ($groups as $group):
	            	$GroupMenu = new GroupMenu;
	            	$GroupMenu->group_id = $group;
	            	$GroupMenu->menu_id = $menu->id;
	            	$GroupMenu->save();
	            endforeach;
            }

			Session::flash('message', 'Input Berhasil');
			return Redirect::route('menu-list');
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
		//
	}


}
