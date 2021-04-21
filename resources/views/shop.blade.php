@extends('layout')

@section('content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row'>
                @include('partials.sidebar')
                <div class='col-md-9'>
                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            @include('partials.messages')
                            <div class="col col-sm-6 col-md-4">
                                <h4>{{ $categoryName }}</h4>
                            </div>
                            <div class="col col-sm-6 col-md-4">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <div class="col col-sm-12 col-md-4">
                                <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                    <span>Sort by </span>
                                    <button data-toggle="dropdown" type="button" class="btn btn-sm dropdown-toggle">
                                        Price <span class="caret"></span> </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li role="presentation"><a
                                                href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">Lowest
                                                first</a></li>
                                        <li role="presentation"><a
                                                href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">HIghest
                                                first</a></li>
                                    </ul>
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @forelse ($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="{{ route('shop.show', $product->slug) }}"><img
                                                                        src="{{ asset('storage/'.$product->image) }}"
                                                                        alt=""></a>
                                                            </div>
                                                            <!-- /.image -->
                                                            @if ($product->featured)
                                                                <div class="tag hot"><span>hot</span></div>
                                                            @else
                                                                <div class="tag new"><span>new</span></div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price">Rwf
                                                                    {{ $product->presentPrice() }}</span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <form action="{{ route('cart.store') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $product->id }}">
                                                                            <input type="hidden" name="name"
                                                                                value="{{ $product->name }}">
                                                                            <input type="hidden" name="price"
                                                                                value="{{ $product->price }}">
                                                                            <button data-toggle="tooltip"
                                                                                class="btn btn-primary icon" type="submit"
                                                                                title="Add Cart"><i
                                                                                    class="fa fa-shopping-cart"></i></button>
                                                                        </form>
                                                                    </li>
                                                                    <li class="lnk wishlist">
                                                                        <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                            title="Wishlist"> <i class="icon fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a data-toggle="tooltip" class="add-to-cart" href="#"
                                                                            title="Compare"> <i class="fa fa-signal"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                            <!-- /.item -->
                                        @empty
                                            <div>
                                                <h4>No Items Found.</h4>
                                            </div>
                                        @endforelse
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @forelse ($products as $product)
                                        <div class="category-product-inner wow fadeInUp">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                <div class="image"><a
                                                                        href="{{ route('shop.show', $product->slug) }}">
                                                                        <img src="{{ asset('storage/'.$product->image) }}"
                                                                            alt=""></a>
                                                                </div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="detail.html">{{ $product->name }}</a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price">Rwf
                                                                        {{ $product->presentPrice() }}</span>
                                                                </div>
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">
                                                                    {{ $product->description }}</div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                    data-toggle="dropdown" type="button"> <i
                                                                                        class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn"
                                                                                    type="button">Add to cart</button>
                                                                            </li>
                                                                            <li class="lnk wishlist">
                                                                                <a class="add-to-cart" href="#"
                                                                                    title="Wishlist"> <i
                                                                                        class="icon fa fa-heart"></i> </a>
                                                                            </li>
                                                                            <li class="lnk">
                                                                                <a class="add-to-cart" href="#" title="Compare">
                                                                                    <i class="fa fa-signal"></i>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->
                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    <div class="tag new"><span>new</span></div>
                                                    @if ($product->featured)
                                                        <div class="tag hot"><span>hot</span></div>
                                                    @else
                                                        <div class="tag new"><span>new</span></div>
                                                    @endif
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                    @empty
                                        <div style="text-align: left;">No items found</div>
                                    @endforelse
                                    <!-- /.category-product-inner -->
                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.search-result-container -->
                </div>
            </div>
        </div>
    </div>
@endsection
