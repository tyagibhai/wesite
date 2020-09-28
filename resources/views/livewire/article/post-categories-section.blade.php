<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Top Catgories</h4>
    <ul class="list cat-list">
        @foreach($categories as $category)
            <li>
                <a href="{{env('APP_URL')}}/articles/explore/{{$category->slug}}?type=category" class="d-flex justify-content-between">
                    <p>{{$category->name}}</p>
                    <p>{{$category->count}}</p>
                </a>
            </li>
        @endforeach  
    </ul>
</aside>
