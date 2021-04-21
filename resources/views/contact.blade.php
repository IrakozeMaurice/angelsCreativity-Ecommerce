@extends('layout')

@section('content')

<div class="body-content">
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Contact Us</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.breadcrumb -->
    <div class="container">
        <div class="track-order-page">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading-title">Contact Us</h2>
                    <span class="title-tag inner-top-ss">Please fill in the box below. This was given to you on your receipt and in the confirmation email you should have received. </span>
                    <form class="register-form outer-top-xs" role="form">
                        <div class="form-group">
                            {{-- <label class="info-title" for="email">Email</label> --}}
                            {{-- <input type="text" class="form-control unicase-form-control text-input" id="exampleOrderId1"> --}}
                            <input type="email" class="form-check-input form-group form-control" placeholder="Email address">
                        </div>
                        <div class="form-group">
                            {{-- <input type="" class="form-control unicase-form-control text-input" id="exampleBillingEmail1"> --}}
                            <textarea class="form-group form-control">Your message...</textarea>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.sigin-in-->
    </div>
</div>

@endsection
