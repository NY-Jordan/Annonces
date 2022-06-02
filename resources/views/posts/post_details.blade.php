@extends('../layouts/page')

@section('seo')
    @include('meta::manager', [
        'title'         =>  $post->title.' | NY-Annonces',
        'description'   => $k = strlen($post->details) > 20 ? substr($post->details, 0, 20) : $post->details
    ])
@endsection
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> - Details</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <h2>{{ $post->title }}</h2>
                        </div>
                        <div class="gradient-padding reduce-padding">
                            <div class="single-product-img-layout1 item-mb">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="tab-content">
                                            <span class="price">{{ $post->price }}CFA</span>
                                            @foreach ($imagesPost as $key => $image)
                                                <div role="tabpane{{ $key }}"
                                                    class="tab-pane  fade <?= $r = $key === 0 ? 'in active' : ' ' ?>  show"
                                                    id="related{{ $key }}">
                                                    <a href="#" class="zoom ex1">
                                                        <img alt="single" src="{{ Storage::url($image->path) }}"
                                                            class="img-fluid">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <ul class="nav nav-tab tab-nav-inline cp-carousel nav-control-middle"
                                            data-loop="true" data-items="6" data-margin="15" data-autoplay="true"
                                            data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false"
                                            data-nav="true" data-nav-speed="false" data-r-x-small="2"
                                            data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="4"
                                            data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3"
                                            data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4"
                                            data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="6"
                                            data-r-Large-nav="true" data-r-Large-dots="false">
                                            @foreach ($imagesPost as $key => $image)
                                                <li class="nav-item">
                                                    <a  @if ($key === 0)  class="active" @endif href="#related{{ $key }}"
                                                        data-toggle="tab" aria-expanded="false"><img
                                                            alt="related{{ $key }}"
                                                            src="{{ Storage::url($image->path) }}"
                                                            class="img-fluid"></a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                <h3>Details:</h3>
                                <p>{{ $post->details }}
                                </p>
                            </div>

                            
                        </div>
                    </div>
                    <div class="gradient-wrapper item-mb">
                        <div class="gradient-title">
                            <h2>D'autre Annonces de cette utilisateur </h2>
                        </div>
                        <div class="gradient-padding">
                            <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true"
                                data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000"
                                data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false"
                                data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2"
                                data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2"
                                data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true"
                                data-r-medium-dots="false" data-r-Large="3" data-r-Large-nav="true"
                                data-r-Large-dots="false">
                                @foreach ($recentFivePosts as $recentPost)

                                    <div class="product-box">
                                        <div class="item-mask-wrapper">
                                            <div class="item-mask secondary-bg-box"><img
                                                    src="{{ Storage::url($recentPost->image->path) }}" alt="categories"
                                                    class="img-fluid">
                                                <div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt"
                                                        aria-hidden="true"></i> </div>
                                                <div class="title-ctg">{{ $recentPost->categories->categoryName }}</div>
                                                <ul class="info-link">
                                                    <li><a href="{{ Storage::url($recentPost->image->path) }}"
                                                            class="elv-zoom" data-fancybox-group="gallery"
                                                            title="Title Here"><i class="fa fa-arrows-alt"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="{{ route('postDetails', ['id' => $recentPost->id]) }}"><i
                                                                class="fa fa-link" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="symbol-featured"><img
                                                        src="{{ Storage::url($recentPost->image->path) }}" alt="symbol"
                                                        class="img-fluid"> </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <div class="title-ctg">{{ $recentPost->categories->categoryName }}</div>
                                            <h3 class="short-title"><a
                                                    href="{{ route('postDetails', ['id' => $recentPost->id]) }}">{{ $k = strlen($recentPost->title) > 10 ? substr($recentPost->title, 0, 10) . '...' : $recentPost->title }}</a>
                                            </h3>
                                            <h3 class="long-title"><a
                                                    href="{{ route('postDetails', ['id' => $recentPost->id]) }}">{{ $k = strlen($recentPost->title) > 10 ? substr($recentPost->title, 0, 10) . '...' : $recentPost->title }}</a></h3>
                                            <ul class="upload-info">
                                                <li class="date"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i>07 Mar,
                                                    2017
                                                </li>
                                                <li class="place"><i class="fa fa-map-marker"
                                                        aria-hidden="true"></i>{{ $recentPost->user->sellerInformations->location->locationName }},
                                                        {{ $recentPost->user->sellerInformations->district }}</li>
                                                <li class="tag-ctg"><i class="fa fa-tag"
                                                        aria-hidden="true"></i>{{ $recentPost->categories->categoryName }}
                                                </li>
                                            </ul>
                                            <p>{{ substr($recentPost->details, 0, 100).'...'  }}</p>
                                            <div class="price">{{ $recentPost->price }}</div>
                                            <a href="single-product-layout1.html" class="product-details-btn">Details</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="add-layout2-left d-flex align-items-center">
                                <div>
                                    <h2>Vous avez quelques chose à vendre ?</h2>
                                    <h3>Poster une Annonce sur  ny-annconces.com</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                <a href="{{ route('addPostPrenium') }}" class="cp-default-btn-sm-primary">Poster une Annonce Maintenant</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Informations du L'annonceur</h3>
                            </div>
                            <ul class="sidebar-seller-information">
                                <li>
                                    <div class="media">
                                        <img src="../../img/user/user1.png" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Posté Par</span>
                                            <h4 id=""> {{ $user_post[0]->first_name }} {{ $user_post[0]->last_name }}</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <img src="../../img/user/user2.png" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Ville</span>
                                            <h4>{{ $user_post[0]->sellerInformations->location->locationName }},
                                                {{ $user_post[0]->sellerInformations->district }}</h4>
                                        </div>
                                    </div>
                                </li>
                                
                                <li>
                                    <div class="media">
                                        <img src="../../img/user/user5.png" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>User Type</span>
                                            <h4>Verified</h4>
                                        </div>
                                    </div>
                                </li>
                                @if (auth()->check())
                                    @if (Auth::user()->id === $post->user_id || $see_phone)
                                    <li>
                                        <div class="media">
                                            <img src="../../img/user/user3.png" alt="user" class="img-fluid pull-left">
                                            <div class="media-body">
                                                <span>Contact</span>
                                                
                                                <h4>{{ $user_post[0]->sellerInformations->mobile_phone1 }}</h4>
                                            </div>
                                        </div>
                                    </li>

                                    @else
                                        <li>
                                            <h4><button class="btn btn-secondary" data-toggle="modal" data-target="#Validation_get_phone" >Obtenir le contact</button></h4>
                                        </li>
                                        <input type="hidden" name="" id='idPost' value="{{ $post->id }}"  >
                                    @endif
                                @else
                                    <li>
                                        <h4><button class="btn btn-secondary" data-toggle="modal" data-target="#Validation_get_phone" >Obtenir le contact</button></h4>
                                    </li>
                                @endif 
                                @if (auth()->check())
                                    @if ($user->id === $post->user->id)
                                        <li>
                                            <div class="media">

                                                <div class="media-body">
                                                    <span>Update My Post</span>
                                                    <h4><a class="navbar-item"
                                                            href="{{ route('UpdatePost', $post->id) }}">Modifier</a></h4>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">

                                                <div class="media-body">
                                                    <span>Delete My Post</span>
                                                    <h4 id="supp" value="{{ $post->id }}"><a class="navbar-item"
                                                            href="{{ route('DeletePost', $post->id) }}">Supprimer</a></h4>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <div class="modal fade" id="Validation_get_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Validation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               L'obtention du contact de l'annonce  <strong>{{ $post->title }}</strong> vous coûtera <strong>5 Points</strong>
            </div>
            <div class="modal-footer">
              <button type="button" id="getNumberCancel" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="button" id="getNumber" class="btn btn-primary">Confirmer</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Info </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="bodyAlert">
               
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="pasConnecter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Echec de l'operation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               Echec de l'operation .. ✖   @if (!auth()->check())<br><p>Veuillez vous connecter ou vous creer votre compte <a href="{{ route("register") }}">ici</a> <br> <br> <strong>NB: Benéficiez de 25 points bonus à la creation de votre compte</strong> </p> @else <br> <p>Veuillez reesayer plus tard</p> @endif
            </div>
            <div class="modal-footer">
              <button type="button" id="getNumberCancel" class="btn btn-secondary" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>
@endsection
