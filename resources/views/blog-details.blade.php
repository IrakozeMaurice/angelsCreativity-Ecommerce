@extends('layout')

@section('content')
    <div class="breadcrumb">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Home</a></li>
                <li class='active'>Blog</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.breadcrumb -->
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="blog-page">
                    <div class="col-md-9">
                        <div class="blog-post wow fadeInUp">
                            <img class="img-responsive" src="{{ asset('storage/' . $post->image) }}" alt="">
                            <h1>{{ $post->title }}</h1>
                            <span class="author">Angels Creativity</span>
                            {{-- <span class="review">7 Comments</span> --}}
                            <span class="date-time">{{ $post->created_at }}</span>
                            <p>{!! $post->body !!}
                            </p>
                        </div>
                        <div class="blog-post-author-details wow fadeInUp">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Responsive image"
                                        class="img-circle img-responsive">
                                </div>
                                <div class="col-md-10">
                                    <h4>AngelsCreativity</h4>
                                    <div class="social-media pull-right">
                                        <span>Follow us:</span>
                                        <a href="#" style="margin-right: 5px;"><i class="fa fa-facebook"></i></a>
                                        <a href="#" style="margin-right: 5px;"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                    <span class="author-job">Fashion Shop</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                </div>
                            </div>
                        </div>
                        <div class="blog-review wow fadeInUp">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title-review-comments">16 comments</h3>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <img src="{{ asset('assets/images/testimonials/member1.png') }}"
                                        alt="Responsive image" class="img-rounded img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                                    <div class="blog-comments inner-bottom-xs">
                                        <h4>Jone doe</h4>
                                        <span class="review-action pull-right">
                                            03 Day ago &sol;
                                            <a href="#"> Repost</a> &sol;
                                            <a href="#"> Reply</a>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                    </div>
                                    <div class="blog-comments-responce outer-top-xs ">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2">
                                                <img src="assets/images/testimonials/member2.png" alt="Responsive image"
                                                    class="img-rounded img-responsive">
                                            </div>
                                            <div class="col-md-10 col-sm-10 outer-bottom-xs">
                                                <div class="blog-sub-comments inner-bottom-xs">
                                                    <h4>Sarah Smith</h4>
                                                    <span class="review-action pull-right">
                                                        03 Day ago &sol;
                                                        <a href="#"> Repost</a> &sol;
                                                        <a href="#"> Reply</a>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                        ad minim veniam</p>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <img src="assets/images/testimonials/member3.png" alt="Responsive image"
                                                    class="img-rounded img-responsive">
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class=" inner-bottom-xs">
                                                    <h4>Stephen</h4>
                                                    <span class="review-action pull-right">
                                                        03 Day ago &sol;
                                                        <a href="#"> Repost</a> &sol;
                                                        <a href="#"> Reply</a>
                                                    </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                        ad minim veniam</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <img src="assets/images/testimonials/member4.png" alt="Responsive image"
                                        class="img-rounded img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <div class="blog-comments inner-bottom-xs outer-bottom-xs">
                                        <h4>Saraha Smith</h4>
                                        <span class="review-action pull-right">
                                            03 Day ago &sol;
                                            <a href="#"> Repost</a> &sol;
                                            <a href="#"> Reply</a>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <img src="assets/images/testimonials/member1.png" alt="Responsive image"
                                        class="img-rounded img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-10">
                                    <div class="blog-comment inner-bottom-xs">
                                        <h4>Mark Doe</h4>
                                        <span class="review-action pull-right">
                                            03 Day ago &sol;
                                            <a href="#"> Repost</a> &sol;
                                            <a href="#"> Reply</a>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                    </div>
                                </div>
                                <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load
                                        more</a></div>
                            </div>
                        </div>
                        <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Leave A Comment</h4>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputName">Your Name
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputName" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputEmail1">Email Address
                                                <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputEmail1" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
                                            <input type="email" class="form-control unicase-form-control text-input"
                                                id="exampleInputTitle" placeholder="">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12">
                                    <form class="register-form" role="form">
                                        <div class="form-group">
                                            <label class="info-title" for="exampleInputComments">Your Comments
                                                <span>*</span></label>
                                            <textarea class="form-control unicase-form-control"
                                                id="exampleInputComments"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 outer-bottom-small m-t-20">
                                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit
                                        Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
