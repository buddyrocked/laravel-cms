@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('staff-list'), 'LIST staff', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::model($staff, array('route'=>array('staff-update', $staff->id), 'method'=>'PUT', 'class'=>'form-add', 'files'=>true)) }}
		{{ Form::token() }}
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name',null, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('position_id','Posisi') }}
					{{ Form::select('position_id', Position::lists('name', 'id'), null, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('motto', 'Motto', ['class'=>'']) }}
					{{ Form::textarea('motto', null, ['class'=>'form-control ']) }}
				</div>
				<div class="form-group">
					{{ Form::label('file', 'Photo', ['class'=>'']) }}
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
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('username', 'username', ['class'=>'']) }}
					{{ Form::text('user[username]', $staff->user->username, ['class'=>'form-control']) }}
					{{ Form::hidden('user[id]', $staff->user_id, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', ['class'=>'']) }}
					{{ Form::text('user[email]', $staff->user->email, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', 'Password', ['class'=>'']) }}
					{{ Form::password('user[password]', ['class'=>'form-control', 'required'=>'required']) }}
				</div>
				<div class="form-group">
	                @if($currentUser->hasAccess(Config::get('syntara::permissions.addUserGroup')))
                        <label class="control-label">{{ trans('syntara::users.groups') }}</label>
                        <div class="form-group">
                        @foreach($groups as $group)
                        <label class="checkbox-inline">
                            <input type="checkbox" id="groups[{{ $group->getId() }}]" name="groups[]" value="{{ $group->getId() }}"  @if (in_array($group->getId(), $current_groups)) checked="checked" @endif />{{ $group->getName() }}
                        </label>
                        @endforeach
                        </div>
                    @endif
                </div>
				<div class="form-group">
					{{ Form::label('banned', 'Banned') }}
					<p>
						{{ Form::checkbox('user[banned]', true, Input::old('[user][banned]'), ['class'=>'bootstrap-switch']) }}
					</p>
				</div>
				<div class="form-group">
					{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
				</div>
			</div>
		</div>
	{{ Form::close() }}
@stop