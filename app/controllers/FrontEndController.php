<?php

class FrontEndController extends \BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.budi-layout.frontend';

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	| Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$this->layout->content = View::make('frontend.home');
	}

	public function service(){
		$this->layout->content = View::make('frontend.service');	
	}

	public function about(){
		$this->layout->content = View::make('frontend.about');	
	}

	public function portfolio(){
		$this->layout->content = View::make('frontend.portfolio');	
	}

	public function blog($category=null){
		$this->layout->title = 'Blog Post';
		
		if($category != null):
			$posts = Category::where('name', '=', $category)->first();
			$posts = $posts->posts();
			$posts = $posts->paginate(10);
			$pagination = $posts->links();
		else:
			$posts = Post::orderBy('id', 'DESC');
			if(Input::has('title')):
				$posts->where('title','like','%'.Input::get('title').'%');
				$posts = $posts->paginate(10);
				$pagination = $posts->appends(array('title'=>Input::get('title')))->links();
			else:
				$posts = $posts->paginate(10);
				$pagination = $posts->links();
			endif;
		endif;
		
		$this->layout->breadcrumb = array();
		$this->layout->content = View::make('frontend.blog', compact('posts', 'pagination'));
	}

	public function read($slug=null){
		$post = Post::findBySlug($slug);
		$this->layout->title = 'Blog detail';
		$this->layout->breadcrumb = array();
		$this->layout->content = View::make('frontend.read', compact('post'));

	}

	public function tag($tag=null){
		$this->layout->title = 'Tag Post';
		
		$tag = Tag::where('name', '=', $tag)->first();
		$posts = $tag->post_tag();
		$posts = $posts->paginate(5);
		$pagination = $posts->links();

		$this->layout->breadcrumb = array();
		$this->layout->content = View::make('frontend.tag', compact('posts', 'pagination'));
	}

	public function contact(){
		$this->layout->content = View::make('frontend.contact');	
	}

}
