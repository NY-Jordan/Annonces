

@extends('../layouts/page')

@section('seo')

@include('meta::manager', [
    'title'         => 'NY-Annonces | Resultat de la recherche '.$KeyWord,
    'description'   => 'Resultat de la recherche '.$KeyWord,
])

@endsection

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
            @if ($KeyWord)
                <h3>{{ $result->count() }} resultat(s) trouvé pour la recherche "{{ $KeyWord }}"</h3>
            @endif
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
                                                        <a class="dropdown-item"
                                                            href="search?@foreach ($data as $key => $item) {{ $key . '=' . $item . '&' }} @endforeach{{ '?q=created_at' }}">Date</a>
                                                        <a class="dropdown-item"
                                                            href="search?@foreach ($data as $key => $item) {{ $key . '=' . $item . '&' }} @endforeach{{ '?q=price' }}">Best
                                                            Sale</a>
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
                                @foreach ($result as $post)
                                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                            <div class="item-mask-wrapper">
                                                <div class="item-mask secondary-bg-box"><img
                                                        src="{{ Storage::url($post->image->path) }}" alt="categories"
                                                        class="img-fluid">
                                                    <div class="trending-sign active" data-tips="Featured"> <i
                                                            class="fa fa-bolt" aria-hidden="true"></i> </div>
                                                    <div class="title-ctg">Clothing</div>
                                                    <ul class="info-link">
                                                        <li><a href="{{ Storage::url($post->image->path) }}"
                                                                class="elv-zoom" data-fancybox-group="gallery"
                                                                title="Title Here"><i class="fa fa-arrows-alt"
                                                                    aria-hidden="true"></i></a></li>
                                                        <li><a href="single-product-layout1.html"><i class="fa fa-link"
                                                                    aria-hidden="true"></i></a></li>
                                                    </ul>
                                                    <div class="symbol-featured"><img
                                                            src="{{ Storage::url($post->image->path) }}" alt="symbol"
                                                            class="img-fluid"> </div>
                                                    @if (isset($post->prenium->status))
                                                        <div
                                                            style="background-color:<?= $post->prenium->status == URGENT ? 'red' : 'green' ?> ; border-radius:10px; color: white; margin-top:10px; width:70px;   height:auto;">
                                                            {{ $post->prenium->status }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="title-ctg">{{ $post->categories->categoryName }}</div>
                                                <h3 class="short-title"><a href="">{{ $post->title }}</a></h3>
                                                <h3 class="long-title"><a
                                                        href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a>
                                                </h3>
                                                <ul class="upload-info">
                                                    <li class="date"><i class="fa fa-clock-o"
                                                            aria-hidden="true"></i>{{ $post->created_at->format('F  m, Y') }}
                                                    </li>
                                                    <li class="place"><i class="fa fa-map-marker"
                                                            aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }}
                                                    </li>
                                                    <li class="tag-ctg"><i class="fa fa-tag"
                                                            aria-hidden="true"></i>{{ $post->catego }}
                                                    </li>
                                                </ul>

                                                <p>Eimply dummy text of the printing and typesetting industrym has been
                                                    the
                                                    industry's standard dummy.</p>
                                                <div class="price">{{ $post->price }}</div>
                                                <a href="{{ route('postDetails', $post->id) }}"
                                                    class="product-details-btn">Details</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="gradient-wrapper mb-60">

                        {{ $result->links() }}

                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                            <div class="add-layout2-left d-flex align-items-center">
                                <div>
                                    <h2>Vous avez quelques chose à vendre ?</h2>
                                    <h3>Poster le sur  NY-ANNONCES</h3>
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
                                        <a href="{{ route('PostsByCategory',  Crypt::encrypt($category->id)) }}"><img
                                                src="../img/product/ctg{{ $category->id }}.png" alt="category"
                                                class="img-fluid"><?= $category->categoryName ?><span>({{ $category->number_posts($category->id) }})</span></a>
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
                                    <li><a href="{{ route('PostsByLocation', Crypt::encrypt($location->id)) }}">{{ $location->locationName }}</a></li>
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
