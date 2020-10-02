<div>
    <div class="d-load-more d-flex justify-content-center">
        <p wire:click="$emit('loadMore')">Load More</p>
    </div>

    <div class="loader-overlay-hide {{$loading}}">
        <p class="spinner-border" role="status"></p>
        <p class="loading-text">loading...</p>
    </div>
</div>
