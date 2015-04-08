@foreach($items as $item)
  	<li>
		<a href="{{ $item->link }}" class="menu-item @if (isset($activeMenu) && $activeMenu == $item->name) active @endif "><i class="fa fa-newspaper-o"></i> {{ $item->title }}</a>
  	</li>
@endforeach