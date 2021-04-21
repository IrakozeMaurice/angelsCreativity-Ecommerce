<!-- ============================================== SIDEBAR ============================================== -->
<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

    <!-- ================================== TOP NAVIGATION ================================== -->
    <div class="side-menu animate-dropdown outer-bottom-xs">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
        <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                @foreach ($categories = getAllCategories() as $category)
                <li class="menu-item {{ setActiveCategory($category->slug) }}"><a href="{{ route('shop.index', ['category' => $category->slug]) }}"><i
                                class="icon fa fa-list-alt" aria-hidden="true"></i>{{ $category->name }}</a>
                </li>
                @endforeach
                <!-- /.menu-item -->
            </ul>
            <!-- /.nav -->
        </nav>
        <!-- /.megamenu-horizontal -->
    </div>
    <!-- /.side-menu -->
    <!-- ================================== TOP NAVIGATION : END ================================== -->
    <!-- ============================================== SPECIAL OFFER ============================================== -->
    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
        <h3 class="section-title">Special Offer</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                    <div class="products special-product">
                        <div class="product">
                            <div class="product-micro">
                                @foreach ($specialProducts = getSpecialProducts() as $specialProduct)
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="{{ route('shop.show', $specialProduct->slug) }}"> <img src="{{ asset('assets/images/products/p30.jpg') }}" alt=""> </a>
                                            </div>
                                            <!-- /.image -->
                                        </div>
                                        <!-- /.product-image -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a href="{{ route('shop.show', $specialProduct->slug) }}">{{ $specialProduct->name }}</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price"> <span class="price">Rwf
                                                        {{ $specialProduct->presentPrice() }}</span> </div>
                                            <!-- /.product-price -->
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.product-micro-row -->
                                @endforeach
                            </div>
                            <!-- /.product-micro -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
    <!-- ============================================== PRODUCT TAGS ============================================== -->
    <div class="sidebar-widget product-tag wow fadeInUp">
        <h3 class="section-title">Product tags</h3>
        <div class="sidebar-widget-body outer-top-xs">
            <div class="tag-list">
                @foreach ($categories=getAllCategories() as $category)
                    <a class="item" title="{{$category->name}}" href="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</a>
                @endforeach
            </div>
            <!-- /.tag-list -->
        </div>
        <!-- /.sidebar-widget-body -->
    </div>
    <!-- /.sidebar-widget -->
    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
</div>
<!-- /.sidemenu-holder -->
<!-- ============================================== SIDEBAR : END ============================================== -->
