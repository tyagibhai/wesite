@section('content')
    <div class="component-wrapper">
        @livewire('article.container',['post_slug'=>$slug])
    </div>
@endsection