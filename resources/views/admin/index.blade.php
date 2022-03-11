@extends('layouts/page')
@section('page_content')
    <section class="s-space-bottom-full bg-accent-shadow-body">
        <div class="container">
            <div class="breadcrumbs-area">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a> -</li>
                    <li class="active">My Admin Page</li>
                </ul>
            </div>
        </div>
        <div class="container">
            @if (session('message'))
                <div class="alert alert-sucess dt-success-msg f12">{{ session('message') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="gradient-wrapper sidebar-item-box">
                        <ul class="nav tab-nav my-account-title">
                            <li class="nav-item"><a href="#users" class="active" data-toggle="tab"
                                    aria-expanded="false">Users</a></li>
                            <li class="nav-item"><a href="#posts" data-toggle="tab" aria-expanded="false">Posts</a>
                            </li>
                            <li class="nav-item"><a href="#preniumPosts" data-toggle="tab"
                                    aria-expanded="false">Prenium Posts</a></li>
                            <li class="nav-item"><a href="#payment" data-toggle="tab"
                                    aria-expanded="false">Payments</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="tab-content my-account-wrapper gradient-wrapper input-layout1">
                        <div role="tabpanel" class="tab-pane fade active show" id="users">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">E-mail</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($datas_users))
                                                    @foreach ($datas_users as $data)
                                                        <tr>
                                                            <th scope="row">{{ $data->id }}</span>
                                                            <th scope="row">{{ $data->first_name }}</span>
                                                            </th>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    {{ $data->email }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p> {{ $data->status }}</p>
                                                            <td>
                                                                {{ $data->created_at }}
                                                            </td>
                                                            <td>
                                                                @if ($data->status_connection === 'access')
                                                                    <a href="{{ route('user.block', $data->id) }}"><button
                                                                            class="btn btn-primary">block</button></a>
                                                                @else
                                                                    <a href="{{ route('user.unblock', $data->id) }}"><button
                                                                        class="btn btn-primary">unblock</button></a>
                                                                @endif
                                                                <a href=""><button
                                                                        class="btn btn-secondary">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col" style="color: rgb(99, 96, 93)">No User(s)</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade  " id="posts">
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
                                                                    <button class="sorting-btn dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-expanded="false">Sort By<i
                                                                            class="fa fa-sort"
                                                                            aria-hidden="true"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item"
                                                                            href="?q=created_at">Date</a>
                                                                        <a class="dropdown-item" href="?q=price">Best
                                                                            Sale</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="active"><a href="#"
                                                                    data-type="category-list-layout3"
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <table class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Id</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Details</th>
                                                                        <th scope="col">Phone number</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">created_at</th>
                                                                        <th scope="col">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if (!empty($datas_posts))
                                                                        @foreach ($datas_posts as $data)
                                                                            <tr>
                                                                                <th scope="row">{{ $data->id }}</span>
                                                                                <th scope="row">{{ $data->title }}</span>
                                                                                </th>
                                                                                <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                        <button class="btn btn-secondary"
                                                                                            data-toggle="modal"
                                                                                            data-target="#details-{{ $data->id }}">Details</button>
                                                                                    </div>
                                                                                    @include('../components/details_post')
                                                                                </td>
                                                                                <td>
                                                                                    <p> {{ $data->user->sellerInformations->mobile_phone1 }}
                                                                                    </p>
                                                                                </td>
                                                                                <td>
                                                                                    {{ $data->status }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $data->created_at }}
                                                                                </td>
                                                                                <td>
                                                                                    @if ($data->status === 'not approved')
                                                                                        <a
                                                                                            href="{{ route('admin.approved', $data->id) }}"><button
                                                                                                data-toggle="modal"
                                                                                                data-target="#edit_users"
                                                                                                class="btn btn-primary">Approved</button></a>
                                                                                    @else
                                                                                        <a
                                                                                            href="{{ route('admin.disapproved', $data->id) }}"><button
                                                                                                data-toggle="modal"
                                                                                                data-target="#edit_users"
                                                                                                class="btn btn-primary">Disapproved</button></a>
                                                                                    @endif

                                                                                    <a
                                                                                        href="{{ route('admin.delete.post', $data->id) }}"><button
                                                                                            class="btn btn-secondary">Delete</button></a>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr>
                                                                            <th scope="col"></th>
                                                                            <th scope="col" style="color: rgb(99, 96, 93)">
                                                                                No Post(s)</th>
                                                                            <th scope="col"></th>
                                                                            <th scope="col"></th>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade  " id="preniumPosts">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($prenium))
                                                    @foreach ($prenium as $data)
                                                        <tr>
                                                            <th scope="row">{{ $data->id }}</span>
                                                            <th scope="row">{{ $data->title }}</span>
                                                            </th>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <button class="btn btn-secondary" data-toggle="modal"
                                                                        data-target="#details-{{ $data->id }}">Details</button>
                                                                </div>
                                                                @include('../components/details_post')
                                                            </td>
                                                            <td>
                                                                <div
                                                                    style="background-color:<?= $data->prenium->status == 'Urgent' ? 'red' : 'green' ?> ; border-radius:10px; color: white; margin: auto; margin-top:10px; width:70px;   height:auto;  text-align:center;">
                                                                    {{ $data->prenium->status }}</div>
                                                            <td>
                                                                {{ $data->created_at }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('admin.remove_prenium', $data->id) }}"><button
                                                                        data-toggle="modal" data-target="#edit_users"
                                                                        class="btn btn-primary">remove premium
                                                                    </button></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col" style="color: rgb(99, 96, 93)">No Prenium Posts</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="payment">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Post</th>
                                                    <th scope="col">Reason</th>
                                                    <th scope="col">Created at</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($payments))
                                                    @foreach ($payments as $data)
                                                        <tr>
                                                            <th scope="row">{{ $data->id }}</th>
                                                            <td>
                                                                {{ $data->montant }}
                                                            </td>
                                                            <td scope="row">{{ $data->user->first_name }}  {{  $data->user->last_name }}</td>
                                                            <td>
                                                               {{ $data->posts->title }}
                                                            </td>
                                                            <td  style="background-color:<?= $data->prenium->status == 'Urgent' ? 'red' : 'green' ?>; color:white;">
                                                                Put Status  <strong>{{ $data->prenium->status }}</strong>
                                                            </td>
                                                            <td>
                                                                {{ $data->created_at }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col" style="color: rgb(99, 96, 93)">No  Payment(S)</th>
                                                        <th scope="col"></th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection
