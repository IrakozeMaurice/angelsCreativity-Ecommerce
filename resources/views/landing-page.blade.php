@extends('layout')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                @include('partials.sidebar')
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @foreach ($slides as $item)
                            <div class="item" >
                                <img src="{{asset('storage/'.$item->image)}}" class="img-fluid">
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="slider-header fadeInDown-1">{{$item->title}}</div>
                                        <div class="big-text fadeInDown-1"> {{$item->subtitle}} </div>
                                        <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$item->description}}</span> </div>
                                        <div class="button-holder fadeInDown-3"> <a
                                            href="{{ route('shop.show', $item->product->slug) }}"
                                            class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                        </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.item -->
                            @endforeach
                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                    <!-- ========================================= SECTION – HERO : END ========================================= -->
                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->
                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->
                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    @include('partials.messages')
                    <!-- ============================================== NEW PRODUCTS ============================================== -->
                    <section class="section new-products">
                        <div class="clearfix filters-container m-t-10">
                            <div class="row">
                                <div class="col col-sm-6 col-md-4">
                                    <h4>New Products</h4>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="search-result-container ">
                            <div id="myTabContent" class="tab-content category-list">
                                <div class="tab-pane active " id="grid-container">
                                    <div class="category-product">
                                        <div class="row">
                                            @forelse ($newProducts as $newProduct)
                                                <div class="col-sm-6 col-md-4 wow fadeInUp">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    <a href="{{ route('shop.show', $newProduct->slug) }}"><img
                                                                            src="{{ asset('storage/'.$newProduct->image) }}"
                                                                            alt=""></a>
                                                                </div>
                                                                <!-- /.image -->
                                                                <div class="tag new"><span>new</span></div>
                                                            </div>
                                                            <!-- /.product-image -->
                                                            <div class="product-info text-left">
                                                                <h3 class="name"><a
                                                                        href="{{ route('shop.show', $newProduct->slug) }}">{{ $newProduct->name }}</a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>
                                                                <div class="product-price"> <span class="price">Rwf
                                                                        {{ $newProduct->presentPrice() }}</span>
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
                                                                                    value="{{ $newProduct->id }}">
                                                                                <input type="hidden" name="name"
                                                                                    value="{{ $newProduct->name }}">
                                                                                <input type="hidden" name="price"
                                                                                    value="{{ $newProduct->price }}">
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
                                                    <h4>No New Products Available.</h4>
                                                </div>
                                            @endforelse
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.category-product -->

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    <!-- /.search-result-container -->
                    </section>
                    <!-- ============================================== NEW PRODUCTS : END ============================================== -->
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="{{ asset('assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product">
                        <div class="clearfix filters-container m-t-10">
                            <div class="row">
                                <div class="col col-sm-6 col-md-4">
                                    <h4>Featured Products</h4>
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
                                                                <div class="tag hot"><span>hot</span></div>
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
                                                    <h4>No Featured Products Available.</h4>
                                                </div>
                                            @endforelse
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.category-product -->

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    <!-- /.search-result-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="assets/images/banners/home-banner.jpg" alt=""> </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== NEW ARRIVALS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">New Arrivals</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach ($slides as $item)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ route('shop.show', $item->product->slug) }}"><img src="{{asset('storage/'.$item->image)}}" alt=""></a>
                                            </div>
                                            <!-- /.image -->
                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="{{ route('shop.show', $item->product->slug) }}">{{$item->product->name}}</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price">{{$item->product->presentPrice()}}</span></div>
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
                                                                value="{{ $item->product->id }}">
                                                            <input type="hidden" name="name"
                                                                value="{{ $item->product->name }}">
                                                            <input type="hidden" name="price"
                                                                value="{{ $item->product->price }}">
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
                            @endforeach
                            <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== NEW ARRIVALS : END ============================================== -->
                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section id="blog" class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest from blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                @foreach ($posts as $post)
                                    <div class="item">
                                        <div class="blog-post">
                                            <div class="blog-post-image">
                                                <div class="image">
                                                    <a href="#"><img src="{{ asset('storage/' . $post->image) }}"
                                                            alt=""></a>
                                                </div>
                                            </div>
                                            <!-- /.blog-post-image -->
                                            <div class="blog-post-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ route('blog.details', $post->id) }}">{{ $post->title }}</a>
                                                </h3>
                                                <span class="info">By AngelsCreativity &nbsp;|&nbsp;
                                                    {{ $post->updated_at }} </span>
                                                <p class="text">{!! $post->body !!}.</p>
                                                <a href="{{ route('blog.details', $post->id) }}"
                                                    class="lnk btn btn-primary">Read more</a>
                                            </div>
                                            <!-- /.blog-post-info -->
                                        </div>
                                        <!-- /.blog-post -->
                                    </div>
                                    <!-- /.item -->
                                @endforeach
                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->
                </div>
            </div>
        </div>
    </div>
@endsection
