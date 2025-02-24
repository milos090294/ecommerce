<form wire:submit.prevent="subscribe" class="form-subcriber d-flex flex-column wow fadeIn animated">
    <div class="d-flex">
        <input type="email" wire:model="email" class="form-control bg-white font-small" placeholder="Write Email">
        <button class="btn bg-dark text-white" type="submit">Subscribe</button>
    </div>

    <div class="mt-2">
        @error('email') 
            <span class="text-danger font-small d-block">{{ $message }}</span> 
        @enderror

        @if (session()->has('message'))
            <span class="text-success font-small d-block">{{ session('message') }}</span>
        @endif
    </div>
</form>
