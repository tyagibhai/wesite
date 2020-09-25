<section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="blog_left_sidebar">
                    @livewire('article.post-content-section',['post_slug'=>$post_slug])
                    @livewire('article.post-comments-section')
                    @livewire('article.comment-form-section')
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @livewire('article.author-widget-section')
                    @livewire('article.popular-posts-section')	
                    @livewire('article.post-categories-section')	
                </div>
            </div>
        </div>
    </div>
</section>