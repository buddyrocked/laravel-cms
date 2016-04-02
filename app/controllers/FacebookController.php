<?php
use SammyK\FacebookQueryBuilder\FacebookQueryBuilderException;

class FacebookController extends BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.budi-layout.layout';

	public function __construct(GA_Service $ga){

		View::share('title', 'B-DEV - PT. Berkah Developer Solutions');
    	View::share('description', 'Software House Jasa Pembuatan Website Murah dan berkualitas di Kota Bogor');
    	View::share('keywords', 'Software House, jasa pembauatn website, website, aplikasi mobile, android, bogor ');
    	View::share('author', 'Admin');
	}


	public function login(){
		return Redirect::to(Facebook::getLoginUrl(['manage_pages','email','public_profile','user_friends','publish_actions','publish_pages']));
	}

	/*
	|----------------------
	| LOGIN TO FACEBOOK
	| get facebook token and store to session
	| Route::get('/facebook/login')
	|
	*/
	public function auth(){
		try {
			$token = Facebook::getTokenFromRedirect();
			if(!$token):
				return Redirect::route('facebookStatus')->with('error', 'Unable to obtain access token');
			endif;
		}
		catch (FacebookQueryBuilderException $e)
	    {
	        return Redirect::route('facebookStatus')->with('error', $e->getPrevious()->getMessage());
	    }

	    if ( ! $token->isLongLived())
	    {
	        /**
	         * Extend the access token.
	         */
	        try
	        {
	            $token = $token->extend();
	            Session::put('facebook_token', (string)$token);
	        }
	        catch (FacebookQueryBuilderException $e)
	        {
	            return Redirect::route('facebookStatus')->with('error', $e->getPrevious()->getMessage());
	        }
	    }

	    Facebook::setAccessToken($token);

	    /**
	     * Get basic info on the user from Facebook.
	     */
	    try
	    {
	        $facebook_user = Facebook::object('me')->fields('id','name')->get();
	    }
	    catch (FacebookQueryBuilderException $e)
	    {
	        return Redirect::route('facebookStatus')->with('error', $e->getPrevious()->getMessage());
	    }

	    // Create the user if not exists or update existing
	    //$user = User::createOrUpdateFacebookObject($facebook_user);

	    // Log the user into Laravel
	    //Facebook::auth()->login($user);

	    return Redirect::route('facebookSuccess')->with('message', 'Successfully logged in with Facebook');
	}

	public function status(){
		$this->layout->content = View::make('facebook.status');
	}

	public function success(){
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::to('/dashboard'),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'Login Facebook Success',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );
		Facebook::setAccessToken(Session::get('facebook_token'));
		$facebook_user = Facebook::object('me')->fields('id','name')->get();
		$this->layout->content = View::make('facebook.success', compact(array('facebook_user')));
	}

}
