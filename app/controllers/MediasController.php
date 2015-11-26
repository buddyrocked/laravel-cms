<?php

class MediasController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','media-list');
	}

	/**
	 * Display a listing of medias
	 *
	 * @return Response
	 */
	public function index()
	{

		$this->layout->title = 'List medias';

		$medias = Media::orderBy('id','DESC');

		$mediaItems = MediaItem::orderBy('download', 'DESC')->paginate(10);

		if(Input::has('name')):
			$medias->where('name','like','%'.Input::get('name').'%');
			$medias = $medias->paginate(5);
			$pagination = $medias->appends(array('name'=>Input::get('name')))->links();
		else:
			$medias = $medias->paginate(5);
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
		$this->layout->content = View::make('medias.index', compact('medias', 'mediaItems', 'pagination'));
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
									            'link' => URL::route('media-list'),
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
		DB::transaction(function(){
			$media = new Media;
			$media->name = Input::get('name');
			$media->description = Input::get('description');
			$media->status = (Input::has('status'))?true:false;
			$media->save();

			if(Input::hasFile('images')):
				$files = Input::file('images');
				$descriptions = Input::get('descriptions');
				$i = 0;
				foreach ($files as $file) {
					if($file->isValid()){
						$ext = $file->getClientOriginalExtension();
						$new_file_name = sha1(uniqid(mt_rand(), true));
						$file->move(public_path().'/images', $new_file_name.'.'.$file->getClientOriginalExtension());
						$item = new MediaItem;
						$item->file = $new_file_name.'.'.$file->getClientOriginalExtension();
						$item->description = $descriptions[$i];
						$item->media_id = $media->id;
						$item->save();
					}
					$i++;
				}
			endif;
		});

		Session::flash('message', 'Input Berhasil.');
		return Redirect::route('media-list');
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
									            'link' => URL::route('media-list'),
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

		
		$mediaItems = $media->mediaItems;
		$media->name = Input::get('name');
		$media->description = Input::get('description');
		$media->status = (Input::has('status'))?true:false;
		$media->save();

		if(Input::hasFile('images')):
			$files = Input::file('images');
			$descriptions = Input::get('descriptions');
			$i = 0;
			foreach ($files as $file) {
				if($file->isValid()){
					$ext = $file->getClientOriginalExtension();
					$new_file_name = sha1(uniqid(mt_rand(), true));
					$file->move(public_path().'/images', $new_file_name.'.'.$file->getClientOriginalExtension());
					$photo = new MediaItem;
					$photo->file = $new_file_name.'.'.$file->getClientOriginalExtension();
					$photo->description = $descriptions[$i];
					$photo->media_id = $media->id;
					$photo->save();
				}
				$i++;
			}
		endif;

		if($mediaItems){
			$current_items = Input::get('current_items');
			foreach ($mediaItems as $item) {
				if(!in_array($item->id, $current_items)){
					$item_removed = MediaItem::find($item->id);
					$item_removed->delete();
				}	
			}				
		}

		Session::flash('message', 'Update Berhasil');
		return Redirect::route('media-list');
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
		return Redirect::route('media-list');
	}

}
