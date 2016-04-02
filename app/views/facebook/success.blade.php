@section('content')
	<div>Login As {{ $facebook_user['name'] }}</div>
	{{ Html::linkicon(URL::route('admin-default'), '<i class="fa fa-home"></i> Back To Dashboard', ['class'=>'btn btn-default']) }} | {{ Html::linkicon(URL::route('posts-list'), '<i class="fa fa-facebook"></i> Create Article & Post To Facebook', ['class'=>'btn btn-default']) }} 
@stop