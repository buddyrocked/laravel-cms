
@section('content')
	<div class="upper-menu">
		{{ Form::open(array('route'=>'comment-list', 'method'=>'GET', 'class'=>'form-inline')) }}
			<div class="input-group">
				{{ Form::text('name', '', array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-default-full btn-flat')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	{{ Form::open(array('route'=>array('comment-action'), 'method'=>'PUT', 'class'=>'form-confirm form-delete')) }}
	<div class="middle-menu">
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>Name</th>
					<th class="hidden-xs">Email</th>
					<th>Comment</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			@foreach($comments as $comment)
			<tr>
				<td>
					{{ Form::checkbox('comment['.$comment->id.'][check]') }}
					{{ Form::hidden('comment['.$comment->id.'][id]', $comment->id) }}
				</td>
				<td>
					{{{ $comment->name }}}
				</td>
				<td class="hidden-xs">
					{{{ $comment->email }}}
				</td>
				<td>
					{{{ $comment->content }}}
				</td>
				<td class="@if($comment->status == 1) td-info @else td-danger @endif">
					@if($comment->status == 1)
						<i class="fa fa-check-circle"></i> approved
					@else
						<i class="fa fa-question-circle"></i> pending
					@endif
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="lower-menu right">
		<div class="btn-group">
			{{ Form::button('<i class="fa fa-check"></i> Approve Comment', array('type'=>'submit', 'value'=>'approve', 'name'=>'approve', 'class'=>'btn btn-default-full')) }}
			{{ Form::button('<i class="fa fa-remove"></i> Delete Comment', array('type'=>'submit', 'value'=>'delete', 'name'=>'delete', 'class'=>'btn btn-default-full btn-delete')) }}
		</div>
	</div>
	{{ Form::close() }}
	<div class="right">
		{{ $pagination }}
	</div>
@stop