@extends('layout')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class='active'>Search</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">Search results</h4>
                            <b><small>{{ $products->total() }} result(s) for
                                    '{{ request()->input('query') }}'</small></b>
                        </div>
                        <table class="table">
                            @foreach ($products as $product)
                                <tr>
                                    <td style="width: 120px; height:100px;">
                                        <a href="{{ route('shop.show', $product->slug) }}">
                                            <img class="img-responsive img-fluid img-thumbnail"
                                                src="{{ asset('storage/'.$product->image) }}" alt=""></a>
                                    </td>
                                    <td><b><a
                                                href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a></b><br>{{ $product->details }}
                                    </td>
                                    <td style="width: 100px;">Rwf {{ $product->price }}</td>
                                    <td>
                                        {{-- <button class="btn btn-primary btn-sm">Add to Cart</button> --}}
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> ADD TO
                                                CART</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            {{ $products->appends(request()->input())->links() }}
                        </div>
                        </tr>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
    </div>
    <!-- /.body-content -->
@endsection
