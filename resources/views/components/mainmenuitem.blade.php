@if (count($listmenusub) == 0)
    <li><a href="{{ url($menu->link) }}">{{ $menu->name }}</a></li>
@else
    <li><a href="{{ url($menu->link) }}">{{ $menu->name }}</a>
        {{-- <li><a href="#">About Us</a></li>
    <li><a href="contact">Contact</a></li>
    <li><a href="#">Product Categories</a> --}}
        <ul>
            @foreach ($listmenusub as $row_menu_sub)
                <li><a href="{{ url($row_menu_sub->link) }}">{{ $row_menu_sub->name }}</a></li>
            @endforeach
        </ul>
    </li>
@endif
