    <header class="header-style-1">
        <!-- ========================= TOP MENU ========================= -->
        <div class="top-bar nav-color-mix">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            @auth
                                <li><a href="{{ route('users.edit') }}"><i class="icon fa fa-user"></i>My Account</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li><a href=""><i class="icon fa fa-user"></i>{{ auth()->user()->name }}</a>
                                </li>
                            @endauth
                            @guest
                                <li><a href="{{ route('register') }}"><i class="icon fa fa-check"></i>Sign up</a></li>
                                <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login</a></li>
                            @endguest
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /.header-top-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.header-top -->
        <!-- ========================= TOP MENU : END ========================= -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="/" style="height: 52px;"> <img class="img-responsive"
                                    style="max-height: 62px; width:100%;"
                                    src="{{ asset('assets/images/ac-logo.png') }}" alt=""> </a>
                        </div>
                        <!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div>
                    <!-- /.logo-holder -->
                    <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="control-group">
                                    <input type="text" name="query" id="query" value="{{ request()->input('query') }}"
                                        class="search-field" placeholder="Search for products..." />
                                    <a class="search-button nav-color-mix" href="{{ route('search') }}"></a>
                                </div>
                            </form>
                        </div>
                        <!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div>
                    <!-- /.top-search-holder -->
                    <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row">
                        <div class="dropdown dropdown-cart">
                            <a href="/cart" class="dropdown-toggle lnk-cart nav-color-mix">
                                <div class="items-cart-inner">
                                    <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                    <div class="basket-item-count"><span
                                            class="count">{{ Cart::instance('default')->count() }}</span>
                                    </div>
                                    <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                            class="total-price"> <span class="sign">Rwf </span><span
                                                class="value">{{ formatPrice(getCartTotal()) }}</span> </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- /.top-cart-row -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.main-header -->
        <!-- ========================= NAVBAR ========================= -->
        <div class="header-nav nav-color-mix">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                {{-- <ul class="nav navbar-nav">
                                    <li class="active"> <a href="/">Home</a> </li>
                                    <li><a href="/shop">Shop</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">About</a></li>
                                </ul> --}}
                                {{ menu('main', 'partials.menus.main') }}
                                <!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div>
                            <!-- /.nav-outer -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.nav-bg-class -->
                </div>
                <!-- /.navbar-default -->
            </div>
            <!-- /.container-class -->
        </div>
        <!-- /.header-nav -->
        <!-- ========================= NAVBAR : END ========================= -->
    </header>
