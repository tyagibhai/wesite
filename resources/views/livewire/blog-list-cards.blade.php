<div>  
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 blog-list-card">
                    <div class="card">
                        <img class="card-img" src="{{env('WP_IMAGE_PATH')}}{{$article->meta_value}}" alt="{{$article->post_title}}">
                        <div class="card-img-overlay">
                            <a href="/articles/explore/{{strtolower($article->terms_name)}}?type=category" class="btn btn-light btn-sm">{{$article->terms_name}}</a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{$article->post_title}}</h4>
                            <small class="text-muted cat">
                                <i class="far fa-clock"></i> {{$article->post_date}}
                                <img src="{{$article->profile_image}}"> {{ $article->display_name}}
                            </small>
                            <p class="card-text">{{ $article->post_excerpt}}</p>
                            <a href="/article/{{$article->post_name}}" class="read-button">Read Article</a>
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
<style>

.blog-list-card{
    transition: all 1s ease;
}
.blog-list-card:hover{  
    cursor:pointer;
}
.blog-list-card img{  
    transition: all .7s ease;
}
.blog-list-card:hover .card-img{
    transform: scale(.96);
}
.blog-list-card .card-img {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}
.blog-list-card .card-title {
  margin-bottom: 0.3rem;
}

.blog-list-card .cat {
  display: inline-block;
  margin-bottom: 1rem;
  font-size:.8rem;
}
.blog-list-card .cat img{
  height:18px;
  width:18px;
  border-radius:50%;
}

.blog-list-card .fa-users {
  margin-left: 1rem;
}

.blog-list-card .card-footer {
  font-size: 0.8rem;
  display:none !important;
}
.blog-list-card .card-img-overlay{
    height:80px;
}

.blog-list-card .read-button{
    display: inline-block;
    border: 1px solid transparent;
    text-transform: capitalize;
    font-size: 15px;
    font-weight: 500;
    padding: 10px 24px;
    border-radius: 30px;
    background: #fafafa;
    color: #31246e;
    transition: all 0.4s ease;
}

.blog-list-card .read-button:hover{
    color:#fff;
    background:#31246e;
}

</style>