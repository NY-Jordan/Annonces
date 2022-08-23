@extends('layouts/page')
@section('seo')
    @include('meta::manager', [
        'title'         =>  'NY-Annonces | Contact',
        'description'   => 'les meilleurs annonces de la villes',
    ]) 
@endsection
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Acceuil</a> -</li>
                    <li class="active">Contact Page</li>
                </ul>
            </div>
        </div>
        <div class="container">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mt-2">{{ $error }}</div>
                @endforeach
            @endif
            @if (session('message'))
                <div class="alert alert-danger dt-success-msg f12">{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper mb--sm">
                        <div class="gradient-title">
                            <h2>Contact With us</h2>
                        </div>
                        <div class="contact-layout1 gradient-padding">
                            <div class="google-map-area">
                                <div id="googleMap" style="width:100%; height:400px;"></div>
                            </div>
                            <p>If you did not find the answer to your question or problem, please get in touch with us using
                                the form below and we will respond to your message as soon as possible.</p>
                            <form  method="Post" class="contact-form" action="{{ route('sendMessage') }}">
                                @csrf
                                <fieldset>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Votre Nom" class="form-control" name="name"
                                                    id="form-name" data-error="Name field is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" placeholder="Votre E-mail" class="form-control"
                                                    name="email" id="form-email" data-error="Email field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Suject" class="form-control" name="subject"
                                                    id="form-subject" data-error="Subject field is required" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea placeholder="Message" class="textarea form-control" name="message"
                                                    id="form-message" rows="7" cols="20"
                                                    data-error="Message field is required" required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <button type="submit" class="cp-default-btn-sm">Envoyer</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12 col-12">
                                            <div class='form-response'></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <ul class="sidebar-more-option">
                            <li>
                                <a href="{{ route('addPostFree') }}"><img src="img/banner/more1.png" alt="more" class="img-fluid">Annonce gratuite</a>
                            </li>
                            <li>
                                <a href="{{ route('account') }}"><img src="img/banner/more2.png" alt="more" class="img-fluid">Gerer Mes Annonces</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
