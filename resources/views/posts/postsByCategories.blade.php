@extends('../layouts/page')

@section('page_content')
    <!-- Category Grid View Start Here -->
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">All ads</li>
                </ul>
            </div>
        </div>
        
        <div class="container">
            <h3>{{ $postByCategories->count() }} Annonce(s) pour cette categorie</h3>
            <div class="row">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <div class="row">
                                <div class="col-4">
                                    <h2>All Ads</h2>
                                </div>
                                <div class="col-8">
                                    <div class="layout-switcher">
                                        <ul>
                                            <li>
                                                <div class="page-controls-sorting">
                                                    <button class="sorting-btn dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-expanded="false">Sort By<i
                                                            class="fa fa-sort" aria-hidden="true"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="?q=created_at">Date</a>
                                                        <a class="dropdown-item" href="?q=price">Best Sale</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a class="product-view-trigger" href="#"
                                                    data-type="category-grid-layout2"><i class="fa fa-th-large"></i></a>
                                            </li>
                                            <li class="active"><a href="#" data-type="category-list-layout2"
                                                    class="product-view-trigger"><i class="fa fa-list"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="category-view" class="category-list-layout2 gradient-padding zoom-gallery">
                            <div class="row">
                                @foreach ($postByCategories as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box"><img
                                                        src="{{  Storage::url($post->image->path) }}" alt="categories"
                                                        class="img-fluid">
                                                    <div class="trending-sign active" data-tips="Featured">
                                                        <i class="fa fa-bolt" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="title-ctg"> {{ $post->categories->categoryName }}
                                                    </div>
                                                    <ul class="info-link">
                                                        <li><a href="{{ Storage::url($post->image->path) }}"
                                                                class="elv-zoom"
                                                                data-fancybox-group="gallery"
                                                                title="Title Here"><i
                                                                    class="fa fa-arrows-alt"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="single-product-layout1.html"><i
                                                                    class="fa fa-link"
                                                                    aria-hidden="true"></i></a></li>
                                                    </ul>
                                                    <div class="symbol-featured"><img
                                                            src="img/banner/symbol-featured.png"
                                                            alt="symbol" class="img-fluid"> </div>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="title-ctg">{{ $post->categories->categoryName }}</div>
                                                <h3 class="short-title"><a
                                                        href="{{ route('postDetails', $post->id) }}">{{  $k = (strlen($post->title) > 15) ? substr($post->title, 0, 15).'...' : $post->title  }}</a></h3>
                                                <h3 class="long-title"><a
                                                        href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a></h3>
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i>{{ $post->created_at->format('j  F, Y') }}</li>
                                                    <li class="place"><i class="fa fa-map-marker"
                                                            aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }},
                                                            {{ $post->user->sellerInformations->district }}</li>
                                                    <li class="tag-ctg"><i class="fa fa-tag"
                                                            aria-hidden="true"></i>{{ $post->categories->categoryName }}</li>
                                                </ul>
                                                <p>{{ substr($post->details, 0, 100).'...'  }}</p>
                                                <div class="price">{{ $post->price }} Fcfa</div>
                                                <a href="{{ route("postDetails", [ 'id' => $post->id])  }}"
                                                    class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{ $postByCategories->links() }}
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="add-layout2-left d-flex align-items-center">
                                <div>
                                    <h2>Do you Have Something To Sell?</h2>
                                    <h3>Post your ad on classipost.com</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                <a href="#" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>All Categories</h3>
                            </div>
                            <ul class="sidebar-category-list">
                                <ul class="sidebar-category-list">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('PostsByCategory', $category->id) }}"><img
                                                    src="../img/product/ctg1.png" alt="category"
                                                    class="img-fluid">{{   $category->categoryName }}<span>({{   $category->posts->count() }})</span></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Location</h3>
                            </div>
                            <ul class="sidebar-loacation-list">
                                @foreach ($locations as $location)
                                    <li><a href="{{ route('PostsByLocation', $location->id) }}">{{ $location->locationName }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Grid View End Here -->
    <!-- Subscribe Area Start Here -->
    <section class="bg-body s-space full-width-border-top">
        <div class="container">
            <div class="section-title-dark">
                <h2 class="size-sm">Receive The Best Offers</h2>
                <p>Stay in touch with Classified Ads Wordpress Theme and we'll notify you about best ads</p>
            </div>
            <div class="input-group subscribe-area">
                <input type="text" placeholder="Type your e-mail address" class="form-control">
                <span class="input-group-addon">
                    <button type="submit" class="cp-default-btn-xl">Subscribe</button>
                </span>
            </div>
        </div>
    </section>
    <!-- Subscribe Area End Here -->
@endsection
