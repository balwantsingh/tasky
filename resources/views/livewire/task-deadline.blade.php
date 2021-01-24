<div>
    @include('includes.livewire-message')
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title float-start m-1">Task deadline</h5>
            <a href="#" data-bs-toggle="modal" data-bs-target="#add-deadline"
                class="btn btn-sm btn-pink-outline float-end">
            <i class="bi bi-plus-square-dotted p-2"></i> New deadline
            </a>
        </div>
        <ul class="list-group list-group-flush">
            @forelse($deadlines as $deadline)
                <li class="list-group-item profile-pic">
                    <p class="setting-label float-start">{{ $deadline->name }}</p>
                    <div class="">
                        <a wire:click.prevent="edit({{ $deadline->id }})" href="#" data-bs-toggle="modal" data-bs-target="#add-deadline"
                            class="gray-icon-setting edit"><i class="bi bi-pencil-square p-2"></i></a>
                        <a wire:click.prevent="putOnTrash({{ $deadline->id }})" 
                            onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()"    
                            href="#" data-bs-toggle="modal" data-bs-target="#delete" class="gray-icon-setting trash"><i
                            class="bi bi-trash p-2"></i></a>
                    </div>
                </li>
            @empty
                <li class="list-group-item profile-pic">
                    <p class="setting-label float-start">{{ __('No Data Found') }}</p>
                </li>
            @endforelse
        </ul>
    </div>

    <!-- Modal Add/Edit Deadline -->
    <div wire:ignore.self class="modal fade" id="add-deadline" tabindex="-1" aria-labelledby="taskdeadlineModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            @if(!$wantsToUpdateModal)
                <form wire:submit.prevent="storeDeadline">
            @else
                <form wire:submit.prevent="updateDeadline">
            @endif
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="taskdeadlineModalLabel">New deadline</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-grad form-floating mb-3">
                            <input wire:model="name" type="text" class="form-control form-control-xl @error('name') required @enderror focus"
                                id="floatingInput" placeholder="Deadline 1 day" required>
                            <label for="floatingInput">Deadline i.e. 1 day</label>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-pink b-block">
                            <span wire:loading wire:target="storeDeadline, updateDeadline" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
