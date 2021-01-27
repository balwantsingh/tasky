<div>
    @hasrole('admin')
    <button type="button" class="btn btn-xl btn-pink float-end" data-bs-toggle="modal" data-bs-target="#taskModal">
        <i class="bi bi-plus-square-dotted p-2"></i> New Task
    </button>

    <!-- Modal Create Task-->
    <div wire:ignore.self class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="newTaskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form wire:submit.prevent="storeTask()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newTaskModalLabel">Assign new task</h5>
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
                                <textarea wire:model="message" class="form-control form-control-textarea" placeholder="Leave a comment here"
                                    id="message" style="height: 175px" required></textarea>
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
                            <span wire:loading wire:target="storeTask" class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endhasrole
</div>
