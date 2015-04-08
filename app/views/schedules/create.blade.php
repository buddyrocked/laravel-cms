@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('schedule-list'), 'LIST schedule', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('route'=>'schedule-store', 'method'=>'POST', 'class'=>'form-add', 'files'=>true)) }}
		{{ Form::token() }}
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					{{ Form::label('place', 'Place') }}
					{{ Form::text('place',Input::old('Place'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description',Input::old('description'), ['class'=>'form-control tinymce']) }}
				</div>
			</div>
			<div class="col-md-4">				
				<div class="form-group">
					{{ Form::label('staff_id','Staff') }}
					{{ Form::select('staff_id', Staff::lists('name', 'id'), Input::old('staff_id'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('date_start', 'Open', ['class'=>'']) }}
					<div class='input-group date datetimepicker' id=''>
						{{ Form::text('date_start', Input::old('date_start'), ['class'=>'form-control']) }}
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
				</div>
				<div class="form-group">
					{{ Form::label('date_close', 'Close', ['class'=>'']) }}
					<div class='input-group date datetimepicker' id=''>
						{{ Form::text('date_close', Input::old('date_close'), ['class'=>'form-control']) }}
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                </div>
				</div>
				<div class="form-group">
					{{ Form::label('file', 'Image', ['class'=>'']) }}
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-default btn-flat btn-file">							
								Browse Image {{ Form::file('file', ['class'=>'file']) }}
							</span>
							<a href="#" class="btn btn-default btn-flat"><i class="fa fa-remove"></i></a>
						</span>
						<input type="text" class="form-control" readonly="">
					</div>
				</div>
				<div class="form-group right">
					{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
				</div>
			</div>
		</div>
	{{ Form::close() }}
@stop