<div class="container">
    <p>Interested in working together or you have any query? We should queue up a chat.</p>
    <div class="comment-form">
        <h4>Let's do this!</h4>
        <div class="row">
            <div class="col-md-8">
                <form wire:submit.prevent="submit">
                    {{-- first row --}}
                    <div class="form-inline">
                        <div class="form-group col-lg-6 col-md-6">
                            <input type="text" class="form-control"  placeholder="First Name" wire:model="first_name"/>
                            @error('first_name') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <input type="text" class="form-control" placeholder="Last Name" wire:model="last_name"/>
                            @error('last_name') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    {{-- second row --}}
                    <div class="form-inline">
                        <div class="form-group col-lg-6 col-md-6">
                            <input type="email" class="form-control" placeholder="Email" wire:model="email" />
                            @error('email') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6">
                            <input type="text" class="form-control" placeholder="Phone" wire:model="phone"/>
                            @error('phone') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>   
                    <div class="form-inline">
                         <div class="form-group col-lg-12 col-md-12">  
                            <input type="text" class="form-control" placeholder="Subject" wire:model="subject">
                            @error('subject') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group col-lg-12 col-md-12">
                            <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" wire:model="message"></textarea>
                            @error('message') <span class="cstm-err" role="alert">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    {{-- error fields --}}
                    <button class="button button-postComment theme-btn-blue-dark" type="submit" {{$disabled}}>Submit</button>
                    {{-- success message --}}
                    <div class="resp-message">
                        @if (session()->has('message'))
                            <div class="alert alert-success acl-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-center"> 
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 91 886 0327 209</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>anela.kumar@gmail.com</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>