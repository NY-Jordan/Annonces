@extends('layouts/default')
@section('content')
    <!-- Header Area End Here -->
    <!-- Featured Area Start Here -->
    <section class="bg-accent fixed-menu-mt featured-product-area item-pb">
        <div class="container">
            <div class="row featured-product-inner-area zoom-gallery">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                    <form action="{{ route('search', 'simple') }}" method="get">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="KeyWord" class="form-control" placeholder="What You Are Looking For . . .">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger mt-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    <div class="section-title-left-dark title-bar mt-20 mb-40">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="cp-carousel nav-control-top category-grid-layout2" data-loop="true" data-items="3"
                        data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000"
                        data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1"
                        data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="true"
                        data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false"
                        data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3"
                        data-r-large-nav="true" data-r-large-dots="false">
                        <div class="product-box item-mb zoom-gallery">
                            <div class="item-mask-wrapper">
                                <div class="item-mask bg-body"><img src="../img/product/product17.png" alt="categories"
                                        class="img-fluid">
                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                            aria-hidden="true"></i> </div>
                                    <div class="title-ctg">Clothing</div>
                                    <ul class="info-link">
                                        <li><a href="../img/product/product17.png" class="elv-zoom"
                                                data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="single-product-layout2.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                    <div class="symbol-featured"><img src="../img/banner/symbol-featured.png" alt="symbol"
                                            class="img-fluid"> </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="title-ctg">Clothing</div>
                                <h3 class="short-title"><a
                                        href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">Gaming
                                        Keyboard</a></h3>
                                <h3 class="long-title"><a
                                        href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">HAVIT
                                        LED Backlit Wired Membrane Gaming Keyboard</a></h3>
                                <ul class="upload-info">
                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                    <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia
                                    </li>
                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                </ul>
                                <p>Eimply dummy text of the printing and typesetting industrym has been the industry's
                                    standard dummy.</p>
                                <div class="price">1500 CFA</div>
                                <a href="single-product-layout2.html" class="product-details-btn">Details</a>
                            </div>
                        </div>
                        <div class="product-box item-mb zoom-gallery">
                            <div class="item-mask-wrapper">
                                <div class="item-mask bg-body"><img src="../img/product/product19.png" alt="categories"
                                        class="img-fluid">
                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                            aria-hidden="true"></i> </div>
                                    <div class="title-ctg">Clothing</div>
                                    <ul class="info-link">
                                        <li><a href="../img/product/product19.png" class="elv-zoom"
                                                data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="single-product-layout1.html"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                    <div class="symbol-featured"><img src="../img/banner/symbol-featured.png" alt="symbol"
                                            class="img-fluid"> </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="title-ctg">Clothing</div>
                                <h3 class="short-title"><a
                                        href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Stylish
                                        Bracelet</a></h3>
                                <h3 class="long-title"><a
                                        href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product1.html">Bracelet
                                        for Outdoor Camping Survival Stylish Bracelet</a></h3>
                                <ul class="upload-info">
                                    <li class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>07 Mar, 2017</li>
                                    <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>Sydney, Australia
                                    </li>
                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                </ul>
                                <p>Eimply dummy text of the printing and typesetting industrym has been the industry's
                                    standard dummy.</p>
                                <div class="price">1500 CFA</div>
                                <a href="" class="product-details-btn">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="category-menu-layout2 bg-body">
                        <h3>Categories</h3>
                        <ul class="sidebar-category-list">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('PostsByCategory', $category->id) }}"><img
                                            src="../img/product/ctg1.png" alt="category"
                                            class="img-fluid"><?= $category->categoryName ?><span>({{   $category->posts->count() }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Area End Here -->
    <!-- Add Area Start Here -->
    <section class="bg-accent">
        <div class="container">
            <div class="row no-gutters text-center-mb">
                <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="add-layout1-left d-flex align-items-center justify-content-center">
                        <h2>vous avez quelque chose à vendre?</h2>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-8 col-md-8 col-sm-6 col-12">
                    <div class="add-layout1-middle d-flex align-items-center justify-content-center text-center--md">
                        <h3>Poster une annnonce </h3>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="add-layout1-right d-flex align-items-center justify-content-center">
                        <a href="#" class="cp-default-btn-sm">Poster une annonce!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Area End Here -->
    <!-- Products Area Start Here -->
    <section class="bg-accent s-space-custom4">
        <div class="container">
            <div class="section-title-left-dark title-bar mb-40">
                <h2>Ajouté recement</h2>
            </div>
            <div class="row category-grid-layout2 zoom-gallery">
                @foreach ($heightRecentPosts as $post)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-box item-mb zoom-gallery">
                            <div class="item-mask-wrapper">
                                <div class="item-mask bg-body"><img src="{{ Storage::url($post->image->path) }}"
                                        alt="categories" class="img-fluid">
                                    <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                            aria-hidden="true"></i> </div>
                                    <div class="title-ctg">Clothing</div>
                                    <ul class="info-link">
                                        <li><a href="{{ Storage::url($post->image->path) }}" class="elv-zoom"
                                                data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="{{ route('postDetails', $post->id) }}"><i class="fa fa-link"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                    <div class="symbol-featured"><img src="{{ Storage::url($post->image->path) }}"
                                            alt="symbol" class="img-fluid"> </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="title-ctg">Clothing</div>
                                <h3 class="short-title"><a
                                        href="{{ route('postDetails', $post->id) }}">{{  $k = (strlen($post->title) > 20) ? substr($post->title, 0, 20).'...' : $post->title  }}</a>
                                </h3>
                                <h3 class="long-title"><a
                                        href="https://www.radiustheme.com/demo/html/classipost/classipost/single-product2.html">MMK
                                        collection Women Fashion Matching Satchel handbags</a></h3>
                                <ul class="upload-info">
                                    <li class="date"><i class="fa fa-clock-o"
                                            aria-hidden="true"></i>{{ $post->created_at->format('j F, Y') }}</li>
                                    <li class="place"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }}
                                    </li>
                                    <li class="tag-ctg"><i class="fa fa-tag" aria-hidden="true"></i>Clothing</li>
                                </ul>
                                <p>Eimply dummy text of the printing and typesetting industrym has been the industry's
                                    standard
                                    dummy.</p>
                                <div class="price">$15</div>
                                <a href="{{ route('postDetails', $post->id) }}" class="product-details-btn">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Products Area End Here -->
    <!-- Pricing Plan Area Start Here -->
    <section class="bg-body s-space-default">
        <div class="container">
            <div class="section-title-dark">
                <h2>Start Earning From Things You Don’t Need Anymore</h2>
                <p>It’s very Simple to choose pricing &amp; Plan</p>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Free Post</div>
                        <div class="price">
                            <span class="currency">$</span>0
                            <span class="duration">/ Per mo</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Always FREE Ad Posting</h3>
                        <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                        <a href="{{ route('addPost') }}" class="cp-default-btn-lg">Submit Ad</a>
                    </div>
                </div>
                <div class="d-flex align-items-center col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="other-option bg-primary">or</div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Premium Post</div>
                        <div class="price">
                            <span class="currency">$</span>19
                            <span class="duration">/ Per mo</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Featured Ad Posting</h3>
                        <p>Post as many ads as you like for 30 days without limitations and 100% FREE SUBMIT AD</p>
                        <a href="#" class="cp-default-btn-lg">Submit Ad</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-body s-space full-width-border-top">
        <div class="container">
            <div class="section-title-dark">
                <h2 class="size-sm">Receive The Best Offers</h2>
                <p>Stay in touch with Classified Ads Wordpress Theme and we'll notify you about best ads</p>
            </div>
            <form action="{{ route('saveEmailForBestOffers') }}" method="post">
                @csrf
                <div class="input-group subscribe-area">
                    <input type="text"  name="email" placeholder="Type your e-mail address" class="form-control">
                    <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Subscribe</button>
                    </span>
                </div>
            </form>            
        </div>
    </section>
@endsection
