
@extends('layouts/default')

@section('seo')
    @include('meta::manager', [
        'title'         => 'NY-Annonces',
        'description'   => 'Annonces, revendez, publier, vos, annonces',
    ])
@endsection
@section('content')

    <!-- Header Area End Here -->
    <!-- Featured Area Start Here -->
    <section class="bg-accent fixed-menu-mt featured-product-area item-pb">
        <div class="container">
            <div class="row featured-product-inner-area zoom-gallery">
                <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                    <form action="{{ route('search', 'simple') }}" method="get">
                        <div class="input-group stylish-input-group">
                            <input type="text" name="KeyWord" class="form-control"
                                placeholder="qu'es ce que vous cherchez ? . . .">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="fa fa-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-success mt-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    @if (session('message'))
                        <div class="alert alert-success dt-success-msg f12">{{ session('message') }}</div>
                    @endif
                    <div class="section-title-left-dark title-bar mt-20 mb-40">
                        <h2>Prenium Post
                        </h2>
                    </div>
                    @if (!empty($prenium))
                        <div class="cp-carousel nav-control-top category-grid-layout2" data-loop="true" data-items="3"
                            data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000"
                            data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1"
                            data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="3"
                            data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true"
                            data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false"
                            data-r-large="3" data-r-large-nav="true" data-r-large-dots="false">

                            @foreach ($prenium as $post)
                                <div class="product-box item-mb zoom-gallery">
                                    <div class="item-mask-wrapper">
                                        <div class="item-mask bg-body">
                                            <img src="{{ Storage::url($post->image->path) }}" alt="categories"
                                                class="img-fluid">
                                            <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                                    aria-hidden="true"></i> </div>
                                            <div class="title-ctg">{{ $post->categories->categoryName }}</div>
                                            <ul class="info-link">
                                                <li><a href="{{ Storage::url($post->image->path) }}"
                                                        class="elv-zoom" data-fancybox-group="gallery"
                                                        title="Title Here"><i class="fa fa-arrows-alt"
                                                            aria-hidden="true"></i></a></li>
                                                <li><a href="{{ route('postDetails', $post->id) }}"><i
                                                            class="fa fa-link" aria-hidden="true"></i></a></li>
                                            </ul>
                                            <div class="symbol-featured"><img src="{{ Storage::url($post->image->path) }}"
                                                    alt="symbol" class="img-fluid"> </div>
                                        </div>
                                    </div>
                                    @if (isset($post->prenium->status))
                                        <span
                                            style="background-color:<?= $post->prenium->status == URGENT ? 'red' : 'green' ?> ; border-radius:10px; color: white; margin: auto; margin-top:10px; width:70px;   height:auto;">
                                            {{ $post->prenium->status }}</span>
                                    @endif
                                    <div class="item-content">
                                        <div class="title-ctg">{{ $post->categories->categoryName }}</div>
                                        <h3 class="short-title"><a
                                                href="{{ route('postDetails', $post->id) }}">{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 15) . '...' : $post->title }}</a>
                                        </h3>
                                        <h3 class="long-title"><a
                                                href="{{ route('postDetails', $post->id) }}">{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 15) . '...' : $post->title }}</a>
                                        </h3>
                                        <ul class="upload-info">
                                            <li class="date"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i>{{ $post->created_at->format('j F, Y') }}
                                            </li>
                                            <li class="place"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }}
                                            </li>
                                            <li class="tag-ctg"><i class="fa fa-tag"
                                                    aria-hidden="true"></i>{{ $post->categories->categoryName }}
                                            </li>
                                        </ul>
                                        <p>{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 15) . '...' : $post->title }}
                                        </p>
                                        <div class="price">{{ $post->price }} FCFA</div>
                                        <a href="{{ route('postDetails', $post->id) }}"
                                            class="product-details-btn">Details</a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    @else
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Votre Annonce n'as pas de visibilité ?</h2>
                                        <h3>Mettez le au Premier plan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                    <a href="{{ route('addPostPrenium') }}" class="cp-default-btn-sm-primary">Poster
                                        votre Annonce</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="category-menu-layout2 bg-body">
                        <h3>Categories</h3>
                        <ul class="sidebar-category-list">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('PostsByCategory', $category->id) }}"><img
                                            src="../img/product/ctg{{ $category->id }}.png" alt="category"
                                            class="img-fluid"><?= $category->categoryName ?><span>({{ $category->number_posts($category->id) }})</span></a>
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
                @if (!empty($heightRecentPosts))
                    @foreach ($heightRecentPosts as $post)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-box item-mb zoom-gallery">
                                <div class="item-mask-wrapper">
                                    <div class="item-mask bg-body">
                                        <img src="{{ Storage::url($post->image->path) }}" alt="categories"
                                            class="img-fluid">
                                        <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                                aria-hidden="true"></i> </div>
                                        <div class="title-ctg ">{{ $post->Categories->categoryName }}</div>
                                        <ul class="info-link">
                                            <li><a href="{{ Storage::url($post->image->path) }}" class="elv-zoom"
                                                    data-fancybox-group="gallery" title="Title Here"><i
                                                        class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
                                            <li><a href="{{ route('postDetails', $post->id) }}"><i class="fa fa-link"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                        <div class="symbol-featured"><img src="{{ Storage::url($post->image->path) }}"
                                                alt="symbol" class="img-fluid">

                                        </div>

                                    </div>

                                </div>
                                @if (isset($post->prenium->status))
                                    <span
                                        style="background-color:<?= $post->prenium->status == URGENT ? 'red' : 'green' ?> ; border-radius:10px; color: white; margin: auto; margin-top:10px; width:70px;   height:auto;">
                                        {{ $post->prenium->status }}</span>
                                @endif
                                <div class="item-content">
                                    <div class="title-ctg">Clothing</div>
                                    <h3 class="short-title"><a
                                            href="{{ route('postDetails', $post->id) }}">{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 20) . '...' : $post->title }}</a>
                                    </h3>
                                    <h3 class="long-title"><a
                                            href="{{ route('postDetails', $post->id) }}">{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 20) . '...' : $post->title }}</a>
                                    </h3>
                                    <ul class="upload-info">
                                        <li class="date"><i class="fa fa-clock-o"
                                                aria-hidden="true"></i>{{ $post->created_at->format('j F, Y') }}</li>
                                        <li class="place"><i class="fa fa-map-marker"
                                                aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }}
                                        </li>
                                        <li class="tag-ctg"><i class="fa fa-tag"
                                                aria-hidden="true"></i>{{ $post->Categories->categoryName }}
                                        </li>
                                    </ul>
                                    <p>{{ $k = strlen($post->title) > 20 ? substr($post->title, 0, 20) . '...' : $post->title }}.
                                    </p>
                                    <div class="price">{{ $post->price }} FCFA</div>
                                    <a href="{{ route('postDetails', $post->id) }}"
                                        class="product-details-btn">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach    
                @endif
            </div>
        </div>
    </section>
    <!-- Products Area End Here -->
    <!-- Pricing Plan Area Start Here -->
    <section class="bg-body s-space-default">
        <div class="container">
            <div class="section-title-dark">
                <h2>Commencez à gagner des choses dont vous n'avez plus besoin</h2>
                <p>C'est très simple de choisir la tarification et le plan </p>
            </div>
            <div class="row d-md-flex">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Annonce gratuite</div>
                        <div class="price">
                            <span class="currency">F CFA</span>0
                            <span class="duration">/ Per mo</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Publication d'annonces toujours GRATUITE
                        </h3>
                        <p>Publiez autant d'annonces que vous le souhaitez pendant 30 jours sans limitation et 100% GRATUIT LA SOUMISSION DE  L'ANNONCE
                        </p>
                        <a href="{{ route('addPostFree') }}" class="cp-default-btn-lg">Soumettre une Annonce</a>
                    </div>
                </div>
                <div class="d-flex align-items-center col-lg-2 col-md-12 col-sm-12 col-12">
                    <div class="other-option bg-primary">ou</div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="pricing-box bg-box">
                        <div class="plan-title">Annonce Premium</div>
                        <div class="price">
                            <span class="currency">F CFA</span>2500
                            <span class="duration">/ par mois</span>
                        </div>
                        <h3 class="title-bold-dark size-xl">Publication d'annonces en vedette</h3>
                        <p>Publiez autant d'annonces que vous le souhaitez pendant 30 jours sans limitation et 100% GRATUIT LA SOUMISSION DE  L'ANNONCE</p>
                        <a href="{{ route('addPostPrenium') }}" class="cp-default-btn-lg">Soumettre une Annonce</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-body s-space full-width-border-top">
        <div class="container">
            <div class="section-title-dark">
                <h2 class="size-sm">Recevoir les meilleurs Offres</h2>
                <p>Restez en contact avec le thème Wordpress des petites annonces et nous vous informerons des meilleures annonces
                </p>
            </div>
            <form action="{{ route('saveEmailForBestOffers') }}" method="post">
                @csrf
                <div class="input-group subscribe-area">
                    <input type="text" name="email" placeholder="Saisir votre email" required class="form-control">
                    <span class="input-group-addon">
                        <button type="submit" class="cp-default-btn-xl">Soumettre</button>
                    </span>
                </div>
            </form>
        </div>
    </section>
@endsection
