@extends('layout')

@section('content')
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                @include('partials.sidebar')
                <div class='col-md-9'>
                    <div class="detail-block">
                        @include('partials.messages')
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="#">
                                                <img class="img-responsive" alt=""
                                                    src="{{ asset('storage/' . $product->image) }}"
                                                    data-echo="{{ asset('storage/' . $product->image) }}" />
                                            </a>
                                        </div>
                                        <!-- /.single-product-gallery-item -->
                                        @if ($product->images)
                                        @foreach (json_decode($product->images, true) as $index => $image)
                                                <div class="single-product-gallery-item" id="slide{{$index}}">
                                                    <a data-lightbox="image-{{$index}}" data-title="Gallery"
                                                        href="{{ asset('storage/' . $image) }}">
                                                        <img class="img-responsive" alt=""
                                                            src="{{ asset('storage/' . $image) }}"
                                                            data-echo="{{ asset('storage/' . $image) }}" />
                                                    </a>
                                                </div>
                                                <!-- /.single-product-gallery-item -->
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            @if ($product->images)
                                                @foreach (json_decode($product->images, true) as $index => $image)
                                                    <div class="item">
                                                        <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                            data-slide="{{$index}}" href="#slide{{$index}}">
                                                            <img class="img-responsive" width="85" alt=""
                                                                src="{{ asset('storage/' . $image) }}"
                                                                data-echo="{{ asset('storage/' . $image) }}" />
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <!-- /#owl-single-product-thumbnails -->
                                    </div>
                                    <!-- /.gallery-thumbs -->
                                </div>
                                <!-- /.single-product-gallery -->
                            </div>
                            <!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{ $product->name }}</h1>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.rating-reviews -->
                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.stock-container -->
                                    <div class="description-container m-t-20">
                                        {!! $product->description !!}
                                    </div>
                                    <!-- /.description-container -->
                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">Rwf {{ $product->presentPrice() }}</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">

                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.price-container -->
                                    <div class="quantity-container info-container">
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-shopping-cart inner-right-vs"></i> ADD TO
                                                        CART</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.quantity-container -->
                                </div>
                                <!-- /.product-info -->
                            </div>
                            <!-- /.col-sm-7 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ============================================== MIGHT ALSO LIKE ============================================== -->
                    @include('partials.might-also-like')
                    <!-- ============================================== MIGHT ALSO LIKE : END ======================================= -->
                </div>
                <!-- /.col -->
                <div class="clearfix"></div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection
