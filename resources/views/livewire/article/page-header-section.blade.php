<div>
    <section class="hero-banner hero-banner--sm mb-30px">
        <div class="container">
            <div class="hero-banner--sm__content">
                <h1>{{$post_header_content['info']['title']}}</h1>
                <div class="post-header-link-bred">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb arr-right justify-content-center breadcrumb-arrow">
                            @foreach($post_header_content['categories'] as $category)
                                <li class="breadcrumb-item"><a href="/articles/explore/{{$category['slug']}}?type=category">{{$category['name']}}</a></li>
                            @endforeach          
                        </ol>
                    </nav>
                </div>
                <p class="post-header-info"> 
                  <small class="">
                        <i class="far fa-clock"></i> {{$post_header_content['info']['date']}}
                        <i class="far fa-user" style="margin-left:7px"></i> {{ $post_header_content['info']['author']}}
                  </small>
                </p>
            </div>
        </div>
    </section>
</div>
