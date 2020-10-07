@section('content')
    <div class="component-wrapper">
         @livewire('pages.search.search-header',['page_title'=>$page_title])
         @livewire('pages.search.search')
         <div class="space-50"></div>
         @livewire('pages.search.search-filter',['slug'=>$slug,'type'=>$type])  
    </div>
@endsection