@extends('layouts.frontend')

@section('content')
    <div class="component-wrapper">
        @livewire('index.banner-section') 
        @livewire('index.features-section') 
        @livewire('index.about-section')
        @livewire('common.blog-list-cards') 
    </div>
@endsection