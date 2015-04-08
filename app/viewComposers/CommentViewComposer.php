<?php

use Illuminate\View\view;

class CommentViewComposer {

	public function compose(View $view){
		$comments = Comment::all();
		$view->comments = $comments;
	}

}