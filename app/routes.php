<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use Illuminate\Database\Eloquent\ModelNotFoundException;

Route::get('/', array('as'=>'home', 'uses'=>'FrontEndController@home'));
Route::get('/about-me', array('as'=>'about', 'uses'=>'FrontEndController@about'));
Route::get('/service', array('as'=>'service', 'uses'=>'FrontEndController@service'));
Route::get('/portfolio', array('as'=>'portfolio', 'uses'=>'FrontEndController@portfolio'));
Route::get('/studi', array('as'=>'studi', 'uses'=>'FrontEndController@studi'));
Route::get('/blog/{category?}', array('as'=>'blog', 'uses'=>'FrontEndController@blog'));
Route::get('/read/{slug?}', array('as'=>'read', 'uses'=>'FrontEndController@read'));
Route::get('/tag/{tag?}', array('as'=>'tag', 'uses'=>'FrontEndController@tag'));
Route::get('/contact', array('as'=>'contact', 'uses'=>'FrontEndController@contact'));
Route::post('/email-us', array('as'=>'email-us', 'uses'=>'FrontEndController@emailUs'));

Route::get('/google', array('as'=>'google', 'uses'=>'HomeController@index'));
Route::get('/google/login', 'HomeController@login');
Route::get('/google/logout', 'HomeController@logout');
Route::get('/accounts', 'HomeController@accounts');
Route::get('/properties/{account_id}', [ 'uses' => 'HomeController@properties' ] )->where('account_id', '\d+');
Route::get('/views/{account_id}/{property_id}', [ 'uses' => 'HomeController@views' ] )->where(['account_id', '\d+', 'property_id', '\d+', ]);
Route::get('/metadata', 'HomeController@metadata');
Route::post('/report', 'HomeController@report');
Route::get('/segments', 'HomeController@segments');
Route::post('/googleAnalytics', ['uses'=>'HomeController@reportPageView', 'as'=>'googleAnalytics']);

App::error(function(ModelNotFoundException $e)
{
    return Response::make('Not Found', 404);
});

Route::filter('sentry', function(){
	if(!Sentry::check()) return Redirect::guest('login');
});

Route::group(array('before'=>'sentry|hasPermissions', 'prefix'=>Config::get('app.admin_url')), function(){
	
    //ROUTE POSTS       
    Route::get('/', array(
        'as' => 'admin-default',
        'uses' => 'HomeController@adminDefault')
    );

	//ROUTE POSTS		
	Route::get('posts', array(
        'as' => 'posts-list',
        'uses' => 'PostsController@index')
    );
    Route::get('posts/create', array(
        'as' => 'posts-create',
        'uses' => 'PostsController@create')
    );
    Route::post('posts', array(
        'as' => 'posts-store',
        'uses' => 'PostsController@store')
    );
    Route::get('posts/publish', array(
        'as' => 'posts-publish',
        'uses' => 'PostsController@publish')
    );
    Route::get('posts/category', array(
        'as' => 'posts-category',
        'uses' => 'PostsController@countPostByCategory')
    );
	Route::delete('posts/{id}', array(
        'as' => 'posts-delete',
        'uses' => 'PostsController@destroy')
    );
	Route::get('posts/{id}/edit', array(
        'as' => 'posts-edit',
        'uses' => 'PostsController@edit')
    );    
    Route::get('posts/countTopPost', array(
        'as' => 'posts-count-top-post',
        'uses' => 'PostsController@countTopPost')
    );   
	Route::put('posts/{id}', array(
        'as' => 'posts-update',
        'uses' => 'PostsController@update')
    );
    Route::get('posts/{id}', array(
        'as' => 'posts-show',
        'uses' => 'PostsController@show')
    );     

	//ROUTE CATEGORY	
    Route::get('category/countArticles', array(
        'as' => 'category-count',
        'uses' => 'CategoryController@countArticles')
    );	
	Route::get('category', array(
        'as' => 'category-list',
        'uses' => 'CategoryController@index')
    );
    Route::get('category/create', array(
        'as' => 'category-create',
        'uses' => 'CategoryController@create')
    );
    Route::post('category', array(
        'as' => 'category-store',
        'uses' => 'CategoryController@store')
    );
	Route::get('category/{id}/edit', array(
        'as' => 'category-edit',
        'uses' => 'CategoryController@edit')
    );
	Route::put('category/{id}', array(
        'as' => 'category-update',
        'uses' => 'CategoryController@update')
    );
	Route::delete('category/{id}', array(
        'as' => 'category-delete',
        'uses' => 'CategoryController@destroy')
    );
    Route::get('category/{id}', array(
        'as' => 'category-show',
        'uses' => 'CategoryController@show')
    );

    //ROUTE position        
    Route::get('position', array(
        'as' => 'position-list',
        'uses' => 'PositionsController@index')
    );
    Route::get('position/create', array(
        'as' => 'position-create',
        'uses' => 'PositionsController@create')
    );
    Route::post('position', array(
        'as' => 'position-store',
        'uses' => 'PositionsController@store')
    );
    Route::get('position/{id}/edit', array(
        'as' => 'position-edit',
        'uses' => 'PositionsController@edit')
    );
    Route::put('position/{id}', array(
        'as' => 'position-update',
        'uses' => 'PositionsController@update')
    );
    Route::delete('position/{id}', array(
        'as' => 'position-delete',
        'uses' => 'PositionsController@destroy')
    );
    Route::get('position/{id}', array(
        'as' => 'position-show',
        'uses' => 'PositionsController@show')
    );

    //ROUTE staff        
    Route::get('staff', array(
        'as' => 'staff-list',
        'uses' => 'StaffsController@index')
    );
    Route::get('staff/create', array(
        'as' => 'staff-create',
        'uses' => 'StaffsController@create')
    );
    Route::post('staff', array(
        'as' => 'staff-store',
        'uses' => 'StaffsController@store')
    );
    Route::get('staff/{id}/edit', array(
        'as' => 'staff-edit',
        'uses' => 'StaffsController@edit')
    );
    Route::put('staff/{id}', array(
        'as' => 'staff-update',
        'uses' => 'StaffsController@update')
    );
    Route::delete('staff/{id}', array(
        'as' => 'staff-delete',
        'uses' => 'StaffsController@destroy')
    );
    Route::get('staff/{id}', array(
        'as' => 'staff-show',
        'uses' => 'StaffsController@show')
    );

	//ROUTE TAG	
    Route::get('tag/autocomplete', array('as'=>'tag_autocomplete', 'uses'=>'TagController@autocomplete'));
	Route::get('tag', array(
        'as' => 'tag-list',
        'uses' => 'TagController@index')
    );
    Route::get('tag/create', array(
        'as' => 'tag-create',
        'uses' => 'TagController@create')
    );
    Route::post('tag', array(
        'as' => 'tag-store',
        'uses' => 'TagController@store')
    );
	Route::get('tag/{id}/edit', array(
        'as' => 'tag-edit',
        'uses' => 'TagController@edit')
    );
	Route::put('tag/{id}', array(
        'as' => 'tag-update',
        'uses' => 'TagController@update')
    );
	Route::delete('tag/{id}', array(
        'as' => 'tag-delete',
        'uses' => 'TagController@delete')
    );
    Route::get('tag/{id}', array(
        'as' => 'tag-show',
        'uses' => 'TagController@show')
    );
	
	
	//ROUTE ALBUM		
	Route::get('album', array(
        'as' => 'album-list',
        'uses' => 'AlbumController@index')
    );
    Route::get('album/create', array(
        'as' => 'album-create',
        'uses' => 'AlbumController@create')
    );
    Route::post('album', array(
        'as' => 'album-store',
        'uses' => 'AlbumController@store')
    );
	Route::get('album/{id}/edit', array(
        'as' => 'album-edit',
        'uses' => 'AlbumController@edit')
    );
	Route::put('album/{id}', array(
        'as' => 'album-update',
        'uses' => 'AlbumController@update')
    );
	Route::delete('album/{id}', array(
        'as' => 'album-delete',
        'uses' => 'AlbumController@destroy')
    );
    Route::get('album/{id}', array(
        'as' => 'album-show',
        'uses' => 'AlbumController@show')
    );

    //ROUTE MEDIA       
    Route::get('medias', array(
        'as' => 'media-list',
        'uses' => 'MediasController@index')
    );
    Route::get('medias/create', array(
        'as' => 'media-create',
        'uses' => 'MediasController@create')
    );
    Route::post('medias', array(
        'as' => 'media-store',
        'uses' => 'MediasController@store')
    );
    Route::get('medias/{id}/edit', array(
        'as' => 'media-edit',
        'uses' => 'MediasController@edit')
    );
    Route::put('medias/{id}', array(
        'as' => 'media-update',
        'uses' => 'MediasController@update')
    );
    Route::delete('medias/{id}', array(
        'as' => 'media-delete',
        'uses' => 'MediasController@destroy')
    );
    Route::get('medias/{id}', array(
        'as' => 'media-show',
        'uses' => 'MediasController@show')
    );

	//ROUTE SETTING	
	Route::get('setting', array(
        'as' => 'setting-list',
        'uses' => 'SettingController@index')
    );
    Route::get('setting/create', array(
        'as' => 'setting-create',
        'uses' => 'SettingController@create')
    );
    Route::post('setting', array(
        'as' => 'setting-store',
        'uses' => 'SettingController@store')
    );
	Route::get('setting/{id}/edit', array(
        'as' => 'setting-edit',
        'uses' => 'SettingController@edit')
    );
	Route::put('setting/{id}', array(
        'as' => 'setting-update',
        'uses' => 'SettingController@update')
    );
	Route::delete('setting/{id}', array(
        'as' => 'setting-delete',
        'uses' => 'SettingController@delete')
    );
    Route::get('setting/{id}', array(
        'as' => 'setting-show',
        'uses' => 'SettingController@show')
    );

    //ROUTE menu    
    Route::get('menu', array(
        'as' => 'menu-list',
        'uses' => 'MenuController@index')
    );
    Route::get('menu/create', array(
        'as' => 'menu-create',
        'uses' => 'MenuController@create')
    );
    Route::post('menu', array(
        'as' => 'menu-store',
        'uses' => 'MenuController@store')
    );
    Route::get('menu/{id}/edit', array(
        'as' => 'menu-edit',
        'uses' => 'MenuController@edit')
    );
    Route::put('menu/{id}', array(
        'as' => 'menu-update',
        'uses' => 'MenuController@update')
    );
    Route::delete('menu/{id}', array(
        'as' => 'menu-delete',
        'uses' => 'MenuController@delete')
    );
    Route::get('menu/{id}', array(
        'as' => 'menu-show',
        'uses' => 'MenuController@show')
    );

    //ROUTE COMMENT    
    Route::get('comment', array(
        'as' => 'comment-list',
        'uses' => 'CommentsController@index')
    );
    Route::get('comment/create', array(
        'as' => 'comment-create',
        'uses' => 'CommentsController@create')
    );
    Route::post('comment', array(
        'as' => 'comment-store',
        'uses' => 'CommentsController@store')
    );
    Route::put('comment/action', array(
        'as' => 'comment-action',
        'uses' => 'CommentsController@action')
    );
    Route::get('comment/{id}/edit', array(
        'as' => 'comment-edit',
        'uses' => 'CommentsController@edit')
    );
    Route::put('comment/{id}', array(
        'as' => 'comment-update',
        'uses' => 'CommentsController@update')
    );
    Route::delete('comment/{id}', array(
        'as' => 'comment-delete',
        'uses' => 'CommentsController@delete')
    );
    Route::get('comment/{id}', array(
        'as' => 'comment-show',
        'uses' => 'CommentsController@show')
    );

    //ROUTE schedule    
    Route::get('schedule/countSchedules', array(
        'as' => 'schedule-count',
        'uses' => 'SchedulesController@countSchedules')
    );    
    Route::get('schedule', array(
        'as' => 'schedule-list',
        'uses' => 'SchedulesController@index')
    );
    Route::get('schedule/create', array(
        'as' => 'schedule-create',
        'uses' => 'SchedulesController@create')
    );
    Route::post('schedule', array(
        'as' => 'schedule-store',
        'uses' => 'SchedulesController@store')
    );
    Route::get('schedule/{id}/edit', array(
        'as' => 'schedule-edit',
        'uses' => 'SchedulesController@edit')
    );
    Route::put('schedule/{id}', array(
        'as' => 'schedule-update',
        'uses' => 'SchedulesController@update')
    );
    Route::delete('schedule/{id}', array(
        'as' => 'schedule-delete',
        'uses' => 'SchedulesController@destroy')
    );
    Route::get('schedule/{id}', array(
        'as' => 'schedule-show',
        'uses' => 'SchedulesController@show')
    );

	//ROUTE ELFINDER
	Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
	Route::get('elfinder/tinymce', 'Barryvdh\Elfinder\ElfinderController@showTinyMCE4');
	
});

/*Route::get('register', function(){
	Sentry::register(array(
		'email'=>'budihariyana@gmail.com',
		'password'=>'budi',
		'activated'   => true
	));
});

Route::get('active', function(){
	try
	{
	    $user = Sentry::findUserById(1);
	    if ($user->attemptActivation('8f1Z7wA4uVt7VemBpGSfaoI9mcjdEwtK8elCnQOb'))
	    {
	        // User activation passed
	    }
	    else
	    {
	        // User activation failed
	    }
	}
	catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
	{
	    echo 'User was not found.';
	}
	catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
	{
	    echo 'User is already activated.';
	}
});*/

Route::get('login', array('as'=>'login', 'uses'=>'UserController@login'));
Route::post('login', array('as'=>'postLogin', 'uses'=>'UserController@doLogin'));
Route::get('logout', array('as'=>'logout', 'uses'=>'UserController@doLogout'));

// Fancy wrapper for login URL
Route::get('/facebook/login', array('as'=>'facebookLogin', 'uses'=>'FacebookController@login'));

// Endpoint that is redirected to after an authentication attempt
Route::get('/facebook/auth', array('as'=>'facebookAuth', 'uses'=>'FacebookController@auth'));

//catch error message
Route::get('/facebook/status', array('as'=>'facebookStatus', 'uses'=>'FacebookController@status'));

//display facebook data
Route::get('/facebook/success', array('as'=>'facebookSuccess', 'uses'=>'FacebookController@success'));

