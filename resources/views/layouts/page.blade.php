@extends('layouts/default')
@section('content')
    <section class="search-layout1 bg-body full-width-border-bottom fixed-menu-mt">
        <div class="container">
            <form id="cp-search-form" method = "GET" action="{{ route('search', 'moreDetails') }}" >
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="form-group search-input-area input-icon-location">
                            <select id="location" name="location" class="select2">
                                <option class="first" value="{{ null }}">Select Location</option>
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
                                <option class="first" value="{{ null }}">Select Categories</option>
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
                            <input placeholder="Enter Keywords here ..." value="{{ $KeyWord ?? '' }}" name="KeyWord" type="text">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-right text-left-mb">
                        <button type="submit" class=" btn" style="width: 155px;color: white;  background-color:#2e2e2e;">
                            <i class="fa fa-search" aria-hidden="true"></i> Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @yield('page_content')
@endsection
