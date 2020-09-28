@section('content')
    <div class="component-wrapper">
        @livewire('home.banner-section') 
        @livewire('home.features-section') 
        @livewire('home.about-section')
        @livewire('common.blog-list-cards') 
        @livewire('article.load-more')
    </div>
@endsection