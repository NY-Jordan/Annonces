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
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger ">{{ $error }}</div>
                @endforeach
            @endif
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper mb--sm">
                        <div class="gradient-title">
                            <h2>Votre Annonce au premier plan</h2>
                        </div>
                        <div class="contact-layout1 gradient-padding">
                            <form action="{{ route('suscribePrenium') }}" method="get">
                                <div class=" row form-group" style="font-size: 20px;">
                                    <div class="col-4">
                                        <strong>- Urgent</strong> <br>
                                        (Votre Annonce aura le status <strong>urgent</strong> pendant le temps du forfait
                                        choisis et <strong>aura une priorité troisième pendant les recherches</strong> )
                                    </div>
                                    <div class="col-4">
                                        <ul style="list-style: none">
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" required value="10" class="urgent"
                                                    id="urgent1">
                                                <label for="urgent1">5000 F cfa / 1 Mois</label>
                                            </li>
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" class="urgent" value="10"
                                                    id="urgent2">
                                                <label for="urgent2">2500 F cfa / 15 jours</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="forfait" class="urgent" value="10"
                                                    id="urgent3">
                                                <label for="urgent3">1000 F cfa / 5 jours</label>
                                            </li>
                                            <input type="hidden" name="status" value="{{ URGENT }}">
                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Souscrire</button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('suscribePrenium') }}" method="get">
                                <div class=" row form-group" style="font-size: 20px;">
                                    <div class="col-4">
                                        <strong>- Top of page</strong> <br>
                                        (Votre Annonce aura le status <strong>Top of Page</strong> pendant un mois, sera mis
                                        au premier plan et aura une priorité seconde pendant les recherches)
                                    </div>
                                    <div class="col-4">
                                        <ul style="list-style: none">
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" id="Top_of_page1" value="10">
                                                <label for="Top_of_page1">10000 F cfa / 1 Mois</label>
                                            </li>
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" id="Top_of_page2" value="10">
                                                <label for="Top_of_page2">5000 F cfa / 15 jours</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="forfait" id="Top_of_page3" value="10">
                                                <label for="Top_of_page3">2500 F cfa / 5 jours</label>
                                            </li>
                                            <input type="hidden" name="status" value="{{ TOP_OF_PAGE }}">
                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Souscrire</button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('suscribePrenium') }}" method="get">
                                <div class=" row form-group" style="font-size: 20px;">
                                    <div class="col-4">
                                        <strong> - Top of page + Urgent </strong> <br>
                                        (Votre Annonce aura le status <strong>Top of Page + Urgent</strong> pendant un mois,
                                        sera mis au premier plan et aura une priorité première pendant les recherches)
                                    </div>
                                    <div class="col-4">
                                        <ul style="list-style: none">
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" id="Top_of_page_Urgent1" value="10">
                                                <label for="Top_of_page_Urgent1">15000 F cfa / 1 Mois</label>
                                            </li>
                                            <li style="margin-bottom: 15px">
                                                <input type="radio" name="forfait" id="Top_of_page_Urgent2" value="10">
                                                <label for="Top_of_page_Urgent2">10000 F cfa / 15 jours</label>
                                            </li>
                                            <li>
                                                <input type="radio" name="forfait" id="Top_of_page_Urgent3" value="10">
                                                <label for="Top_of_page_Urgent3">5000 F cfa / 5 jours</label>
                                            </li>
                                            <input type="hidden" name="status" value="{{ TOP_OF_PAGE_URGENT }}">
                                        </ul>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary" type="submit">Souscrire</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
