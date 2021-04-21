@extends('layout')
@section('extra-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row ">
                @include('partials.messages')
                <div class="shopping-cart">
                    @if (Cart::count() > 0)
                        <div class="shopping-cart-table ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-romove item">Action</th>
                                            <th class="cart-description item">Image</th>
                                            <th class="cart-product-name item">Product Name</th>
                                            <th class="cart-qty item">Quantity</th>
                                            <th class="cart-sub-total item">Price</th>
                                            <th class="cart-total last-item">Total</th>
                                        </tr>
                                    </thead>
                                    <!-- /thead -->
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <div class="shopping-cart-btn">
                                                    <span class="text-center">
                                                        <a href="/shop"
                                                            class="btn btn-upper btn-primary outer-left-xs">Continue
                                                            Shopping</a>
                                                    </span>
                                                </div>
                                                <!-- /.shopping-cart-btn -->
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                            <tr>
                                                <td class="text-center">
                                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="remove"
                                                            class="icon btn btn-large btn-danger"><i
                                                                class="fa fa-trash-o"></i></button>
                                                    </form>
                                                    <form action="{{ route('cart.switchToWishlist', $item->rowId) }}"
                                                        method="post" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" title="add to wishlist"
                                                            class="icon btn btn-large btn-warning"><i
                                                                class="icon fa fa-heart"></i></button>
                                                    </form>
                                                </td>
                                                <td class="cart-image">
                                                    <a class="entry-thumbnail"
                                                        href="{{ route('shop.show', $item->model->slug) }}">
                                                        <img src="{{ asset('storage/'.$item->model->image) }}">
                                                    </a>
                                                </td>
                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'><a
                                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                    </h4>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="rating rateit-small"></div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="reviews">
                                                                (06 Reviews)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                                    <div class="cart-product-info">
                                                        <span class="product-color">COLOR:<span>Pink</span></span>
                                                    </div>
                                                </td>
                                                <td class="cart-product-quantity">
                                                    <select class="quantity btn btn-sm" data-id="{{ $item->rowId }}">
                                                        @for ($i = 1; $i < 5 + 1; $i++)
                                                            <option {{ $item->qty == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td class="cart-product-sub-total"><span class="cart-sub-total-price">Rwf
                                                        {{ $item->model->presentPrice() }}</span>
                                                </td>
                                                <td class="cart-product-grand-total"><span
                                                        class="cart-grand-total-price">Rwf
                                                        {{ formatPrice($item->subtotal()) }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!-- /tbody -->
                                </table>
                                <!-- /table -->
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 estimate-ship-tax">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            @if (!session()->has('coupon'))
                                                <span class="estimate-title">Discount Code</span>
                                                <p>Enter your coupon code if you have one..</p>
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if (!session()->has('coupon'))
                                                <form action="{{ route('coupon.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="text" name="coupon_code"
                                                            class="form-control unicase-form-control text-input"
                                                            placeholder="You Coupon..">
                                                    </div>
                                                    <div class="clearfix pull-right">
                                                        <button type="submit" class="btn-upper btn btn-primary">APPLY
                                                            COUPON</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- /tbody -->
                            </table>
                            <!-- /table -->
                        </div>
                        <!-- /.estimate-ship-tax -->
                        <div class="col-md-6 col-sm-12 cart-shopping-total text-right">
                            <div class="row" style="padding: 10px 0; font-weight:bold;">
                                <div class="col-md-4"></div>
                                <div class="col-md-5 text-left">
                                    <div>Subtotal</div>
                                    <div class="spacer"></div>
                                    @if (session()->has('coupon'))
                                        <div>Discount({{ session()->get('coupon')['code'] }})
                                            <span>
                                                <form action="{{ route('coupon.destroy') }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
                                                        style="font-size: 10px;">Remove</button>
                                                </form>
                                            </span>
                                        </div>
                                        <hr>
                                        <div>New Subtotal</div>
                                        <div class="spacer"></div>
                                    @endif
                                    <div><small>Tax(18%)</small></div>
                                    <div class="spacer"></div>
                                    <div style="color: teal; font-size:1.1em;">Total</div>
                                </div>
                                <div class="col-md-3">
                                    <div>Rwf {{ formatPrice(Cart::subtotal()) }}</div>
                                    <div class="spacer"></div>
                                    @if (session()->has('coupon'))
                                        <div>Rwf {{ formatPrice($discount) }}</div>
                                        <hr>
                                        <div>Rwf {{ formatPrice($newSubtotal) }}</div>
                                        <div class="spacer"></div>
                                    @endif
                                    <div><small>(Rwf {{ formatPrice($newTax) }})</small></div>
                                    <div class="spacer"></div>
                                    <div style="color: teal; font-size:1.1em;">Rwf {{ formatPrice($newTotal) }}</div>
                                    <div class="spacer"></div>
                                </div>
                                <a href="{{ route('checkout.index') }}" class="btn-upper btn checkout-btn spacer">Proceed to checkout</a>
                            </div>
                        </div>
                        <!-- /.cart-shopping-total -->
                    @else
                        <h3>No items in Cart!</h3>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                        <div class="shopping-cart-btn">
                            <span class="text-center">
                                <a href="{{ route('shop.index') }}"
                                    class="btn btn-upper btn-primary outer-left-xs">Continue
                                    Shopping</a>
                            </span>
                        </div>
                    @endif
                </div>
                <!-- /.shopping-cart -->
                @include('partials.might-also-like')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
@endsection
@section('extra-js')
    <script>
        (function() {
            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id');
                    axios.patch(`/cart/${id}`, {
                            quantity: this.value
                        })
                        .then(function(response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}';
                        })
                        .catch(function(error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}';
                        });
                })
            });
        })();

    </script>
@endsection
