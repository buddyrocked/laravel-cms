<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if(is_null($this->layout))
		{
			$this->layout = View::make(Config::get('app.theme'));
        	$this->layout->title = Config::get('app.siteName');
        	$this->layout->breadcrumb = array();
		} 
		else
		{
			$this->layout = View::make($this->layout);
			$this->layout->title = Config::get('app.siteName');
        	$this->layout->breadcrumb = array();
			
		}
	}

}
