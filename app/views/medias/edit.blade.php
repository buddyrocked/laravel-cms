@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('media-list'), 'List media', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	<div>
		{{ Form::model($media, array('route'=>array('media-update', $media->id), 'method'=>'PUT', 'files'=>true, 'class'=>'form-add')) }}
			<div class="form-group">
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', null, array('class'=>'form-control'))}}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description') }}
				{{ Form::textarea('description', null, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('status', 'Status') }}
				<p>
					{{ Form::checkbox('status', true, Input::old('status'), ['class'=>'bootstrap-switch']) }}
				</p>
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
							{{ Form::text('descriptions[]','',['class'=>'form-control'])}}
							<span class="input-group-btn">
									<button type="button" class="btn btn-default btn-remove-image"><i class="fa fa-remove"></i></button>
							</span>							
						</div>
					</div>
				</div>
				
			</div>
			<div class="upper-menu">
				<div class="row">
					<div class="col-md-12"></div>
				</div>
			</div>
			<div class="middle-menu">
				<table class="table">
					<thead>
						<tr>
							<th>file</th>
							<th>ext</th>
							<th>remove</th>
						</tr>
					</thead>
					<tbody>
						@foreach($media->mediaItems as $item)
					  	<tr class="thumb-container">
						    <td>
						    	{{{ $item->file }}}
						    	{{ Form::hidden('current_items[]', $item->id) }}
						    </td>
						    <td>
						    	{{{ $item->description }}}
						    </td>
						    <td>
						    	<span class="center">
						    		<a href="#" class="btn-delete-ajax"><i class="fa fa-remove"></i></a>
						    	</span>
						    </td>
					  	</tr>
					  	@endforeach
					</tbody>
			  </table>
			</div>
			<div class="lower-menu right">
				<div>
				{{ Form::button('<i class="fa fa-check"></i> UPDATE', array('type'=>'submit', 'name'=>'UPDATE', 'class'=>'btn btn-default-full')) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
@stop