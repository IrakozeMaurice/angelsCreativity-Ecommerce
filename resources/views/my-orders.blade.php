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
                <div class="col-md-8">
                    <h4 style="margin-top: 0;">my orders</h4>
                    <hr>
                    @include('partials.messages')
                    <table class="table">
                        <tr>
                            <th>Order Date</th>
                            <th>Order Details</th>
                            <th>Products</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    <ul>
                                        <li># of products: {{$order->products->count()}}</li>
                                        <li>Total: Rwf {{formatPrice($order->total)}}</li>
                                        <li>Payment Gateway: {{$order->payment_gateway}}</li>
                                        <li><a href="{{ route('orders.show',$order->id) }}" class="btn btn-info btn-sm">View details</a></li>
                                    </ul>
                                </td>
                                <td>
                                    @foreach ($order->products as $product)
                                        <ul>
                                            <li>Name: {{$product->name}}</li>
                                            <li>Price: Rwf {{$product->presentPrice()}}</li>
                                        </ul>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection
