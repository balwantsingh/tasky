<div>
    @include('includes.livewire-message')
    <form wire:submit.prevent="updatePassword()">
        <div class="form-floating mb-3">
            <input type="password" 
                wire:model="current_password"
                name="current_password"
                class="form-control form-control-xl @error('current_password') is-invalid @enderror required " 
                id="current_password"
                placeholder="current_password ">
            <label for="current_password">{{ __('Current Password') }}</label>
            @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" 
                wire:model="password"
                name="password"
                class="form-control form-control-xl @error('password') is-invalid @enderror required " 
                id="password"
                placeholder="password ">
            <label for="password">{{ __('Password') }}</label>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-floating mb-3">
            <input 
                type="password" 
                wire:model="password_confirmation"
                name="password_confirmation" 
                class="form-control form-control-xl required"
                id="password_confirmation-confirm" placeholder="Confirm Password ">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
        </div>

        <div class="col-12 d-grid gap-2">
            <button type="submit" class="btn btn-xl btn-pink">
                <span wire:loading wire:target="updatePassword" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Save
            </button>
        </div>
    </form>
</div>
