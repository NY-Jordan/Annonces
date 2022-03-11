@extends('../layouts/page')
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a> -</li>
                    <li class="active">Post A Add</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-12 mb--sm">
                    <div class="gradient-wrapper">
                        <div class="gradient-title">
                            <h2>Post A Free Add</h2>
                        </div>
                        <div class="input-layout1 gradient-padding post-ad-page">
                            <form method="post" action="{{ route('sendPost') }}" id="post-add-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="border-bottom-2 mb-50 pb-30">
                                    <div class="section-title-left-dark border-bottom d-flex">
                                        <h3><img src="img/post-add1.png" alt="post-add" class="img-fluid"> Product
                                            Information</h3>
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger ">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Category<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <div class="custom-select">
                                                    <select id="category-name" value="1"
                                                        name="categories_id" class='select2'>
                                                        <option value="{{ null }}">Select a Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->categoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('categories_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label possition-top" for="first-name">Add Type <span>
                                                    *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio"  id="inlineRadio1"
                                                        value="individualType" name="PostType[]">
                                                    <label for="inlineRadio1">Indivisual</label>
                                                </div>
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio"  id="inlineRadio2"
                                                        value="businessType" name="PostType[]">
                                                    <label for="inlineRadio2"> Business </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Ad Title <span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" @error('title') is-invalid @enderror value="{{ old('title') }}" id="add-title" name="title"
                                                    class="form-control" placeholder="First Name">
                                            </div>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label">Description<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <textarea placeholder="What makes your ad unique"
                                                    class="textarea form-control" name="details" id="description" rows="4"
                                                    cols="20" data-error="Message field is required"
                                                    required>{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="first-name">Set Price <span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" value="{{ old('price') }}" id="describe-ad2"
                                                    name="price" class="form-control price-box"
                                                    placeholder=" Set your Price Here">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="add-title">Upload Picture<span>
                                                    *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <ul class="picture-upload">
                                                    <li>
                                                        <input type="file" value="{{ old('ImagePost[]') }} id="
                                                            img-upload1" name="ImagePost[]" class="form-control">
                                                    </li>
                                                    <li>
                                                        <input type="file" value="{{ old('ImagePost[]') }} id="
                                                            img-upload2" name="ImagePost[]" class="form-control">
                                                    </li>
                                                    <li>
                                                        <input type="file" value="{{ old('ImagePost[]') }} id="
                                                            img-upload3" name="ImagePost[]" class="form-control">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-bottom-2 mb-50 pb-30">
                                    <div class="section-title-left-dark border-bottom d-flex">
                                        <h3><img src="img/post-add2.png" alt="post-add" class="img-fluid"> Seller
                                            Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-name">Name<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="seller-name"
                                                    value="{{ $user->first_name }} {{ $user->last_name }}" name="name"
                                                    class="form-control" placeholder="Seller Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="seller-mail">Seller Email<span>
                                                    *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="seller-mail" value="{{ $user->email }}"
                                                    class="form-control" name="sellerEmail"
                                                    placeholder="Enter Your E-mail Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="phone">Phone<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="phone" name="phone"
                                                    value="{{ $user->sellerInformations->mobile_phone1 }}"
                                                    class="form-control" placeholder="Enter your Mobile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="location">Location<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="location2" name="location"
                                                    value="{{ $user->sellerInformations->location->locationName }}"
                                                    class="form-control" placeholder="Type Your Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-12">
                                            <label class="control-label" for="district">district<span> *</span></label>
                                        </div>
                                        <div class="col-sm-9 col-12">
                                            <div class="form-group">
                                                <input type="text" id="district" name="district"
                                                    value="{{ $user->sellerInformations->district }}"
                                                    class="form-control" placeholder="your district">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-title-left-dark border-bottom d-flex">
                                    <h3><img src="img/post-add3.png" alt="post-add" class="img-fluid"> Make Your Ad Premium
                                    </h3>
                                </div>
                                <div class="pl-50 pl-none--xs">
                                    <p>Premium ads help sellers promote their product or service by getting their ads more
                                        visibility with more buyers and sell what they want faster. </p>
                                    <ul class="make-premium">
                                        <li>
                                            <div class="form-group">
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio5" name="Payement[]"  value="{{ null  }}"
                                                        name="radioInline3" checked="">
                                                    <label for="inlineRadio5">Regular List</label>
                                                    <span>00.00 F CFA</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio6" name="Payement[]" value="Urgent"
                                                        name="radioInline3">
                                                    <label for="inlineRadio6">Urgent Ad</label>
                                                    <span>5. 000 F CFA</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio7" name="Payement[]" value="Top of page"
                                                        name="radioInline3">
                                                    <label for="inlineRadio7">Top of the Page Ad</label>
                                                    <span>10.000 F CFA</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <div class="radio radio-primary radio-inline">
                                                    <input type="radio" id="inlineRadio8" name="Payement[]" value="Top of page + Urgent"
                                                        name="radioInline3">
                                                    <label for="inlineRadio8">Top of the Page Ad + Urgent Ad</label>
                                                    <span>15.000 F CFA</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group mt-20">
                                        <button type="submit" class="cp-default-btn-sm">Submit Now!</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Post Ad Page End Here -->
@endsection
