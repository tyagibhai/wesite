<div class="post-tags">
    @foreach($tags as $tag)
        <a href="/articles/explore/{{$tag['slug']}}?type=tag"><i class="fas fa-tags"></i>&nbsp;{{$tag['name']}}</a>
    @endforeach
</div>


