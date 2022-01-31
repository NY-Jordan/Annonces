@extends('layouts/page')
@section('page_content')
<section class="s-space-bottom-full bg-accent-shadow-body">
    <div class="container">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a> -</li>
                <li class="active">Featured</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="gradient-wrapper mb--sm">
                    <div class="gradient-title">
                        <h2>Put your Add to featured</h2>
                    </div>
                    <div class="contact-layout1 gradient-padding">
                        <form action="" method="post">
                        if
                            <div class=" row form-group" style="font-size: 20px;">
                                <div class="col-4">
                                   <strong>- Urgent</strong>  <br>
                                    (your add will have the status URGENT for one month)
                                </div>
                                <div class="col-4">
                                    5000 F cfa / 1 Month
                                </div>
                                <div class="col-4">
                                    <a  href="{{ route('payment', [ 'amount' => 50, 'status' =>  'Urgent' ]) }}" class="cp-default-btn ">Suscribe</a>
                                </div>
                            </div>
                            <div class=" row form-group" style="font-size: 20px;">
                                <div class="col-4">
                                   <strong>- Top of page</strong>  <br>
                                    (your add will have the status Top of page for one month and will be first for search)
                                </div>
                                <div class="col-4">
                                    10 000 F cfa / 1 Month
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('payment', [ 'amount' => 10, 'status' =>  'Top of page' ]) }}" class="cp-default-btn ">Suscribe</a>
                                </div>
                            </div>
                            <div class=" row form-group" style="font-size: 20px;">
                                <div class="col-4">
                                    <strong> - Top of page + Urgent </strong>  <br>
                                    (Top of page + Urgent)
                                </div>
                                <div class="col-4">
                                    15 000 F cfa / 1 Month
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('payment', [ 'amount' => 100, 'status' =>  'Top of page + Urgent' ]) }}" class="cp-default-btn ">Suscribe</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="sidebar-item-box">
                    <ul class="sidebar-more-option">
                        <li>
                            <a href="post-ad.html"><img src="img/banner/more1.png" alt="more" class="img-fluid">Post a
                                Free Ad</a>
                        </li>
                        <li>
                            <a href="#"><img src="img/banner/more2.png" alt="more" class="img-fluid">Manage Product</a>
                        </li>
                        <li>
                            <a href="favourite-ad-list.html"><img src="img/banner/more3.png" alt="more" class="img-fluid">Favorite Ad list</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-item-box">
                    <img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection