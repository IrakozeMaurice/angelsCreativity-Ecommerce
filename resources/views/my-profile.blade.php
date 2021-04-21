@extends('layout')

@section('content')
    <div class="body-content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li class='active'>My profile</li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
            <!-- /.breadcrumb -->
            <div class="row" style="margin-top: 50px; margin-bottom: 50px;">
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
                    <h4 style="margin-top: 0;">my profile</h4>
                    <hr> @include('partials.messages')
                    <form method="POST" action="{{ route('users.update') }}" class="register-form outer-top-xs">
                        @csrf @method('PATCH')
                        <div class="form-group">
                            <label class="info-title" for="name">Name <span class="required">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"> @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="email">Email Address <span class="required">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email"> @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password">Password <span class="required">*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password"> @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                            <small><b>Leave password blank to keep current password</b></small>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="password-confirm">Confirm Password <span class="required">*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary">
                                Update profile
                            </button>
                    </form>
                    <div class="spacer"></div>
                    <div class="spacer"></div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.body-content -->
@endsection
