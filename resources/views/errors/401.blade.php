@extends('layouts/default')
@section('seo')
    @include('meta::manager', [
        'title'         =>  'NY-Annonces | 404',
        'description'   => '404',
    ]) 
@endsection
@section('content')
    <!-- Header Area End Here -->
    <!-- Featured Area Start Here -->
    <section class='container' style='margin-top:300px'>
        <h1> Oops !  UNAUTHORIZED</h1>  
        <h3>Error 401</h3>
        
    </section>     
@endsection
