
@extends('layouts/page')

@section('seo')
    @include('meta::manager', [
        'title'         => 'NY-Annonces | Compte',
        'description'   => 'Annonces, revendez, publier vos annonces, retrouvez les meilleurs offres du cameroun grâce à ny-annonce,
            annonces du cameroun, les meilleurs offres du cameroun, electroniques, bijouterie, emploi, ny-annonces vous offre  le meilleurs',
    ])
@endsection
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a> -</li>
                    <li class="active">My Account Page</li>
                </ul>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="gradient-wrapper sidebar-item-box">
                        <ul class="nav tab-nav my-account-title">
                            <li class="nav-item"><a href="#my-add" class="active" data-toggle="tab"
                                    aria-expanded="false">Mes Annonces</a></li>
                            <li class="nav-item"><a href="#personal" data-toggle="tab"
                                    aria-expanded="false">Informations Personnelles</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="tab-content my-account-wrapper gradient-wrapper input-layout1">
                        <div role="tabpanel" class="gradient-padding tab-pane fade" id="personal">
                            <h2 class="title-section">Informations Personnelles</h2>
                            <form id="login-page-form" method="POST" action="{{ route('updateInformations') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Email</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name2" name="email" value="{{ $user->email }}"
                                                class="form-control" placeholder="Enter your e-mail here . . .">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Nom</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name" name="Fisrt_name"
                                                value="{{ $user->first_name }}" class="form-control"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Pre-Nom</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="last-name" name="Last_name"
                                                value="{{ $user->last_name }}" class="form-control"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Telephone</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="Phone"
                                                value="{{ $user->sellerInformations->mobile_phone1 }}"
                                                class="form-control" placeholder="Your Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Mot de passe actuelle</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" id="c-password" name="Current_Password"
                                                class="form-control" placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Nouveau Mot de passe</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" id="n-password" name="New_Password"
                                                class="form-control" placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">confirmer le mot de passe</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" name="Confirm_Password" id="r-password"
                                                class="form-control" placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-lg-9 col-md-8 col-sm-8 col-12 ml-none--mb">
                                        <div class="form-group">
                                            <button type="submit" class="cp-default-btn-sm">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active show" id="my-add">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="gradient-wrapper item-mb border-none">
                                        <div class="gradient-title">
                                            <div class="row no-gutters">
                                                <div class="col-4 text-center-mb">
                                                    <h2 class="mb10--mb">Mes Annonces</h2>
                                                </div>
                                                <div class="col-8">
                                                    <div class="layout-switcher float-none-mb text-center-mb mb10--mb">
                                                        <ul>
                                                            <li>
                                                                <div class="page-controls-sorting">
                                                                    <button class="sorting-btn dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-expanded="false">Trier par<i
                                                                            class="fa fa-sort"
                                                                            aria-hidden="true"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="?q=created_at">Date</a>
                                                                        <a class="dropdown-item" href="?q=price">Meilleur
                                                                            Prix</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="active"><a href="#"
                                                                    data-type="category-list-layout3"
                                                                    class="product-view-trigger"><i
                                                                        class="fa fa-th-large"></i></a></li>
                                                            <li><a href="#" data-type="category-grid-layout3"
                                                                    class="product-view-trigger"><i
                                                                        class="fa fa-list"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="category-view" class="category-list-layout3 gradient-padding zoom-gallery">
                                            <div class="row">
                                                @if (!empty($posts[0]))
                                                    @foreach ($posts as $post)
                                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                            <div class="product-box item-mb zoom-gallery">
                                                                <div class="item-mask-wrapper">
                                                                    <div class="item-mask secondary-bg-box"><img
                                                                            src="{{ Storage::url($post->image->path) }}"
                                                                            alt="categories" class="img-fluid">
                                                                        <a href="{{ route('featured', $post->id) }}" data-toggle="popover" data-content="!!! Cliquez ici pour mettre votr annonce au premier plan ">
                                                                            <div class="trending-sign active"
                                                                                data-tips="Featured"  >
                                                                                <i class="fa fa-bolt"
                                                                                    aria-hidden="true"></i>
                                                                            </div>
                                                                            <div class="title-ctg">
                                                                                {{ $post->categories->categoryName }}
                                                                            </div>
                                                                        </a>
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
                                                                    <div class="title-ctg">
                                                                        {{ $post->categories->categoryName }}</div>
                                                                    <h3 class="short-title"><a
                                                                            href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a>
                                                                    </h3>
                                                                    <h3 class="long-title"><a
                                                                            href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a>
                                                                    </h3>
                                                                    <ul class="upload-info">
                                                                        <li class="date"><i
                                                                                class="fa fa-clock-o"
                                                                                aria-hidden="true"></i>{{ $post->created_at->format('j F, Y') }}
                                                                        </li>
                                                                        <li class="place"><i
                                                                                class="fa fa-map-marker"
                                                                                aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }},
                                                                            {{ $post->user->sellerInformations->district }}
                                                                        </li>
                                                                        <li class="tag-ctg"><i
                                                                                class="fa fa-tag"
                                                                                aria-hidden="true"></i>{{ $post->categories->categoryName }}
                                                                        </li>
                                                                    </ul>
                                                                    <p>{{ substr($post->details, 0, 100) . '...' }}</p>
                                                                    @if (isset($post->prenium->status))
                                                                        <span
                                                                            style="background-color:<?= $post->prenium->status == URGENT ? 'red' : 'green' ?> ; border-radius:10px; color: white; margin: auto; margin-top:10px; width:70px;   height:auto;">
                                                                            {{ $post->prenium->status }}</span>
                                                                    @endif
                                                                    <div class="price">{{ $post->price }} Fcfa
                                                                    </div>
                                                                    <a href="{{ route('postDetails', ['id' => $post->id]) }}"
                                                                        class="product-details-btn">Details</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else 
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12" style="color: red; text-align:center"> Liste vide.....</div>
                                                @endif
                                            </div>
                                            <div>
                                                {{ $posts->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@endsection
