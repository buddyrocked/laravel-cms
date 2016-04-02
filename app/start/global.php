<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',
	app_path().'/classes',
    app_path().'/viewComposers',
    app_path().'/classes/bindings.php',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

Form::macro('selectpicker', function($name, $list = [], $selected = null, $options = [], $disabled = []) {
    $html = '<select name="' . $name . '"';
    foreach ($options as $attribute => $value) {
        $html .= ' ' . $attribute . '="' . $value . '"';
    }
    $html .= '">';
    foreach ($list as $value => $text) {
        $html .= '<option data-icon="'.$value.'" value="' . $value . '"' .
            ($value == $selected ? ' selected="selected"' : '') .
            (in_array($value, $disabled) ? ' disabled="disabled"' : '') . '>' .
            $value . '</option>';
    }
    $html .= '</select>';
    return $html;
});

Form::macro('rawLabel', function($name, $value = null, $options = array())
{
    $label = Form::label($name, '%s', $options);

    return sprintf($label, $value);
});

HTML::macro('linkicon', function($route, $value = null, $options=array())
{
    $link = HTML::link($route, '%s', $options);

   return sprintf($link, $value); 
});

App::before(function($request) {
    App::singleton('list_routes', function(){
        $list_routes = array();
        foreach (Config::get('syntara::permissions') as $key => $value) {
            $list_routes[$key] = $key;
        }
        return $list_routes;
    });
    View::share('list_routes', app('list_routes'));
});

/*
|--------------------------------------------------------------------------
| Extend blade so we can define a variable
| <code>
| @define $variable = "whatever"
| </code>
|--------------------------------------------------------------------------
*/

Blade::extend(function($value) {
    return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
});


View::composer('layouts.budi-layout.menu-item', 'NavigationViewComposer');

View::composer('layouts.budi-layout.comment', 'CommentViewComposer');

View::composer('layouts.budi-layout.sidebarBlog', 'SidebarBlogViewComposer');

View::composer('layouts.budi-layout.fblogin', 'FacebookViewComposer');