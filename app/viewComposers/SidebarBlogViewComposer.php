<?php

use Illuminate\View\View;

class SidebarBlogViewComposer {

	public function compose(View $view){
		$data = [];
		$data['popular_posts'] = static::getPopularPosts();
		$data['categories'] = static::getCategories();
		$data['comments'] = static::getLatestComments();
		$view->sidebar = $data;
	}

	public static function getPopularPosts(){
		$posts = Post::orderBy('read', 'DESC')->take(5)->get();
		return $posts;
	}

	public static function getCategories(){
		$categories = Category::all();
		return $categories;
	}

	public static function getLatestComments(){
		$comments = Comment::orderBy('id', 'DESC')->take(5)->get();
		return $comments;
	}
}