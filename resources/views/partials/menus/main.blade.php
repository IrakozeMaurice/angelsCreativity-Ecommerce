<ul class="nav navbar-nav">
    <li class="menu-item {{ setActiveCategory('/') }}"> <a href="/">Home</a> </li>
    {{-- <li class="menu-item {{ setActiveCategory('shop') }}"><a href="/shop">Shop</a></li> --}}
    @foreach ($categories = getAllCategories() as $category)
        <li class="menu-item {{ setActiveCategory($category->slug) }}">
            <a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
        </li>
    @endforeach
    @foreach ($items as $menu_item)
        <li class="menu-item {{ setActiveCategory($menu_item->title) }}">
            <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
        </li>
    @endforeach
    {{-- <li><a href="#">{{$menu_item}}</a></li> --}}
</ul>
