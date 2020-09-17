@extends('layouts.frontend')

@section('content')
    <div class="component-wrapper">
        @include('frontend.includes.BannerSection') 
        @include('frontend.includes.FeaturesSection') 
        @include('frontend.includes.AboutSection') 
    </div>
@endsection