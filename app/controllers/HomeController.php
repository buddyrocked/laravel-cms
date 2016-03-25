<?php

class HomeController extends BaseController {

	private $ga;

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.budi-layout.frontend';

	public function __construct(GA_Service $ga){
		$this->ga = $ga;

		View::share('title', 'B-DEV - PT. Berkah Developer Solutions');
    	View::share('description', 'Software House Jasa Pembauatn Website Murah dan berkualitas di Kota Bogor');
    	View::share('keywords', 'Software House, jasa pembauatn website, website, aplikasi mobile, android, bogor ');
    	View::share('author', 'Admin');
	}

	public function index(){
		$this->layout = View::make('layouts.budi-layout.layout');
		if($this->ga->isLoggedIn()){
			$metadata = $this->metadata();
			$dimensions = $metadata['dimensions'];
			$metrics = $metadata['metrics'];

			$this->layout->title = 'Google Analytics';

			$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									        array(
									            'title' => 'List positions',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-list-alt'
									        )
									    );

			$this->layout->content = View::make('frontend.google', compact('dimensions', 'metrics'));
		}else{
			$url =  $this->ga->getLoginUrl();
			return Redirect::to($url);
		};
	}

	public function login(){
	    if( Input::has('code') ){
	        $code = Input::get('code');
	        $this->ga->login($code);
	         
	        return "Go to the home <a href='/dashboard'>page</a>";
	    }
	    else{
	        return "Invalide request parameters";
	    }
	}

	public function logout(){
		Session::forget('token');
		return Redirect::to('/');
	}

	public function accounts(){
		$accounts = $this->ga->accounts();
		return Response::json($accounts);
	}

	public function properties($account_id){
		$properties = $this->ga->properties($account_id);
		return Response::json($properties);
	}

	public function views($account_id, $property_id){
		$views = $this->ga->views($account_id, $property_id);
		return Response::json($views);
	}

	public function metadata(){
		$metadata = $this->ga->metadata();
		return $metadata;
	}

	public function report(){
		if(!$this->ga->isLoggedIn()){
			return Response::json([
				'status' => 0,
				'code' => 1,
				'message' => 'Login Required'
			]);
		}

		if(!Input::has('dimensions') || !Input::has('metrics') || !Input::has('view')){
			return Response::json([
				'status'    => 0,
				'code'      => 1,
				'message'   => 'Invalid request parametter'
			]);
		}

		$view = 'ga:'.Input::get('view');
		$dimensions = Input::get('dimensions');
		$metrics = Input::get('metrics');
		$max_results = intval(Input::get('max_results'));

		$daterange = explode(' - ', Input::get('daterange'));
		$start_date = $daterange[0];
		$end_date = $daterange[1];

		$filters = [];

		$group_filters = [];

		$group_filters['dimensions'] = GA_Utils::groupFilters( 
			Input::get('dimension_filter_show'), 
			Input::get('dimension_filters'), 
			Input::get('dimension_filter_rules'), 
			Input::get('dimension_filter_values')
		);
		$filters[] = GA_Utils::encodeDimensionFilters($group_filters['dimensions']);

		$group_filters['metrics'] = GA_Utils::groupFilters( 
			Input::get('metric_filter_show'), 
			Input::get('metric_filters'), 
			Input::get('metric_filter_rules'), 
			Input::get('metric_filter_values')
		);
		$filters[] = GA_Utils::encodeDimensionFilters($group_filters['metrics']);

		$orderbys = [];

		if(Input::has('orderbys') && Input::has('orderby_rules')):
			$orderbys = GA_Utils::encodeOrderby(
							GA_Utils::groupOrderby(
								Input::get('orderbys'), 
								Input::get('orderby_rules')
							)
			);
		endif;

		$report = $this->ga->report($view, $start_date, $end_date, $max_results, $filters, $orderbys, $dimensions, $metrics);
		//var_dump($report); die;
		$json_data = [];
		foreach( $report['items'] as $item ){
			$json_data[] = [
				'name'  => $item[0],
				'y'     => (int)$item[1]
			];
		}

		$this->layout->content = View::make('frontend.report', ['columns'=>$report['columnHeaders'], 'items'=>$report['items'], 'totalResults'=>$report['totalResults'], 'chart_type'=>Input::get('chart_type'), 'report_json' => json_encode($json_data)]);
	
	}

	public function reportPageView(){
		

		if(!$this->ga->isLoggedIn()){
			return Response::json([
				'status' => 0,
				'code' => 1,
				'message' => 'Login Required'
			]);
		}

		$account = $this->ga->accounts()[0];
		$property = $this->ga->properties($account['id'])[0];
		$view = $this->ga->views($account['id'], $property['id'])[0];

		$metadata = $this->metadata();
		$dimensions = array(Input::get('dimensions'));
		$metrics = array(Input::get('metrics'));

		$range = 'month';
		if(Input::has('range')):
			$range = Input::get('range');
		endif;

		$now = new DateTime();
		$end_date = $now->format('Y-m-d');
		$start_date = $now->modify('-1 '.$range)->format('Y-m-d');

		$end_dateBefore = $now->modify('-1 '.$range)->format('Y-m-d');
		$start_dateBefore = $now->modify('-2 '.$range)->format('Y-m-d'); 

		$max_results = 100;
		if(Input::has('max-results')):
			$max_results = Input::get('max-results');
		endif;

		$filters = array();
		
		$orderbys = [];
		if(Input::has('orderbys') && Input::has('orderby_rules')):			
			$orderbys = GA_Utils::encodeOrderby(
							GA_Utils::groupOrderby(
								Input::get('orderbys'), 
								Input::get('orderby_rules')
							)
			);
		endif;



		$report = $this->ga->report( 'ga:'.$view['id'], $start_date, $end_date, $max_results, $filters, $orderbys, $dimensions, $metrics );

		$reportBefore = $this->ga->report( 'ga:'.$view['id'], $start_dateBefore, $end_dateBefore, $max_results, $filters, $orderbys, $dimensions, $metrics );
		$reportCompare = [];
		if(!empty($reportBefore['items'])):
			foreach( $reportBefore['items'] as $i=>$item ){
				$reportCompare[$item[0]] = (int)$item[1];
			}
		endif;

		$json_data = [];
		$total = 0;
		$totalCompare =0;
		foreach( $report['items'] as $item ){
			$compare = (isset($reportCompare[$item[0]]))?$reportCompare[$item[0]]:0;
			if(Input::get('dimensions') == 'ga:countryIsoCode'):
				$json_data[] = [
					'id'   => $item[0],
					'showAsSelected' => true,
					'value'=> (int)$item[1],
					'compare' => $compare
				];
			elseif(Input::has('total')):
				$total += $item[1];
				$totalCompare += $compare;
				$json_data = [
					'key'   => 'total',
					'value' => $total,
					'color' => '#23c6c8',
					'compare' => $totalCompare
				];
			else:
				$json_data[] = [
					'key'   => $item[0],
					'value' => $item[1],
					'color' => '#23c6c8',
					'compare' => $compare
				];
			endif;

			
		}

		return Response::json($json_data);
	}

	public function segments(){
		$segments = $this->ga->segments();
		return $segments;		
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
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function adminDefault(){
		$this->layout = View::make('layouts.budi-layout.layout');
		$this->layout->title = 'List Category';
		$this->layout->breadcrumb = array(
									        array(
									            'title' => 'Dashboard',
									            'link' => URL::current(),
									            'icon' => 'glyphicon-home'
									        ),
									    );
		$comments = Comment::all()->take(10);
		$schedules = Schedule::orderBy('date_start', 'DESC')->paginate(10);
		$this->layout->content = View::make('adminDefault', compact(array('comments', 'schedules')));
	}



}
