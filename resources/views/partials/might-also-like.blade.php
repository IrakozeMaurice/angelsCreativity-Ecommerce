<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">You might also like</h3>
    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
        @foreach ($mightAlsoLike as $mal_product)
            <div class="item item-carousel">
                <div class="products">
                    <div class="product">
                        <div class="product-image">
                            <div class="image">
                                <a href="{{ route('shop.show', $mal_product->slug) }}"><img
                                        src="{{ asset('storage/'.$mal_product->image) }}" alt=""></a>
                            </div><!-- /.image -->
                            <div class="tag sale"><span>sale</span></div>
                        </div><!-- /.product-image -->
                        <div class="product-info text-center">
                            <h3 class="name"><a
                                    href="{{ route('shop.show', $mal_product->slug) }}">{{ $mal_product->name }}</a>
                            </h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price">
                                <span class="price">Rwf {{ $mal_product->presentPrice() }}</span>
                            </div><!-- /.product-price -->
                        </div><!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $mal_product->id }}">
                                            <input type="hidden" name="name" value="{{ $mal_product->name }}">
                                            <input type="hidden" name="price" value="{{ $mal_product->price }}">
                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="submit"
                                                title="Add Cart"><i class="fa fa-shopping-cart"></i></button>
                                        </form>
                                    </li>
                                    <li class="lnk wishlist">
                                        <a data-toggle="tooltip" class="add-to-cart" href="#" title="Wishlist"> <i
                                                class="icon fa fa-heart"></i>
                                        </a>
                                    </li>
                                    <li class="lnk">
                                        <a data-toggle="tooltip" class="add-to-cart" href="#" title="Compare"> <i
                                                class="fa fa-signal" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div><!-- /.action -->
                        </div><!-- /.cart -->
                    </div><!-- /.product -->
                </div><!-- /.products -->
            </div><!-- /.item -->
        @endforeach
    </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
