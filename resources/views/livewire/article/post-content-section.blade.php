<div class="single-post row">
    <div class="col-lg-12">
        <div class="feature-img">
            <img class="img-fluid" src="{{env('WP_IMAGE_PATH')}}{{$post_details['meta_value']}}" alt="">
        </div>
        <div class="post-sharer-container">
            @livewire('article.share')
        </div>
        <div class="post-tags-container">
            @livewire('article.post-tags',['post_slug'=>$post_slug])
        </div>
    </div>
    <div class="col-lg-12 col-md-12 blog_details">
        <div>
            {!! $post_details['post_content'] !!}
        </div>
    </div>
</div>