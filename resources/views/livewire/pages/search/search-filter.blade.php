<div class="search-blog-list-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="label label-info"><b>Filter by category:</b></span>
                <select class="form-control select-theme" wire:model="slug">
                    {{-- default --}}
                    <option value="">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div> 
        </div>  
    </div>
    <div class="space-20"></div>
    @livewire('common.blog-list-cards',['slug'=>$slug,'type'=>$type]) 
    @livewire('article.load-more')
</div>
