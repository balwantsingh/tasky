<div>
    <div class="col-sm-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @forelse($status as $status)
                <li class="nav-item" role="presentation">
                    <a wire:click.prevent="taskStatus('{{ $status->name }}')" 
                        class="nav-link {{ ($tabToggleName === $status->name) ? 'active' : '' }}" 
                        id="home-tab" 
                        href="#"
                        data-bs-toggle="tab"
                        role="tab" 
                        aria-controls="home" 
                        aria-selected="true">{{ $status->name }}
                        @hasrole('admin')
                        <span class="badge bg-pink rounded-pill">{{ count($status->tasks) }}</span>
                        @endhasrole
                    </a>
                </li>
            @empty
            @endforelse
            @hasrole('admin')
            <li class="nav-item" role="presentation">
                <a wire:click="trashTask" class="nav-link {{ ($tabToggleName === 'trashed') ? 'active' : '' }}" 
                    id="trashedTask" href="#">Trashed
                    <span class="badge bg-pink rounded-pill">{{ $countTrashedTask }}</span>
                </a>
            </li>
            @endhasrole
        </ul>
        <div wire:poll class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" 
                id="main-tasktab-id" 
                role="tabpanel" 
                aria-labelledby="home-tab">
                <div class="card table-responsive">
                    <div class="card-body p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Assign to</th>
                                    <th scope="col">Task Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Assign date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($taskLists as $task)
                                    <tr>
                                        <td>
                                            <img class="profile-xs float-sm-start border" src="{{ $task->assignTo->userProfile() }}">
                                            {{ $task->assignTo->name }}
                                        </td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->message }}</td>
                                        <td>{{ $task->department->name }}</td>
                                        <td>
                                            {{ $task->created_at->calendar().' '.$task->created_at->isoFormat('Do Y') }}
                                        </td>
                                        <td>{{ $task->status->name }}</td>
                                        <td>{{ $task->deadline->name }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="10">No Tasks Available</td></tr>                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
