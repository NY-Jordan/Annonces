@extends('layouts/page')
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
            @if ($successUpdateInformations === true)
                <div class="alert alert-success">Vos Informations ont bien été modifiées</div>
            @endif
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="gradient-wrapper sidebar-item-box">
                        <ul class="nav tab-nav my-account-title">
                            <li class="nav-item"><a  href="#personal" data-toggle="tab"
                                    aria-expanded="false">Personal Information</a></li>
                            <li class="nav-item"><a href="#profile" data-toggle="tab" aria-expanded="false">Profile</a></li>
                            <li class="nav-item"><a href="#my-add" class="active" data-toggle="tab" aria-expanded="false">My Ads</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="tab-content my-account-wrapper gradient-wrapper input-layout1">
                        <div role="tabpanel" class="gradient-padding tab-pane fade" id="personal">
                            <h2 class="title-section">Personal Information</h2>
                            <form id="login-page-form" method="POST" action="{{ route("updateInformations") }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Email</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name2" name="email" value="{{ $user->email }}" class="form-control"
                                                placeholder="Enter your e-mail here . . .">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">First Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="first-name" name="Fisrt_name" value="{{  $user->first_name }}" class="form-control"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Last Name</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="last-name" name="Last_name" value="{{  $user->last_name }}"  class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Phone</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="text" id="phone" name="Phone" value="{{ $user->sellerInformations->mobile_phone1 }}" class="form-control"
                                                placeholder="Your Phone Number">
                                            <div class="checkbox checkbox-primary checkbox-circle">
                                                <input id="checkbox1" name="show_phone" type="checkbox" checked="">
                                                <label for="checkbox1">Hide the phone number on the published ads.</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Current Password</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" id="c-password" name="Current_Password" class="form-control"
                                                placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">New Password</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" id="n-password" name="New_Password" class="form-control"
                                                placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                        <label class="control-label">Confirm Password</label>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                        <div class="form-group">
                                            <input type="password" name="Confirm_Password" id="r-password" class="form-control"
                                                placeholder="Type  Your Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="ml-auto col-lg-9 col-md-8 col-sm-8 col-12 ml-none--mb">
                                        <div class="form-group">
                                            <button type="submit" class="cp-default-btn-sm">Update Details!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="gradient-padding tab-pane fade" id="profile">
                            <h3 class="title-section">Public Profile</h3>
                            <div class="public-profile">
                                <div class="public-profile-item">
                                    <div class="public-profile-title">
                                        <h4>Avatar</h4>
                                    </div>
                                    <div class="public-profile-content">
                                        <img class="img-fluid" src="img/user/avatar.jpg" alt="Avatar">
                                        <div class="file-title">Upload a new avatar:</div>
                                        <div class="file-upload-area"><a href="#">Choose File</a>No File Choosen</div>
                                        <div class="file-size">JPEG 80x80px</div>
                                    </div>
                                </div>
                                <div class="public-profile-item">
                                    <div class="public-profile-title">
                                        <h4>Banner Image</h4>
                                    </div>
                                    <div class="public-profile-content">
                                        <img class="img-fluid" src="img/user/banner.jpg" alt="Avatar">
                                        <div class="file-title">Upload a new homepage image:</div>
                                        <div class="file-upload-area"><a href="#">Choose File</a>No File Choosen</div>
                                        <div class="file-size">JPEG 590x242</div>
                                    </div>
                                </div>
                                <div class="public-profile-item">
                                    <div class="public-profile-title">
                                        <h4>Profile Heading</h4>
                                    </div>
                                    <div class="public-profile-content">
                                        <input class="profile-heading" type="text" value="">
                                        <div class="file-size">Appears on your profile page</div>
                                    </div>
                                </div>
                                <div class="public-profile-item">
                                    <div class="public-profile-title">
                                        <h4>Update Profile</h4>
                                    </div>
                                    <div class="public-profile-content">
                                        <a href="#" class="cp-default-btn-lg" id="save">Save</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade active show" id="my-add">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="gradient-wrapper item-mb border-none">
                                        <div class="gradient-title">
                                            <div class="row no-gutters">
                                                <div class="col-4 text-center-mb">
                                                    <h2 class="mb10--mb">My Ad List</h2>
                                                </div>
                                                <div class="col-8">
                                                    <div class="layout-switcher float-none-mb text-center-mb mb10--mb">
                                                        <ul>
                                                            <li>
                                                                <div class="page-controls-sorting">
                                                                    <button class="sorting-btn dropdown-toggle" type="button"
                                                                        data-toggle="dropdown" aria-expanded="false">Sort By<i
                                                                            class="fa fa-sort" aria-hidden="true"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="?q=created_at">Date</a>
                                                                        <a class="dropdown-item" href="?q=price">Best Sale</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="active"><a href="#" data-type="category-list-layout3"
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
                                                @foreach ($posts as $post)
                                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                        <div class="product-box item-mb zoom-gallery">
                                                            <div class="item-mask-wrapper">
                                                                <div class="item-mask secondary-bg-box"><img
                                                                        src="{{  Storage::url($post->image->path) }}" alt="categories"
                                                                        class="img-fluid">
                                                                    <div class="trending-sign active" data-tips="Featured">
                                                                        <i class="fa fa-bolt" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="title-ctg"> {{ $post->categories->categoryName }}
                                                                    </div>
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
                                                                <div class="title-ctg">{{ $post->categories->categoryName }}</div>
                                                                <h3 class="short-title"><a
                                                                        href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a></h3>
                                                                <h3 class="long-title"><a
                                                                        href="{{ route('postDetails', $post->id) }}">{{ $post->title }}</a></h3>
                                                                <ul class="upload-info">
                                                                    <li class="date"><i class="fa fa-clock-o"
                                                                            aria-hidden="true"></i>{{ $post->created_at->format('j F, Y') }}</li>
                                                                    <li class="place"><i class="fa fa-map-marker"
                                                                            aria-hidden="true"></i>{{ $post->user->sellerInformations->location->locationName }},
                                                                            {{ $post->user->sellerInformations->district }}</li>
                                                                    <li class="tag-ctg"><i class="fa fa-tag"
                                                                            aria-hidden="true"></i>{{ $post->categories->categoryName }}</li>
                                                                </ul>
                                                                <p>{{ substr($post->details, 0, 100).'...'  }}</p>
                                                                <div class="price">{{ $post->price }} Fcfa</div>
                                                                <a href="{{ route("postDetails", [ 'id' => $post->id])  }}"
                                                                    class="product-details-btn">Details</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
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
