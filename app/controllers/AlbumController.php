<?php

class AlbumController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','album-list');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$albums = Album::orderBy('id', 'DESC');
		if(Input::has('name')):
			$albums->where('name', 'like', '%'.Input::get('name').'%');
			$albums = $albums->paginate(10);
			$pagination = $albums->appends(array('name'=>Input::get('name')))->links();
		else:
			$albums = $albums->paginate(10);
			$pagination = $albums->links();
		endif;

		$photos = Photo::orderBy('id', 'DESC')->paginate(10);

		$this->layout->title = 'List Album';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Album',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('albums.index', compact(array('albums', 'pagination', 'photos')));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = 'New Album';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Album',
									            'link' => URL::route('album-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'List Album',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('albums.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Album::$rules);

		if ($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput();
		}else{
			DB::transaction(function(){
				$album = new Album;
				$album->name = Input::get('name');
				$album->description = Input::get('description');
				$album->save();

				if(Input::hasFile('images')):
					$files = Input::file('images');
					$descriptions = Input::get('descriptions');
					$i = 0;
					foreach ($files as $file) {
						if($file->isValid()){
							//NEW FILENAME
							$ext = $file->getClientOriginalExtension();
							$new_file_name = sha1(uniqid(mt_rand(), true));
							//THUMB IMAGE
							$path = public_path('albums/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
							$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																			    $constraint->aspectRatio();
																			})->save($path);
							//UPLOAD IMAGE
							$file->move(public_path().'/albums', $new_file_name.'.'.$file->getClientOriginalExtension());
							
							$photo = new Photo;
							$photo->file = $new_file_name.'.'.$file->getClientOriginalExtension();
							$photo->description = $descriptions[$i];
							$photo->album_id = $album->id;
							$photo->save();
						}
						$i++;
					}
				endif;				
			});
			Session::flash('message', 'Input berhasil');
			return Redirect::route('album-list');
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
		$album = Album::find($id);
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Album',
									            'link' => URL::route('album-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Show Album - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-zoom-in'
									        )
									    );
		return View::make('albums.view')->with('album', $album);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$album = Album::find($id);
		$this->layout->title = 'Edit Album';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Album',
									            'link' => URL::route('album-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit Album - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('albums.edit')->with('album', $album);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make($data = Input::all(), Album::$rules);

		if ($validator->fails()):
			return Redirect::back()->withErrors($validator)->withInput();
		else:
			$album = Album::find($id);
			$albumPhotos = $album->photos;
			$album->name = Input::get('name');
			$album->description = Input::get('description');
			$album->save();

			if(Input::hasFile('images')):
				$files = Input::file('images');
				$descriptions = Input::get('descriptions');
				$i = 0;
				foreach ($files as $file) {
					if($file->isValid()){
						//NEW FILENAME
						$ext = $file->getClientOriginalExtension();
						$new_file_name = sha1(uniqid(mt_rand(), true));
						//THUMB IMAGE
						$path = public_path('albums/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
						$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																    $constraint->aspectRatio();
																})->save($path);
						//UPLOAD IMAGE
						$file->move(public_path().'/albums', $new_file_name.'.'.$file->getClientOriginalExtension());

						$photo = new Photo;
						$photo->file = $new_file_name.'.'.$file->getClientOriginalExtension();
						$photo->description = $descriptions[$i];
						$photo->album_id = $album->id;
						$photo->save();
					}
					$i++;
				}
			endif;

			if($albumPhotos){
				$current_images = Input::get('current_images');
				foreach ($albumPhotos as $photo) {
					if(!in_array($photo->id, $current_images)){
						$photo_removed = Photo::find($photo->id);

						//REMOVE OLD FILE
						if(file_exists(public_path('albums/'.$photo_removed->file))) unlink(public_path('albums/'.$photo_removed->file));
						if(file_exists(public_path('albums/'.'thumb_'.$photo_removed->file))) unlink(public_path('albums/'.'thumb_'.$photo_removed->file));

						$photo_removed->delete();
					}	
				}				
			}

			Session::flash('message', 'Update Berhasil');
			return Redirect::route('album-list');
		endif;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$album = Album::find($id);
		$album->delete();

		Session::flash('message', 'Delete berhasil');
		return Redirect::route('album-list');
	}


}
