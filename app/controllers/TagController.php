<?php

class TagController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','tag-list');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::orderBy('id', 'ASC');
		if(Input::has('name')){
			$tags->where('name', 'like', '%'.Input::get('name').'%');
			$tags = $tags->paginate(10);
			$pagination = $tags->appends(array('name'=>Input::get('name')))->links();
		}else{
			$tags = $tags->paginate(10);
			$pagination = $tags->links();
		}

		$this->layout->title = 'List Tag';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Tag',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('tags.index')->with(array('tags'=>$tags, 'pagination'=>$pagination));
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New Tag';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Tag',
									            'link' => URL::route('tag-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Tag',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('tags.create');
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
			return Redirect::route('tag-create')->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$tag = new Tag;
			$tag->name = Input::get('name');
			$tag->save();

			Session::flash('message', 'Input Berhasil..!!');
			return Redirect::route('tag-list');
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
		$tag = Tag::find($id);
		$this->layout->title = 'Show category';
		$this->layout->content = View::make('tags.show')->with('tag', $tag);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tag = Tag::find($id);
		$this->layout->title = 'edit category';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Tag',
									            'link' => URL::route('tag-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit Tag - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('tags.edit')->with('tag', $tag);
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
			return Redirect::route('tag-edit', $id)->withErrors($validator)->withInput(Input::except('password'));
		}else{
			$tag = Tag::find($id);
			$tag->name = Input::get('name');
			$tag->save();

			Session::flash('message', 'Update Berhasil');
			return Redirect::route('tag-list');
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
		$tag = Tag::find($id);
		$tag->delete();
		Session::flash('message', 'Delete Berhasil');
		return Redirect::route('tag-list');
	}

	/**
	 * Show list tag json.
	 *
	 * @return Response
	 */
	public function autocomplete()
	{
		$tag = Tag::where('name','like','%'.Input::get('term').'%')->get();
		$tags = array();
		foreach ($tag as $key => $value) {
			$tags[] = array('id'=>$value->id, 'label'=>$value->name, 'value'=>$value->name);
		}
		return Response::json($tags);
	}

}
