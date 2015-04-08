@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('album-list'), 'List Album', ['class'=>'btn btn-default-full btn-back']); }}
	</div>
	<div>
		{{ Form::model($album, array('route'=>array('album-update', $album->id), 'method'=>'PUT', 'files'=>true, 'class'=>'form-add')) }}
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, array('class'=>'form-control'))}}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description', null, array('class'=>'form-control')) }}
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
									Browse Image{{ Form::file('images[]', ['class'=>'file']) }}
								</span>
								<a href="#" class="btn btn-default"><i class="fa fa-remove"></i></a>
							</span>
							{{ Form::text('descriptions[]','',['class'=>'form-control'])}}
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
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div id="container-masonry" class="row">
							@foreach($album->photos as $photo)
						  	<div class="col-md-3 col-xs-6 item-masonry thumb-container">
							    <div class="thumb">
							    	{{ HTML::image('albums/thumb_'.$photo->file) }}
							    	<span class="thumb-caption">
							    		<a href="#" class="btn-delete-ajax"><i class="fa fa-plus"></i></a>
							    	</span>
							    	{{ Form::hidden('current_images[]', $photo->id) }}
							    </div>
						  	</div>
						  	@endforeach
						</div>
					</div>
				</div>
			</div>
		{{ Form::close() }}
	</div>
@stop