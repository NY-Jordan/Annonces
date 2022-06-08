@extends('layouts/default')
@section('content')
    <section class="search-layout1 bg-body full-width-border-bottom fixed-menu-mt">
        <div class="container">
            <form id="cp-search-form" method="GET" action="{{ route('search', 'moreDetails') }}">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group search-input-area input-icon-location">
                            <select id="location" name="location" class="select2">
                                <option class="first" value="{{ null }}">Selectionner une Ville</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">
                                        {{ $location->locationName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group search-input-area input-icon-category">
                            <select id="categories" id="category-name" name="category" class="select2">
                                <option class="first" value="{{ null }}">Selectionner une Categorie
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group search-input-area input-icon-keywords">
                            <input placeholder="Entrez un mot clés ..." value="{{ $KeyWord ?? '' }}" name="KeyWord"
                                type="text">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                        <button type="submit" class=" btn"
                            style="width: 155px;color: white;  background-color:#2e2e2e;">
                            <i class="fa fa-search" aria-hidden="true"></i> Recherchez
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-success mt-2" > <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>{{ $error }}</div>
            @endforeach
        @endif
        @if (session('message'))
            <div class="alert alert-success dt-success-msg f12" > <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button> {{ session('message') }}</div>
        @endif
    </div>

    @yield('page_content')
    @if (Auth::check())
        @include('../components/points')
    @endif

@endsection
