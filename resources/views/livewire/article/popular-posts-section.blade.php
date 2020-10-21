<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Recent Posts</h3>
    @foreach($posts as $post)
        <div class="media post_item">
            <img src="{{env('WP_IMAGE_PATH')}}/{{$post['post_thumbnail']}}" alt="{{$post['post_title']}}" style="width:28px; height:auto">
            <div class="media-body">
                <a href="{{env('APP_URL')}}/article/{{$post['post_name']}}">
                   {{$post['post_title']}}
                </a>
                <p>{{$post['post_date']}}</p>
            </div>
        </div>
    @endforeach
    <div class="br"></div>
</aside>