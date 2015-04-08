<?php

class CategoryController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','category-list');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Category::orderBy('id', 'ASC');
		if(Input::has('name')):
			$categories->where('name', 'like', '%'.Input::get('name').'%');
			$categories = $categories->paginate(10);
			$pagination = $categories->appends(array('name'=>Input::get('name')))->links();
		else:
			$categories = $categories->paginate(10);
			$pagination = $categories->links();
		endif;
		$this->layout->title = 'List Category';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Category',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('category.index')->with(array('categories'=>$categories, 'pagination'=>$pagination));
	}

	/**
	 * Display count of the resource.
	 *
	 * @return Response JSON
	 */
	public function countArticles()
	{
		$categories = Category::orderBy('id', 'ASC')->get();
		$data = array();
		foreach ($categories as $value) {
			$dt = array();
			$dt['key'] = $value->name;
			$dt['value'] = $value->posts->count();
			$dt['color'] = "#16A085";			
			$data[] = $dt;
		}

		return Response::json($data);
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New Category';
		$this->layout->content = View::make('category.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('category-create')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$category = new Category;
			$category->name = Input::get('name');
			$category->save();

			Session::flash('message', 'Input Berhasil');
			return Redirect::route('category-list');
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
		$category = Category::find($id);
		$this->layout->title = 'edit category';
		$this->layout->content = View::make('category.edit')->with('category', $category);
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
			'name'=>'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('category-edit', $id)->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$category = Category::find($id);
			$category->name = Input::get('name');
			$category->save();
			Session::flash('message', 'Update Berhasil');
			return Redirect::route('category-list');
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
		$category = Category::find($id);
		$category->delete();
		Session::flash('message', 'Delete Berhasil');
		return Redirect::route('category-list');
	}


}
