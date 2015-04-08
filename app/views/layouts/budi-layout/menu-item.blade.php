@foreach($menu as $item)	
  	<li class="list-group-item">
        <a href="{{ $item->link }}" title="{{ $item->title }}">
            <span class="fa-stack fa-lg icons">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="{{ $item->icon }} fa-stack-1x fa-inverse"></i>
            </span>
            <span class="texts">{{ $item->title }}</span>
        </a>
		@if(count($item->menu))
		<ul class="sub-group">
            <div class="menu-title">{{ $item->title }}</div>
            @foreach($item->menu as $item)
                <li>
                    <a href="{{ $item->link }}" class="menu-item @if (isset($activeMenu) && $activeMenu == $item->name) active @endif "><i class="fa fa-newspaper-o"></i> {{ $item->title }}</a>
                </li>
            @endforeach
		</ul> 
		@endif
  	</li>
@endforeach
<li class="list-group-item">
    <a href="{{ URL::to('logout') }}" class=" external-link">
        <span class="fa-stack fa-lg">
            <i class="fa fa-circle green fa-stack-2x"></i>
            <i class="fa fa-power-off fa-stack-1x fa-inverse"></i>
        </span>
        <span class="texts">Logout</span>
    </a>
</li>