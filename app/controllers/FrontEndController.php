<?php

class FrontEndController extends \BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.budi-layout.frontend';

    public function __construct(){
    	View::share('title', 'B-DEV - PT. Berkah Developer Solutions');
    	View::share('description', 'Software House Jasa Pembuatan Website Murah dan berkualitas di Kota Bogor');
    	View::share('keywords', 'Software House, jasa pembauatn website, website, aplikasi mobile, android, bogor ');
    	View::share('author', 'Admin');
    }

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
		View::share('title', 'Home | B-DEV - PT. Berkah Developer Solutions');
		$this->layout->content = View::make('frontend.home');
	}

	public function service(){
		View::share('title', 'Our Services | B-DEV - PT. Berkah Developer Solutions');
		$this->layout->content = View::make('frontend.service');	
	}

	public function about(){
		View::share('title', 'About Us | B-DEV - PT. Berkah Developer Solutions');
		$staffs = Staff::all();
		$this->layout->content = View::make('frontend.about2', compact('staffs'));	
	}

	public function portfolio(){
		View::share('title', 'Portfolio | B-DEV - PT. Berkah Developer Solutions');
		$this->layout->content = View::make('frontend.portfolio');	
	}
	
	public function studi(){
		View::share('title', 'Studi Kasus | B-DEV - PT. Berkah Developer Solutions');
		$this->layout->content = View::make('frontend.studi');	
	}

	public function blog($category=null){
		View::share('title', 'Blog Post | B-DEV - PT. Berkah Developer Solutions');

		$this->layout->title = 'Blog Post | B-DEV - PT. Berkah Developer Solutions';
		
		if($category != null):
			$posts = Category::where('name', '=', $category)->first();
			$posts = $posts->posts();
			$posts = $posts->paginate(5);
			$pagination = $posts->links();
		else:
			$posts = Post::where('status', '=', '1')->orderBy('id', 'DESC');
			if(Input::has('title')):
				$posts->where('title','like','%'.Input::get('title').'%');
				$posts = $posts->paginate(5);
				$pagination = $posts->appends(array('title'=>Input::get('title')))->links();
			else:
				$posts = $posts->paginate(5);
				$pagination = $posts->links();
			endif;
		endif;
		
		$this->layout->breadcrumb = array();
		$this->layout->content = View::make('frontend.blog', compact('posts', 'pagination'));
	}

	public function read($slug=null){

		$post = Post::findBySlug($slug);
		$this->layout->title = 'B-dev | Read Blog - '.$post->title;		
		View::share('title', 'Read Blog | B-DEV - PT. Berkah Developer Solutions');
    	View::share('description', $post->headline);
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

	public function emailUs(){
		$email = Input::get('email');
		$subject = Input::get('subject');
		$content = Input::get('content');
		$name = Input::get('name');
		$message = '';
		
		Mail::send([], [], function($message)
		{
		    $message->to(Config::get('cms.email'), 'Admin Bdev')->subject('test')->setBody($message);
		});

		return Redirect::to('/');
	}

}
