<div>
    @include('includes.livewire-message')
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title float-start m-1">User</h5>
            <a wire:click="$emitUp('clearPreviousInputValue')" href="#" data-bs-toggle="modal"
                data-bs-target="#new-user" class="btn btn-sm btn-pink-outline float-end"><i
                    class="bi bi-plus-square-dotted p-2"></i>
                New user</a>
        </div>
        <ul class="list-group list-group-flush">
            @forelse($users as $user)
                <li class="list-group-item profile-pic">
                    @if($user->profile_path)
                        <img class="profile float-sm-start border m-2" src="img/profile.png">
                    @endif
                    <p class="setting-label float-start m-1">{{ $user->name }}</p>
                    <div class="">
                        <a wire:click.prevent="edit({{ $user->id }})" href="#" data-bs-toggle="modal" data-bs-target="#new-user" class="gray-icon-setting edit">
                            <i class="bi bi-pencil-square p-2"></i>
                        </a>
                        <a wire:click.prevent="putOnTrash({{ $user->id }})" href="#" class="gray-icon-setting trash">
                            <i class="bi bi-trash p-2"></i>
                        </a>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <p class="setting-label">No User Found</p>
                </li>
            @endforelse
        </ul>
    </div>
    <!-- Modal New User -->
    <div wire:ignore.self class="modal fade" id="new-user" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            @if(!$wantsToUpdateModal)
                <form wire:submit.prevent="createUser">
                @else
                    <form wire:submit.prevent="updateUser">
            @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <select wire:model="department_id" class="form-select @error('department_id') required @enderror" id="departments"
                            aria-label="Floating label select example">
                            <option value="0">Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                        <label for="departments">Select department</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input wire:model="name" type="text" class="form-control form-control-xl @error('name') required @enderror" id="user-name"
                            placeholder="i.e. James ">
                        <label for="user-name">i.e. James</label>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input wire:model="email" 
                            type="email" 
                            class="form-control form-control-xl @error('email') required @enderror" 
                            id="user-email"
                            placeholder="User name i.e. James "
                            {{ ($wantsToUpdateModal) ? 'readonly' : '' }}>
                        <label for="user-email">User email</label>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-pink b-block">
                        <span wire:loading wire:target="createUser, updateUser" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span> Save
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
