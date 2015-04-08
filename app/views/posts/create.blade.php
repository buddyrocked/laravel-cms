@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('posts-list'), 'List Post', ['class'=>'btn btn-default-full btn-back']); }}
	</div>
	<div>
		{{ Form::open(array('route'=>'posts-store', 'files'=>true, 'class'=>'form-horizontal form-add')) }}
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						{{ Form::label('category_id','Category') }}
						{{ Form::select('category_id', Category::lists('name', 'id'), Input::old('category_id'), ['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', 'Title', ['class'=>'']) }}
						{{ Form::text('title', Input::old('name'), ['class'=>'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('headline', 'Headline', ['class'=>'']) }}
						{{ Form::textarea('headline', Input::old('headline'), ['class'=>'form-control ']) }}
					</div>
					<div class="form-group">
						{{ Form::label('content', 'Content', ['class'=>'']) }}
						{{ Form::textarea('content', Input::old('content'), ['class'=>'form-control tinymce']) }}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('image', 'Image', ['class'=>'']) }}
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-flat btn-file">							
									Browse Image {{ Form::file('image', ['class'=>'file']) }}
								</span>
								<a href="#" class="btn btn-default btn-flat"><i class="fa fa-remove"></i></a>
							</span>
							<input type="text" class="form-control" readonly="">
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('tags', 'Tag') }}
						{{ Form::text('tags', '', ['id'=>'tags', 'class'=>'form-control']) }}
					</div>										
					<div class="row">		
						<div class="form-group col-md-6 col-xs-6">
							{{ Form::label('is_comment', 'Enable Comment') }}
							<p>
								{{ Form::checkbox('is_comment', true, Input::old('is_comment'), ['class'=>'bootstrap-switch']) }}
							</p>
						</div>		
						<div class="form-group col-md-6 col-xs-6">
							{{ Form::label('status', 'Publish') }}
							<p>
								{{ Form::checkbox('status', true, Input::old('status'), ['class'=>'bootstrap-switch']) }}
							</p>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('date_posting', 'Posting Date', ['class'=>'']) }}
						<div class='input-group date datetimepicker' id=''>
							{{ Form::text('date_posting', Input::old('date_posting'), ['class'=>'form-control']) }}
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
					</div>
					<div class="form-group">
						{{ Form::label('comment_expired', 'Comment Expired', ['class'=>'']) }}
						<div class='input-group date datetimepicker' id=''>
							{{ Form::text('comment_expired', Input::old('comment_expired'), ['class'=>'form-control']) }}
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
					</div>
					<div class="form-group">
						{{ Form::label('postalbums','Album') }}
						{{ Form::select('postalbums', array('default'=>'Select Album') + Album::lists('name', 'id'), Input::old('postalbums'), ['class'=>'form-control']) }}
					</div>
					<div class="form-group right">
						{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
					</div>
				</div>
			</div>
		{{ Form::close() }}
	</div>
@stop
					