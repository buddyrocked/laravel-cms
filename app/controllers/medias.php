<?php

class Medias extends \BaseController {

	/**
	 * Display a listing of medias
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = 'List medias';

		$medias = Media::orderBy('id','ASC');

		if(Input::has('name')):
			$medias->where('name','like','%'.Input::get('name').'%');
			$medias = $medias->paginate(10);
			$pagination = $medias->appends(array('name'=>Input::get('name')))->links();
		else:
			$medias = $medias->paginate(10);
			$pagination = $medias->links();
		endif;

		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List medias',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('medias.index', compact('medias', 'pagination'));
	}

	/**
	 * Show the form for creating a new media
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New medias';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List medias',
									            'link' => URL::route('medias-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Post',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('medias.create');
	}

	/**
	 * Store a newly created media in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Media::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Media::create($data);

		Session::flash('message', 'Input Berhasil.');
		return Redirect::route('medias.index');
	}

	/**
	 * Display the specified media.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$media = Media::findOrFail($id);
		$this->layout->title = 'detail medias';
		$this->layout->content = View::make('medias.show', compact('media'));
	}

	/**
	 * Show the form for editing the specified media.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$media = Media::find($id);
		$this->layout->title = 'edit post';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('medias-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit medias - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );

		$this->layout->content = View::make('medias.edit', compact('media'));
	}

	/**
	 * Update the specified media in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$media = Media::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Media::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$media->update($data);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('medias.index');
	}

	/**
	 * Remove the specified media from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Media::destroy($id);
		Session::flash('message', 'Update Berhasil');
		return Redirect::route('medias.index');
	}

}
