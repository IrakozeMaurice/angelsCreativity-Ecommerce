@extends('layout')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="/cart">Cart</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="checkout-box ">
                @include('partials.messages')
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Delivery Information</h4>
                            </div>
                            <form action="{{ route('checkout.store') }}" method="POST">
                                @csrf
                                <div class="panel-body">
                                    @if (auth()->check())
                                        <input type="email" name="email" class="form-control form-group"
                                            value="{{ auth()->user()->email }}" readonly>
                                    @else
                                        <input type="email" class="form-control form-group" name="email"
                                            placeholder="Email address" required>
                                    @endif
                                    <div class="input-group form-group">
                                        <input type="text" name="firstname" class="form-control" placeholder="First name"
                                            required>
                                        <span class="input-group-addon"></span>
                                        <input type="text" name="lastname" class="form-control" placeholder="Last name"
                                            required>
                                    </div>
                                    <input type="text" name="address" class="form-control form-group" placeholder="Address"
                                        required>
                                    <input type="text" name="street" class="form-control form-group" placeholder="Street"
                                        required>
                                    <input type="text" name="sector" class="form-control form-group" placeholder="Sector"
                                        required>
                                    <input type="text" name="district" class="form-control form-group"
                                        placeholder="District" required>
                                    <input type="text" name="city" class="form-control form-group" placeholder="City"
                                        required>
                                    <input type="text" name="country" class="form-control form-group" placeholder="Country"
                                        required>
                                    <input type="number" name="phone" class="form-control form-group" placeholder="Phone"
                                        required>
                                </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">Payment Method</h4>
                            </div>
                            <div class="panel-body">
                                <span class="btn btn-warning momo"><i class="fa fa-money"></i> Mobile money</span>
                                <span class="btn btn-info"><i class="fa fa-paypal"></i> Pay pal</span>
                                <span class="btn btn-success"><i class="fa fa-cc-stripe"></i> Stripe</span>
                                <p class="momo-code spacer" style="display: none;">momo code
                                    <span><b>*182*8*1*xxxxx# </b> name: <b>angels Ltd.</b></span>
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-large btn-primary" id="complete-order">Complete
                            Order</button>
                        </form>
                        <div class="spacer"></div>
                        <div class="spacer"></div>
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Order Summary</h4>
                                    </div>
                                    <div class="row">
                                        <table class="table">
                                            @foreach (Cart::content() as $item)
                                                <tr>
                                                    <td style="width: 100px; height:100px;">
                                                        <img class="img-responsive img-fluid"
                                                            src="{{ asset('storage/'.$item->model->image) }}">
                                                    </td>
                                                    <td>{{ $item->model->details }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>Rwf {{ formatPrice($item->subtotal()) }}</td>
                                                </tr>
                                            @endforeach
                                            <tfoot>
                                                <tr style="color: teal;">
                                                    <th><small>(Tax)</small></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><small>(Rwf {{ formatPrice(Cart::tax()) }})</small></th>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Rwf {{ formatPrice(Cart::total()) }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
@section('extra-js')
    <script>
        document.querySelector('.momo').addEventListener('click', function() {
            const element = document.querySelector('.momo-code');
            element.style.display = element.style.display == "none" ? "block" : "none";
        });

    </script>
@endsection
