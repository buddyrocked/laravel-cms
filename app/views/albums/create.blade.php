@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('album-list'), 'List Album', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	
	<div>
		{{ Form::open(array('route'=>'album-store', 'files'=>true, 'method'=>'POST', 'class'=>'form-add')) }}
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', Input::old('name'), array('class'=>'form-control'))}}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description', Input::old('description'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<a href="#" class="btn btn-default" id="btn-add-image"><i class="fa fa-plus"></i></a>
			</div>
			
			<div id="images">
				<div  id="input-image">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">							
									Browse File{{ Form::file('images[]', ['class'=>'file']) }}
								</span>
								<a href="#" class="btn btn-default"><i class="fa fa-remove"></i></a>
							</span>
							{{ Form::text('descriptions[]','',array('class'=>'form-control')) }}
							<span class="input-group-btn">
								<button type="button" class="btn btn-default btn-remove-image"><i class="fa fa-remove"></i></button>
							</span>							
						</div>
					</div>
				</div>
			</div>
			<div class="form-group right">
				{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
			</div>
		{{ Form::close() }}
	</div>
@stop