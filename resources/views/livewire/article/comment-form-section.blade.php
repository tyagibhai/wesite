<div class="comment-form">
    <h4>Leave a Reply</h4>
    <form wire:submit.prevent="submit">
        <div class="form-inline">
            <div class="form-group col-lg-6 col-md-6 name">
                <input type="text" class="form-control"  placeholder="Enter Name" onfocus="this.placeholder = 'Enter Name'" onblur="this.placeholder = 'Enter Name'" wire:model="name">
                @error('name') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-lg-6 col-md-6 email">
                <input type="email" class="form-control"  placeholder="Enter email address" onfocus="this.placeholder = 'Enter email address'" onblur="this.placeholder = 'Enter email address'" wire:model="email">
                @error('email') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Reply" onfocus="this.placeholder = 'Reply'" onblur="this.placeholder = 'Reply'" wire:model="comment"></textarea>
            @error('comment') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
        </div>
        <button class="button button-postComment theme-btn-blue-dark">Post Comment</button>
    </form>
</div>