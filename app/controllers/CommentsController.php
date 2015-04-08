<?php

class CommentsController extends \BaseController {

	public function __construct(){
		View::share('activeMenu','comment-list');
	}

	/**
	 * Display a listing of comments
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = 'list comments';
		$comments = Comment::orderBy('id','ASC');
		if(Input::has('name')):
			$comments->where('name','like','%'.Input::get('name').'%');
			$comments = $comments->paginate(10);
			$pagination = $comments->appends(array('title'=>Input::get('name')))->links();
		else:
			$comments = $comments->paginate(10);
			$pagination = $comments->links();
		endif;

		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List Comments',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		$this->layout->content = View::make('comments.index', compact('comments', 'pagination'));
	}

	/**
	 * Show the form for creating a new comment
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('comments.create');
	}

	/**
	 * Store a newly created comment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Comment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Comment::create($data);

		return Redirect::route('comments.index');
	}

	/**
	 * Display the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$comment = Comment::findOrFail($id);

		return View::make('comments.show', compact('comment'));
	}

	/**
	 * Show the form for editing the specified comment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$comment = Comment::find($id);

		return View::make('comments.edit', compact('comment'));
	}

	/**
	 * Update the specified comment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$comment = Comment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Comment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$comment->update($data);

		return Redirect::route('comments.index');
	}

	/**
	 * Remove the specified comment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return Redirect::route('comments.index');
	}

	/**
	 * Update the multiple comment in storage.
	 *
	 * @return Response
	 */
	public function action()
	{
		foreach (Input::get('comment') as $key) {
			if(isset($key['check'])):
				$comment = Comment::findOrFail($key['id']);
				if(Input::has('approve')):
					$comment->status = true;
					$comment->save();
				else:
					$comment->delete();
				endif;
			endif;
		}
		if(Input::has('approve')):
			Session::flash('message', 'Comment Approved');
		else:
			Session::flash('message', 'Comment Deleted');
		endif;
		return Redirect::route('comment-list');
	}

}
