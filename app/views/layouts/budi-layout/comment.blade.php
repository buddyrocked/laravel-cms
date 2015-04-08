@foreach($comments as $item)	
  	<div class="notif-body">
        <div class="notif-photo">
            <i class="fa fa-user"></i>
        </div>
        <div class="notif-message">
            <a href="{{ URL::route('comment-list') }}">{{{ $item->content }}}</a>
        </div>
    </div>
@endforeach