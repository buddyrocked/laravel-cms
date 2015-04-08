
@section('content')
	<div class="upper-menu">
		{{ HTML::link(URL::route('menu-list'), 'List Menu', ['class'=>'btn btn-default-full btn-back']) }}
	</div>
	<div>
	{{ Form::open(array('route'=>'menu-store', 'class'=>'form-horizontal form-add')) }}
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', Input::old('title'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('url', 'Route') }}
					{{ Form::select('url', ['#'=>'#'] + app('list_routes'), Input::old('url'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('parent_id', 'Parent') }}
					{{ Form::select('parent_id', ['0'=>'ROOT'] + Menus::lists('title', 'id'), Input::old('parent_id'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('icon', 'Icon') }}
					<p>
					{{ Form::selectpicker('icon', Config::get('app.fontawesome'), Input::old('icon'), ['class'=>'selectpicker']) }}
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('class', 'Class') }}
					{{ Form::text('class', Input::old('class'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('order', 'Order') }}
					{{ Form::number('order', Input::old('order'), ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('disable', 'Disable Menu') }}
					<p>
						{{ Form::checkbox('disable', true, Input::old('disable'), ['class'=>'bootstrap-switch']) }}
					</p>
				</div>
				<div class="form-group">
		            <label class="control-label">{{ trans('syntara::users.groups') }}</label>
		            <div class="form-group">
		            @foreach($groups as $group)
		            <label class="checkbox-inline">
		                <input type="checkbox" id="groups[{{ $group->getId() }}]" name="groups[]" value="{{ $group->getId() }}">{{ $group->getName() }}
		            </label>
		            @endforeach
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