@extends('layout')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        @if (Cart::instance('wishlist')->count() > 0)
                                            <th colspan="4" class="heading-title">My Wishlist</th>
                                        @endif
                                        @include('partials.messages')
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse (Cart::instance('wishlist')->content() as $item)
                                        <tr>
                                            <td class="col-md-2"><img src="{{ asset('assets/images/products/p4.jpg') }}"
                                                    alt="imga"></td>
                                            <td class="col-md-7">
                                                <div class="product-name"><a
                                                        href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                </div>
                                                <div class="rating">
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star rate"></i>
                                                    <i class="fa fa-star non-rate"></i>
                                                    <span class="review">( 06 Reviews )</span>
                                                </div>
                                                <div class="price">
                                                    Rwf {{ $item->model->presentPrice() }}
                                                </div>
                                            </td>
                                            <td class="col-md-2">
                                                <form action="{{ route('wishlist.switchToCart', $item->rowId) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit" class="btn-upper btn btn-primary"><i
                                                            class="fa fa-shopping-cart inner-right-vs"></i> MOVE TO
                                                        CART</button>
                                                </form>
                                            </td>
                                            <td class="col-md-1 close-btn">
                                                <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" title="remove"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div>
                                            <h3>No Items in your wishlist</h3>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.sigin-in-->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection
