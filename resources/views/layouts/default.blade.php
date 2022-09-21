<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo.ico">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/OwlCarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="google-site-verification" content="Bm6O2ZI4i1xvQiMVql_94l_U-iNzqey-ktXDe3XHJ58" />
    @yield('seo')
    <meta name="google-site-verification" content="Bm6O2ZI4i1xvQiMVql_94l_U-iNzqey-ktXDe3XHJ58" />
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper">
        <header>
            <div id="header-three" class="header-style3 header-fixed bg-body">
                <div class="header-top-bar top-bar-style3">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-left">
                                    <a href="{{ route('addPostPrenium') }}" class="cp-default-btn d-lg-none">Poster</a>
                                    <p class="d-none d-lg-block">
                                        <i class="fa fa-life-ring" aria-hidden="true"></i>Vous avez des questions ? 692409530 ou nyannonces@yahoo.fr
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-right">
                                    <ul>
                                        <li>
                                            @if (!auth()->check())
                                                <button type="button" class="login-btn" data-toggle="modal"
                                                    data-target="#login">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>Se connecter
                                                </button>
                                            @else
                                                <form action="{{ route('logout') }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="login-btn">
                                                    <i class="fa fa-lock" aria-hidden="true"></i>Se deconnecter
                                                    </button>
                                                </form>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts/navigation')
                
            </div>
        </header>
        
        @yield('content')
        <footer>
            
            <div class="footer-area-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
                            <p>NY-ANNONCES</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="title-default-bold mb-none">Se connecter</div>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <label>Email  *</label>
                            <input placeholder="Name or E-mail" type="email" name="email" value="{{ old('email') }}"
                                required autofocus />
                            <label>Mot de passe *</label>
                            <input type="password" placeholder="Password" type="password" name="password" required
                                autocomplete="current-password" />
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Se souvenir de moi</label>
                            </div>
                            <button class="default-big-btn" type="submit" value="Login">Se connecter</button>
                            <button class="default-big-btn form-cancel" data-dismiss="modal" type="submit" value="">Annulé</button>
                            <label class="lost-password"><a href="#" id="show-f-password">Vous avez oublier votre Mot de passe ?</a></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="f-password" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="title-default-bold mb-none">Mot de passe Oublier</div>
                </div>
                <div class="modal-body">
                    <div class="login-form">
                        <form method="POST" action="">
                            @csrf
                            <label>Entrez vote Email  *</label>
                            <input placeholder="Name or E-mail" type="email" name="verificationEmail" value="{{ old('email') }}"
                                required autofocus />
                            </div>
                            <button class="default-big-btn" type="submit" id="v-password" value="Login">Continuer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="report_abuse" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content report-abuse-area radius-none">
                <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="item-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>There's
                            Something Wrong With This Ads?</h2>
                    </div>
                    <div class="gradient-padding reduce-padding">
                        <form id="report-abuse-form">
                            <div class="form-group">
                                <label class="control-label" for="first-name">Your E-mail</label>
                                <input type="text" id="first-name" class="form-control"
                                    placeholder="Type your mail here ...">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Your Reason</label>
                                    <textarea placeholder="Type your reason..." class="textarea form-control"
                                        name="message" id="form-message" rows="7" cols="20"
                                        data-error="Message field is required" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="cp-default-btn-sm">Submit Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('../components/points')
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/OwlCarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('js/validator.min.js') }} "></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('assets/js/payment.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
</html>
