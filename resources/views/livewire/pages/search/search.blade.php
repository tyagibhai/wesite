<div class="search-wrapper">
    <div class="md-form mt-0 col-md-4">
        <input class="form-control search-input" type="text" placeholder="Eg: Elastic Search, Redis, ES6 etc." wire:model="query">
        @if(!empty($query))
        <div class="absolute z-10 list-group bg-white w-full rounded-t-none shadow-lg results-box">
            @if(!empty($posts))
            <ul>
                @foreach($posts as $i => $post)
                    <li class="list-itemd">
                    <a href="{{env('APP_URL')}}/article/{{$post['post_name']}}">
                    {{ $post['post_title'] }}
                    <div class="sr-date"><i class="far fa-clock"></i>&nbsp;{{dateToReadable($post['post_date'])}}
                    </div>
                    </a>
                    </li>
                @endforeach
            </ul>
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
        @endif
    </div>
</div>

