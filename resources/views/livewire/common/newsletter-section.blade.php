<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form wire:submit.prevent="submit">
                    <div class="single">
                        <h3>Want us to email you occasionally?</h3>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email" wire:model="email">
                            <span class="input-group-btn">
                            <button class="btn btn-theme" type="submit">Subscribe</button>
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
