<?php
Class PostsController extends BaseController {

	public function __construct(){
		View::share('activeMenu','posts-list');
	}

	/**
     * The layout that should be used for responses.
     */
    //protected $layout = 'layouts.layout';

	/*
	 * Display a listing of resource
	 *
	 * @return response
	 */
	public function index(){
		$this->layout->title = 'list posts';
		$posts = Post::orderBy('id','DESC');
		if(Input::has('title')):
			$posts->where('title','like','%'.Input::get('title').'%');
			$posts = $posts->paginate(10);
			$pagination = $posts->appends(array('title'=>Input::get('title')))->links();
		else:
			$posts = $posts->paginate(10);
			$pagination = $posts->links();
		endif;

		$new_comments = Comment::All()->take(4);

		$categories = Category::all();

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
		$this->layout->content = View::make('posts.index')->with(array('posts'=>$posts, 'pagination'=>$pagination, 'new_comments'=>$new_comments, 'categories'=>$categories));
	}



	/*
	 * Show form to create a resource
	 *
	 * @return response
	 */
	public function create(){
		$this->layout->title = 'new post';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('posts-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'New Post',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-plus'
									        )
									    );
		$this->layout->content = View::make('posts.create');
	}

	/*
	 * Store a newly created resource in storage
	 *
	 * @return response
	 */
	public function store(){
		
		$rules = array(
			'title'=>'required',
			'content'=>'required',
			'image' => 'required|max:10000|mimes:jpeg,jpg, png'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('posts-create')->withErrors($validator)->withInput(Input::except('password'));
		} else {
			DB::transaction(function(){
				$post = new Post;

				if(Input::hasFile('image')):
					$file = Input::file('image');
					if($file->isValid()):
						//NEW FILENAME
						$ext = $file->getClientOriginalExtension();
						$new_file_name = sha1(uniqid(mt_rand(), true));
						//THUMB IMAGE
						$path = public_path('posts/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
						$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																		    $constraint->aspectRatio();
																		})->save($path);
						//UPLOAD IMAGE
						$file->move(public_path().'/posts', $new_file_name.'.'.$file->getClientOriginalExtension());
						$post->image = $new_file_name.'.'.$file->getClientOriginalExtension();
					endif;
				endif;
				
				$post->title = Input::get('title');
				$post->headline = Input::get('headline');
				$post->content = Input::get('content');
				$post->is_comment = Input::get('is_comment');
				$post->date_posting = Input::get('date_posting');
				$post->comment_expired = Input::get('comment_expired');
				$post->status = Input::get('status');
				$post->category_id = Input::get('category_id');
				$post->user_id = Sentry::getUser()->id;
				$post->save();

				if(Input::has('tags')){
					$tags = explode(',', Input::get('tags'));
					foreach ($tags as $tag) {
						$is_exist = Tag::where('name','=',$tag)->first();
						if($is_exist){
							$post_tag = new PostTag;
							$post_tag->post_id = $post->id;
							$post_tag->tag_id = $is_exist->id;
							$post_tag->save();
						}else{
							$new_tag = new Tag;
							$new_tag->name = $tag;
							$new_tag->save();

							$post_tag = new PostTag;
							$post_tag->post_id = $post->id;
							$post_tag->tag_id = $new_tag->id;
							$post_tag->save();
						}
					}
				}
			});

			Session::flash('message', 'Input Berhasil..!!!');
			return Redirect::route('posts-list');
		}
	}

	/**
	 * Update the multiple comment in storage.
	 *
	 * @return Response
	 */
	public function publish()
	{
		foreach (Input::get('posts') as $key) {
			if(isset($key['check'])):
				$post = Post::findOrFail($key['id']);
				if(Input::has('publish')):
					$post->status = true;
					$post->save();
				else:
					$post->delete();
				endif;
			endif;
		}
		if(Input::has('publish')):
			Session::flash('message', 'Posts Published');
		else:
			Session::flash('message', 'Posts Deleted');
		endif;
		return Redirect::route('posts-list');
	}

	/*
	 * Display a specified resource
	 *
	 * param int $id
	 * @return response
	 */
	public function show($id){
		$post = Post::find($id);
		$this->layout->title = 'detail post';
		$this->layout->content = View::make('posts.show')->with('post', $post);
	}

	/*
	 * Show form to editing a resource
	 *
	 * param int $id
	 * @return response
	 */
	public function edit($id){
		$post = Post::find($id);
		$current_tags = array();
		foreach ($post->posttags as $pt) {
			$current_tags[] = $pt->tag->name;
		}		
		$tags = implode(',', $current_tags);
		$this->layout->title = 'edit post';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Posts',
									            'link' => URL::route('posts-list'),
									            'icon' => 'glyphicon-list-alt'
									        ),
									        array(
									            'title' => 'Edit Post - '.$id,
									            'link' => URL::current(),
									            'icon' => 'glyphicon-pencil'
									        )
									    );
		$this->layout->content = View::make('posts.edit')->with(array('post'=> $post, 'tags'=>$tags));
	}
	
	/*
	 * Update a resource
	 *
	 * param int $id
	 * @return response
	 */
	public function update($id){
		$rules = array(
			'title'=>'required',
			'content'=>'required',
			'image' => 'max:10000|mimes:jpeg,jpg, png'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()){
			return Redirect::route(array('posts-edit', $id))->withErrors($validator)->withInput(Input::except('password'));
		} else {
			DB::transaction(function() use($id) {
				$post = Post::find($id);
				if(Input::hasFile('image')):
					$file = Input::file('image');
					if($file->isValid()):
						//REMOVE OLD FILE
						if(file_exists(public_path('posts/'.$post->file)) && !is_dir(public_path('posts/'.$post->file))) unlink(public_path('posts/'.$post->image));
						if(file_exists(public_path('posts/'.'thumb_'.$post->file)) && !is_dir(public_path('posts/thumb_'.$post->file))) unlink(public_path('posts/'.'thumb_'.$post->image));
						//NEW FILENAME
						$ext = $file->getClientOriginalExtension();
						$new_file_name = sha1(uniqid(mt_rand(), true));
						//THUMB IMAGE
						$path = public_path('posts/' . 'thumb_'.$new_file_name.'.'.$file->getClientOriginalExtension());
						$img = Image::make($file->getRealPath())->resize(200, null, function ($constraint) {
																		    $constraint->aspectRatio();
																		})->save($path);
						//UPLOAD IMAGE
						$file->move(public_path().'/posts', $new_file_name.'.'.$file->getClientOriginalExtension());
						$post->image = $new_file_name.'.'.$file->getClientOriginalExtension();
					endif;
				endif;

				$post->title = Input::get('title');
				$post->headline = Input::get('headline');
				$post->content = Input::get('content');
				$post->is_comment = Input::get('is_comment');
				$post->date_posting = Input::get('date_posting');
				$post->comment_expired = Input::get('comment_expired');
				$post->status = Input::get('status');
				$post->category_id = Input::get('category_id');
				$post->user_id = Sentry::getUser()->id;
				$post->save();

				if(Input::has('tags')){
					$tags = explode(',', Input::get('tags'));
					foreach ($tags as $tag) {
						$is_exist = Tag::where('name','=',$tag)->first();
						if($is_exist){
							$pt_exist = PostTag::where('post_id', '=', $id);
							$pt_exist = $pt_exist->where('tag_id', '=', $is_exist->id)->first();
							
							if(!$pt_exist){
								$post_tag = new PostTag;
								$post_tag->post_id = $post->id;
								$post_tag->tag_id = $is_exist->id;
								$post_tag->save();
							}							
						}else{
							$new_tag = new Tag;
							$new_tag->name = $tag;
							$new_tag->save();

							$post_tag = new PostTag;
							$post_tag->post_id = $post->id;
							$post_tag->tag_id = $new_tag->id;
							$post_tag->save();
						}
					}

					$current_tags = $post->posttags;
					foreach ($current_tags as $current_tag) {
						if(!in_array($current_tag->tag->name, $tags)){
							$post_tag = PostTag::where('id','=',$current_tag->id)->first()->delete();
						}
					}
				}
			});			

			Session::flash('message', 'Update Berhasil');
			return Redirect::route('posts-list');
		}
	}

	/*
	 * delete a resource
	 *
	 * param int $id
	 * @return response
	 */
	public function destroy($id){
		$post = Post::find($id);
		$post->delete();
		return Redirect::route('posts-list')->with('message', 'Delete Berhasil');
	}


	/*
	 * find  resource
	 *
	 * @return response json
	 */
	public function countPostByCategory(){
		$categories = Category::all();
		$return = array();
		foreach ($categories as $category):
			$item = array();
			$item['label'] = $category->name;
			$item['value'] = $category->posts->count();
			$return[] = $item;
		endforeach;
		return Response::json($return);
	}

	/*
	 * find  resource
	 *
	 * @return response json
	 */
	public function countTopPost(){
		$posts = Post::orderBy('read', 'DESC')->paginate(5);
		$return = array();
		foreach ($posts as $post):
			$item = array();
			$item['key'] = substr($post->title, 0, 10);
			$item['value'] = $post->read;
			$item['color'] = '#ea5a5a';
			$return[] = $item;
		endforeach;
		return Response::json($return);
	}
}