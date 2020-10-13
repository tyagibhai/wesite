<div>  
    <div class="container blog list-container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 blog-list-card">
                    <div class="card">
                        <img class="card-img" src="{{env('WP_IMAGE_PATH')}}{{$article['meta_value']}}" alt="{{$article['post_title']}}">
                        <div class="card-img-overlay">
                            <a href="/articles/explore/{{strtolower($article['terms_name'])}}?type=category" class="btn btn-light btn-sm">{{$article['terms_name']}}</a>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title" rel="bookmark"><a href="{{env('APP_URL')}}/article/{{$article['post_name']}}">{{$article['post_title']}}</a></h3>
                            <small class="text-muted cat">
                                <span><i class="far fa-clock"></i> {{$article['post_date']}}</span>
                                <img src="{{$article['profile_image']}}"/> {{ $article['display_name']}}
                            </small>
                            <p class="card-text">{{ $article['post_excerpt']}}</p>
                            <a href="{{env('APP_URL')}}/article/{{$article['post_name']}}" class="button theme-btn-blue-dark">Read Article</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                            <div class="">
                                Technology
                            </div>
                            <div class="" style="">
                                <i class="far fa-eye"></i> 1347
                                <i class="far fa-comment"></i> 12
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
