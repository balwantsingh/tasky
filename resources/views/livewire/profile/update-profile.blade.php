<div>
    @include('includes.livewire-message')
    <form wire:submit.prevent="updateProfile()">
        
        <div class="mb-2">
            <img src="{{ auth()->user()->userProfile() }}" alt="{{ auth()->user()->name }}" class="mb-2 rounded-circle" style="width: 5rem; height: 5rem;">
            <input wire:model="profile_path" class="form-control" 
                type="file" 
                id="profile_path-{{ $iteration }}" 
                name="profile_path"
                style="width: 35%">
            @error('profile_path') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        <div class="form-floating mb-2">
            <input
                wire:model="name"
                type="text" 
                name="name" 
                id="username"
                class="form-control form-control-xl @error('name') required @enderror "
                placeholder="i.e. James ">
            <label for="username">User Name</label>
        </div>

        <div class="form-floating mb-3">
            <input
                wire:model="email"
                type="email" 
                name="email" 
                id="useremail"
                class="form-control form-control-xl @error('email') required @enderror "
                placeholder="User Email ">
            <label for="useremail">User email</label>
        </div>

        <div class="col-12 d-grid gap-2">
            <button type="submit" class="btn btn-xl btn-pink">
            <span wire:loading wire:target="updateProfile" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Save
            </button>
        </div>
    </form>
</div>
