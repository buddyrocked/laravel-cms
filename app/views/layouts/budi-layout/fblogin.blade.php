@if(Session::get('fb_access_token') != null)
<div class="blog-sidebar-text">
	{{ HTML::link(URL::to($facebook['loginUrl']), 'LOGIN') }}
</div>
@endif