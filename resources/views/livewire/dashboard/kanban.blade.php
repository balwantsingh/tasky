<div>
    @include('includes.livewire-message')
    <div class="row">
        @foreach($taskKanban as $status)
            <div class="col-md-4">
                <div class="card rounded-pill bg-gradient">
                    <div class="card-body">
                        <span class="fs-5 fw-bold p-2">{{ $status->name }}</span><span
                            class="badge position-absolute top-50 end-0 translate-middle bg-pink rounded-pill p-2">{{ count($status->tasks) }}</span>
                    </div>
                </div>
                @foreach($status->tasks as $task)
                    <div class="card br-10 m-2">
                        <div class="card-body">
                            <img class="profile-xl float-sm-end border" src="{{ $task->assignTo->userProfile() }}">
                            <h5 class="text-black m-0 fs-6 fw-bold">
                                <a wire:click.prevent="viewTask({{ $task->id }})" href="#" data-bs-toggle="modal"
                                    data-bs-target="#viewTask">{{ $task->assignTo->name }}</a>
                            </h5>
                            <p class="text-dark-gray m-0 fst-italic">Department: {{ $task->department->name }}
                            </p>
                            <p class="text-gray m-0 w-90">
                                Task Title: {{ $task->name }}
                                <a href="#" class="gray"><i class="bi bi-paperclip p-1 gray"></i></a>
                            </p>
                            <span
                                class="text-pink mt-1 float-start">{{ $task->created_at->calendar().' '.$task->created_at->isoFormat('Do Y') }}</span>
                            {{-- <span class="m-3 text-pink"><i class="bi bi-clock-history"></i> 24:00:00<span> --}}
                            <div class="float-end">
                                @hasrole('admin')
                                    <a wire:click.prevent="editTask({{ $task->id }})" href="#" class="gray"
                                        data-bs-toggle="modal" data-bs-target="#updateTaskModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a wire:click.prevent="putTaskOnTrash({{ $task->id }})"
                                        onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()"
                                        href="#" class="gray"><i class="bi bi-trash p-2"></i></a>
                                @endhasrole
                                <a href="#" data-bs-toggle="modal" data-bs-target="#comment" class="gray">
                                    <i class="bi bi-chat-right-text"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <!-- Modal Update Task-->
    @if($wantsToUpdateTask)
        <div wire:ignore.self class="modal fade" id="updateTaskModal" tabindex="-1"
            aria-labelledby="updateTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <form wire:submit.prevent="updateTask">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTaskModalLabel">Edit task {{ $title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 mb-3">
                                <div class="form-floating">
                                    <input wire:model="title" type="text" id="title" class="form-control required"
                                        placeholder="Title" required />
                                    <label for="title">Title</label>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-floating">
                                    <select wire:model="department_id" class="form-select required" id="department-id"
                                        aria-label="Floating label select example">
                                        <option value="0">Select Department</option>
                                        @foreach($departments as $dept)
                                            <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="department">Select department</label>
                                    @error('department_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-floating required">
                                    <select wire:model="assign_to" class="form-select" id="assign_to"
                                        aria-label="Floating label select example">
                                        <option value="0">Assign to</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="assign_to">Assing to:</label>
                                    @error('assign_to')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-floating required">
                                    <textarea wire:model="message" class="form-control form-control-textarea"
                                        placeholder="Leave a comment here" id="message" style="height: 175px"
                                        required></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-floating">
                                    <select wire:model="deadline_id" class="form-select required" id="deadline-id"
                                        aria-label="Floating label select example">
                                        <option value="0">Select Deadline</option>
                                        @foreach($deadlines as $deadline)
                                            <option value="{{ $deadline->id }}">{{ $deadline->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="deadline-id">Task deadline</label>
                                    @error('deadline_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-12 mb-3">
                                 <div class="upload-btn-wrapper">
                                     <button class="upload"><i class="bi bi-paperclip"></i> Attachment</button>
                                     <input type="file" name="myfile" />
                                 </div>
                             </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-lg btn-pink b-block">
                                <span wire:loading wire:target="updateTask" class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($wantsToViewTask)
        <!-- Modal View Task-->
        <div wire:ignore.self class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="viewTask" tabindex="-1" aria-labelledby="viewTaskModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="border-bottom" style="padding:10px 0 0 25px;">
                        <button wire:click.prevent="$emit('closeButton')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="float:right;margin:10px 20px 0 0;"></button>
                        <img class="profile-xs float-sm-start border" src="{{ $taskView->assignTo->userProfile() }}">
                        <h5 class="text-black m-0 fs-6 fw-bold">{{ $taskView->assignTo->name }}</h5>
                        <p class="text-dark-gray m-0 fst-italic">{{ $taskView->department->name }}</p>
                        <span class="text-pink" style="margin:0 15px 10px 35px;">
                            {{ $task->created_at->calendar().' '.$task->created_at->isoFormat('Do Y') }}
                        </span>
                        {{-- <span class="text-pink" style="margin:0 15px 0 0;"><i class="bi bi-clock-history"></i>
                            24:00:00</span> --}}
                        <span class="text-pink"><i class="bi bi-person"></i> By: {{ $taskView->user->name }}<span>
                                </p>
                    </div>
                    <div class="modal-body px-5">
                        <h5>
                            {{ $taskView->name }}
                        </h5>
                        <p>
                            {{ $taskView->message }}
                        </p>
                        {{-- <div class="attachment">
                    <img src="img/screen1.jpg">
                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
