@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="box-main">
			<div class="box-header">
				Page Views <i class="fa fa-desktop text-primary pull-right"></i>
			</div>
			<div class="box-content">
				<div class="box-content-1">
					<input type="text" class="knob" data-number="knob-1" data-fgColor="#23c6c8" data-width="50" data-min="0" data-max="1000" value="0" data-params='{"dimensions":"ga:country", "metrics":"ga:pageviews", "total":"1"}' data-url="{{ URL::to('googleAnalytics') }}"/>
				</div>
				<div class="box-content-2">
					<div class="box-content-2-number"><span id="knob-1">0</span> <span id="knob-1-icon" class="pull-right"><i class="fa fa-arrow-circle-o-up"></i></span></div>
					<div class="text-small">Total Page Views</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-3">
		<div class="box-main">
			<div class="box-header">
				Revenue <i class="fa fa-money text-primary pull-right"></i> 
			</div>
			<div class="box-content">
				<div class="box-content-1">
					<input type="text" class="knob" data-number="knob-2" data-fgColor="#23c6c8" data-width="50" data-min="0" data-max="10" value="0" data-params='{"dimensions":"ga:transactionId", "metrics":"ga:transactionRevenue", "total":"1"}' data-url="{{ URL::to('googleAnalytics') }}"/>
				</div>
				<div class="box-content-2">
					<div class="box-content-2-number"><span id="knob-2">0</span> <span id="knob-2-icon" class="pull-right"><i class="fa fa-arrow-circle-o-up"></i></span></div>
					<div class="text-small">Total Revenue</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-3">
		<div class="box-main">
			<div class="box-header">
				Visitors <i class="fa fa-male text-primary pull-right"></i>
			</div>
			<div class="box-content">
				<div class="box-content-1">
					<input type="text" class="knob" data-number="knob-3" data-fgColor="#23c6c8" data-width="50" data-min="0" data-max="1000" value="0" data-params='{"dimensions":"ga:userType", "metrics":"ga:users", "total":"1"}' data-url="{{ URL::to('googleAnalytics') }}"/>
				</div>
				<div class="box-content-2">
					<div class="box-content-2-number"><span id="knob-3">0</span> <span id="knob-3-icon" class="pull-right"><i class="fa fa-arrow-circle-o-up"></i></span></div>
					<div class="text-small"> Total Visitors</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-3">
		<div class="box-main">
			<div class="box-header">
				New Visitors <i class="fa fa-male text-primary pull-right"></i>
			</div>
			<div class="box-content">
				<div class="box-content-1">
					<input type="text" class="knob" data-number="knob-4" data-fgColor="#23c6c8" data-width="50" data-min="0" data-max="1000" value="0" data-params='{"dimensions":"ga:userDefinedValue", "metrics":"ga:newUsers", "total":"1"}' data-url="{{ URL::to('googleAnalytics') }}"/>
				</div>
				<div class="box-content-2">
					<div class="box-content-2-number"><span id="knob-4">0</span> <span id="knob-4-icon" class="pull-right"><i class="fa fa-arrow-circle-o-up"></i></span></div>
					<div class="text-small"> New Visitors</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	
	<div class="col-md-12">
		<div class="upper-menu">
			<div class="upper-menu-title">
				<i class="fa fa-map-marker"></i> Visitors Country 
				<div class="btn-group pull-right">
					<a href="#" class="btn btn-default-full btn-xs btn-range-2" data-range="day">Day</a>
					<a href="#" class="btn btn-default-full btn-xs btn-range-2" data-range="week">Week</a>
					<a href="#" class="btn btn-default btn-xs btn-range-2" data-range="month">Month</a>
				</div>
			</div>
		</div>
		<div class="middle-menu bg-white">
			<div class="row">
				<div class="col-md-9">
					<div id="chart-google-map" class="" style="width: 100%; min-height: 310px; padding: 10px; position: relative;">
									
					</div>
				</div>
				<div class="col-md-3">
					<div class="scrolling-y" style="height:300px;">
						<table class="table">
							<thead>
								<tr>
									<td colspan="2" class="text-primary bold text-upper">Visitors Country</td>
								</tr>
							</thead>
				    		<tbody id="data-visitors">
							</tbody>
						</table>
					</div>
			    </div>
			</div>
		</div>
		<div class="lower-menu">
		   	<a class="lower-menu-link" href="{{ URL::route('schedule-list') }}"><i class="fa fa-plus"></i></a>
		</div>
	</div>
	<div class="col-md-12">
		<div class="upper-menu bg-whitex">
			<div class="upper-menu-title">
				<i class="fa fa-globe"></i> Visitors by country 
				<div class="btn-group pull-right">
					<a href="#" class="btn btn-default-full btn-xs btn-range" data-range="day">Day</a>
					<a href="#" class="btn btn-default-full btn-xs btn-range" data-range="week">Week</a>
					<a href="#" class="btn btn-default btn-xs btn-range" data-range="month">Month</a>
				</div>
			</div>
		</div>
		<div class="middle-menu bg-white">
			<div class="row">
				<div class="col-md-9">
					<div id="chart-google-country" class="bg-white" style="width: 100%; min-height: 310px; padding: 0px; position: relative;">
									
					</div>
				</div>
				<div class="col-md-3">
					<table class="table">
						<thead>
							<tr>
								<td colspan="2" class="text-primary bold text-upper">Top 3 Visitors</td>
							</tr>
						</thead>
			    		<tbody id="data-big-3">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="lower-menu">
		   	<a class="lower-menu-link" href="{{ URL::route('schedule-list') }}"><i class="fa fa-plus"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="container-menu">
			<div class="upper-menu">
				<div class="upper-menu-title"><i class="fa fa-stethoscope"></i> Latest Schedules</div>
			</div>
			<div class="middle-menu scrolling-y" style="height:680px;">
				<table class="table">
		    		<tbody>
					@foreach($schedules as $item)
						<tr>
							<td style="width:55px;">
								<div class="data-thumb">
									{{ HTML::image('profile/thumb_'.$item->staff->file) }}
								</div>
							</td>
							<td>
								<div class="bold text-upper">
									<i class="fa fa-hospital-o"></i>  &nbsp;{{{ $item->place }}}
								</div>
								<div class=" ">
									<i class="fa fa-user-md"></i>  &nbsp;<span class="text-small">{{{ $item->staff->name }}}</span>
								</div>
								<span class="text-small">
									<i class="fa fa-calendar text-primary bold "></i> &nbsp; {{{ date("d M Y", strtotime($item->date_start)) }}}
								</span>
								<span class="text-small pull-right">
									<i class="fa fa-clock-o text-primary bold "></i> &nbsp; {{{ date("H:i:s", strtotime($item->date_start)) }}}
								</span>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
		    </div>
		    <div class="lower-menu">
		    	<a class="lower-menu-link" href="{{ URL::route('schedule-list') }}"><i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="container-menu">
			<div class="upper-menu">
				<div class="upper-menu-title"><i class="fa fa-bar-chart-o"></i> EVENTS BY MONTH</div>
			</div>
			<div class="middle-menu">
				<div class="row">
					<div class="col-md-12">
						<div id="chart-schedules" class="" style="width: 100%; min-height: 310px; padding: 0px; position: relative;">
										
						</div>
					</div>
				</div>
			</div>
			<div class="lower-menu">
			   	<a class="lower-menu-link" href="{{ URL::route('schedule-list') }}"><i class="fa fa-plus"></i></a>
			</div>
		</div>

		<div class="container-menu">
			<div class="upper-menu">		
				<div class="upper-menu-title"><i class="fa fa-twitch"></i> Latest Events</div>
			</div>
			<div class="middle-menu">
				<div id="chart-donut-schedules" class="" style="width: 100%; min-height: 310px; padding: 0px; position: relative;">
									
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="container-menu">
			<div class="middle-menu">
				<div id="chart-articles" class="bg-white" style="width: 100%; min-height: 350px; padding: 0px; position: relative;">
									
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="container-menu">
			<div class="upper-menu">
				<div class="upper-menu-title"><i class="fa fa-bar-chart-o"></i> POST CATEGORIES</div>
			</div>
			<div class="middle-menu scrolling-y">
				<table class="table">
		    		<tbody id="data-articles">
					</tbody>
				</table>
		    </div>
		    <div class="lower-menu">
		    	<a class="lower-menu-link" href="{{ URL::route('posts-list') }}"><i class="fa fa-plus"></i></a>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="container-menu">
			<div class="upper-menu">		
				<div class="upper-menu-title"><i class="fa fa-newspaper-o"></i> Top 5 Popular Posts</div>
			</div>
			<div class="middle-menu">
				
				<div id="chart-top-post" class="" style="width: 100%; min-height: 310px; padding: 0px; position: relative;">
									
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="container-menu">
			<div class="upper-menu">		
				<div class="upper-menu-title"><i class="fa fa-twitch"></i> New Comments</div>
			</div>
			<div class="middle-menu scrolling-y">
				<table class="table">
					@foreach($comments as $comment)
					<tr>
						<td>
							<span class="bold">{{{ $comment->name }}}</span> <span class="text-gray">commented on</span>
							<span class=""><a href="#">{{{ substr($comment->post->title, 0, 60) }}} ... </a></span>
							<div class="text-small text-gray"><i class="fa fa-clock-o"></i> {{ date("d F Y",strtotime($comment->created_at)) }} at {{ date("g:ha",strtotime($comment->created_at)) }}</div>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<div class="lower-menu">
				<a class="lower-menu-link" href="{{ URL::route('comment-list') }}"><i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
</div>
@stop