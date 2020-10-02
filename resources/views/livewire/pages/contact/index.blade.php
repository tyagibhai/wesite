@section('content')
    <div class="component-wrapper">
         @livewire('common.page-header-section',['page_title'=>$page_title])
         <div class="space-50"></div>
         @livewire('pages.contact.form') 
         <div class="space-50"></div> 
    </div>
@endsection