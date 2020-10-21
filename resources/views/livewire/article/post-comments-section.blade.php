<div class="comments-area">
    @if(!empty($comments))
        <h4>{{$count}} Comments</h4>
    @else
       <h4> No comments yet</h4>
    @endif

    {{-- comment starts --}}
    <ul class="list cat-list">
        @foreach($comments as $comment)
            <li>
                <div href="" class="d-flex justify-content-between">
                    <p class="text-primary"> 
                    <img src="https://www.gravatar.com/avatar/{{md5(strtolower(trim($comment['comment_author_email'])))}}" class="thumb rounded-circle" alt=""/>
                    <strong class="comment-author"><span>@</span>{{$comment['comment_author']}}</strong></p>
                    <p>
                        <span class="text-muted pull-right">
                            <small class="text-muted"><i class="far fa-clock"></i> {{ dateToReadable($comment['comment_date'])}}</small>
                        </span>
                    </p>
                </div>
                <p>{{ $comment['comment_content']}}</p>
            </li>
        @endforeach
    </ul>
    {{-- comments ends --}}
    <div class="comment-loading" wire:loading>
          <i class="fas fa-spinner fa-spin"></i> loading...
    </div>
    @if($count>0)
        <p class="load-cmnt" wire:click="$emit('loadMoreComments')">more replies <i class="fas fa-chevron-down"></i></p>
    @endif
</div>