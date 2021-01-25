<div>
    @include('includes.livewire-message')
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="card-title float-start m-1">Department</h5>
            <a 
                wire:click="$emitUp('clearPreviousInputValue')"
                href="#" data-bs-toggle="modal" data-bs-target="#departmentModal"
                class="btn btn-sm btn-pink-outline float-end"><i class="bi bi-plus-square-dotted p-2"></i>
                New department</a>
        </div>
        <ul class="list-group list-group-flush">
            @forelse($departments as $dept)
                <li class="list-group-item profile-pic">
                    <p class="setting-label float-start">{{ $dept->name }}</p>
                    <div class="">
                        <a wire:click.prevent="edit({{ $dept->id }})" href="#" data-bs-toggle="modal"
                            data-bs-target="#departmentModal" class="gray-icon-setting edit">
                            <i class="bi bi-pencil-square p-2"></i>
                        </a>
                        <a href="#" wire:click="putOnTrash({{ $dept->id }})"
                            onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()"
                            class="gray-icon-setting trash">
                            <i class="bi bi-trash p-2"></i>
                        </a>
                    </div>
                </li>
            @empty
                <li class="list-group-item">
                    <p class="setting-label">No Data Found</p>
                </li>
            @endforelse
        </ul>
    </div>
    <!-- Modal Create department -->
    <div wire:ignore.self class="modal fade" 
        id="departmentModal"
        tabindex="-1" 
        aria-labelledby="departmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            @if(!$wantsToUpdateModal)
                <form wire:submit.prevent="storeDepartment">
                @else
                    <form wire:submit.prevent="updateDepartment">
            @endif
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="departmentModalLabel">New department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grad form-floating mb-3">
                        <input type="text" wire:model="name"
                            class="form-control form-control-xl @error('name') required @enderror focus"
                            id="department-id" placeholder="i.e. Sales" required>
                        <label for="department-id">i.e. Marketing</label>
                        @error('name') 
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-pink b-block">
                        <span wire:loading wire:target="storeDepartment, updateDepartment"
                            class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Save
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
