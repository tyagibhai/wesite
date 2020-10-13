<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form wire:submit.prevent="submit">
                    <div class="single">
                        <h3>Don't lose a chance to be among the firsts to know about our upcoming news and updates.</h3>
                        <div class="input-group">
                            <input type="email" class="form-control theme-input" placeholder="Subscribe To Our Newsletter" wire:model="email">
                            <span class="input-group-btn">
                            <button class="btn theme-btn-blue" type="submit">Subscribe</button>
                            </span>
                        </div>
                        {{-- error filed --}}
                        @error('email') <div class="alert alert-danger acl-error" role="alert">{{ $message }}</div> @enderror
                        {{-- success message --}}
                        <div class="resp-message">
                            @if (session()->has('message'))
                                <div class="alert alert-success acl-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
