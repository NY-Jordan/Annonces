@extends('../layouts/page')
@section('page_content');
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">SignUp Page</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="gradient-wrapper mb--sm">
                        <div class="gradient-title">
                            <h2>Creat An Account</h2>
                        </div>
                        <div class="input-layout1 gradient-padding">
                            <form id="login-page-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger ">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name">First Name <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first_name" name="first_name" class="form-control"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="last-name">Last Name <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="last_name" name="last_name" class="form-control"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label">Location<span> *</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <select id="location-name" name="location_id" class='select2 form-control '>
                                                <option value="0">Select a Location</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">
                                                        {{ $location->locationName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="district">district<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="district" name="district" class="form-control"
                                                placeholder="district">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label possition-top" for="first-name">Gender
                                            <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <div class="radio radio-primary radio-inline">
                                                <input type="radio" id="inlineRadio3" value="Male" name="gender[]"
                                                    checked="">
                                                <label for="inlineRadio3">Male</label>
                                            </div>
                                            <div class="radio radio-primary radio-inline">
                                                <input type="radio" id="inlineRadio4" value="Female" name="gender[]">
                                                <label for="inlineRadio4">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="phone">Mobile Phone 1<span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="mobile_phone1" class="form-control"
                                                placeholder="Your Phone Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="phone">Mobile Phone 2</label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="mobile_phone2" class="form-control"
                                                placeholder="Your Phone Number">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label">About Yourself <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <textarea placeholder="Write here something about you"
                                                class="textarea form-control" name="about_yourself" id="form-message1"
                                                rows="4" cols="20" data-error="Message field is required"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name">Email <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name2" name="email" class="form-control"
                                                placeholder="Enter your e-mail here . . .">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="password">Password <span>*</span></label>
                                    </div>
                                    <div class="col-sm-9 col-12">
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-sm-9 col-12 ml-none--mb">
                                        <div class="form-group">
                                            <button type="submit" class="cp-default-btn-sm">SignUp Now!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <ul class="sidebar-more-option">
                            <li>
                                <a href="post-ad.html"><img src="img/banner/more1.png" alt="more" class="img-fluid">Post a
                                    Free Ad</a>
                            </li>
                            <li>
                                <a href="#"><img src="img/banner/more2.png" alt="more" class="img-fluid">Manage Product</a>
                            </li>
                            <li>
                                <a href="favourite-ad-list.html"><img src="img/banner/more3.png" alt="more"
                                        class="img-fluid">Favorite Ad list</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-item-box">
                        <img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
