<div class="main-menu-area" id="sticker">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center">

            <div class="col-lg-2 col-md-2 col-sm-3">
                <div class="logo-area">
                    <a href="{{ route('home') }}"   class="img-fluid"><img  src="{{ asset('img/logo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 possition-static">
                <div class="cp-main-menu">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}">Acceuil</a></li>
                            <li class="menu-justify current"><a href="{{ route('account') }}">Mon compte</a>

                                <div class="rt-dropdown-mega container">
                                    <div class="rt-dropdown-inner">
                                        <div>
                                            <ul class="rt-mega-items">
                                                @if (auth()->check())
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <li><a href=""><button class="btn btn-link "
                                                                    style="color: aliceblue; height:30px; text-decoration:none; "
                                                                    type="submit">se deconnecter</button></a></li>
                                                        
                                                    </form>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#points">
                                                            <button class="btn btn-link " data-toggle="modal" data-target="#points" style="color: aliceblue; height:30px; text-decoration:none; "
                                                                    type="submit">Mes Points</button>
                                                        </a>
                                                    </li>
                                                @else
                                                    <li><a data-toggle="modal" data-target="#login"
                                                            href="#">se connecter</a></li>
                                                    <li><a href="{{ route('register') }}">s'inscrire</a></li>
                                                @endif
                                                <li><a href="{{ route('addPostPrenium') }}">Poster une annonce</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            @if (Auth::check())
                                @if (Auth::user()->status === 'Admin')
                                    <li><a href="{{ route('admin.index') }}">Administration</a></li>
                                @endif
                            @endif


                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 text-center">
                <a href="{{ route('addPostPrenium') }}" class="cp-default-btn">Poster</a>
            </div>
        </div>
    </div>
</div>
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li><a href="">Acceuil</a></li>
                            <li><a href="{{ route('account') }}">Mon Compte</a>
                                <ul>
                                    @if (auth()->check())
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="link">Se deconnecter</button>
                                        </form>
                                    @else
                                        <li><a data-toggle="modal" data-target="#myModal" href="index.html">se
                                                connecter</a></li>
                                        <li><a href="{{ route('register') }}">s'inscrire</a></li>
                                    @endif
                                    <li><a href="post-ad.html">Poster une Annonce</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ Route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
