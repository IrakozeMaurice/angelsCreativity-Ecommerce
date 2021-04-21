@extends('layout')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li class='active'>My orders</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.breadcrumb -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Angels Creativity</div>
                        <nav class="yamm megamenu-horizontal">
                            <ul class="nav">
                                <li class="menu-item {{ setActiveCategory('users') }}"><a href="{{ route('users.edit') }}"><i class="icon fa fa-list-alt" aria-hidden="true"></i>My profile</a></li>
                                <li class="menu-item {{ setActiveCategory('orders') }}"><a href="{{ route('orders.index') }}"><i class="icon fa fa-list-alt" aria-hidden="true"></i>My orders</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <h4 style="margin-top: 0;">Order ID: {{ $order->id }}</h4>
                    <hr>
                    @include('partials.messages')
                    @foreach ($products as $product)
                        <div class="pull-left" style="width: 150px; height: 200px;margin-right: 20px;">
                            <img src="{{asset('storage/'. $product->image)}}" class="img-responsive">
                        </div>
                        <div class="clearfix">
                            <ul>
                                <li>{{ $product->name }}</li>
                                <li>{{ $product->details }}</li>
                                <li>Rwf {{ $product->presentPrice() }}</li><br>
                                <li><a href="{{ route('shop.show', $product->slug) }}" class="btn btn-info btn-sm">Buy it again</a></li>
                            </ul>
                        </div>
                        <br>
                    @endforeach
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection
