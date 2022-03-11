@extends('layouts/page')
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="#">Home</a> -</li>
                    <li class="active">Who We Are</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                    <div class="gradient-wrapper">
                        <div class="gradient-title">
                            <h2>To know Who We Are</h2>
                        </div>
                        <div class="about-us gradient-padding">
                            <img src="img/banner/about.jpg" alt="about" class="img-fluid">
                            <h3>Ridolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante nec vulpute
                                Nullgravida augue.</h3>
                            <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante
                                nec vulputatery Nullay aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem,
                                lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum tellus</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante
                                nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem,
                                lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum tellus</p>
                            <p>Pellentesque in mauris placerat, porttitor lorem id, ornare nisl. Pellentesque rhoncus
                                convallis felis, in egestas libero. Donec et nibh dapibus, sodales nisi quis, fringilla
                                augue. Donec dui quam, egestas in varius ut, tincidunt quis ipsum. Nulla nec odio eu nisi
                                imperdiet dictum.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur sit amet ante
                                nec vulputate. Nulla aliquam, justo auctor consequat tincidunt, arcu erat mattis lorem,
                                lacinia lacinia dui enim at eros. Pellentesque ut gravida augue. Duis ac dictum
                                tellusPellentesque in mauris placerat, porttitor lorem id, ornare nisl. Pellentesque rhoncus
                                convallis felis, in egestas liber Donedapibus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="sidebar-item-box">
                        <ul class="sidebar-more-option">
                            <li>
                                <a href="{{ route('addPostFree') }}"><img src="img/banner/more1.png" alt="more" class="img-fluid">Post a
                                    Free Ad</a>
                            </li>
                            <li>
                                <a href="{{ route('account') }}"><img src="img/banner/more2.png" alt="more" class="img-fluid">Manage Product</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
