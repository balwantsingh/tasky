@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <div class="col-12 d-grid mb-3">
                <livewire:task.task-crud />
            </div>
            <div class="list-group">
                <a href="lists.html"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3"
                    aria-current="true">
                    Today <span class="badge bg-secondary rounded-pill align-self-end">15</span>
                </a>
                <a href="lists.html"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    Pending <span class="badge bg-secondary rounded-pill">45</span>
                </a>
                <a href="lists.html"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    Completed <span class="badge bg-secondary rounded-pill">1.1k</span>
                </a>
                <a href="lists.html"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                    Deleted <span class="badge bg-secondary rounded-pill">15</span>
                </a>
            </div>
        </div>
        <div class="col-md-10 overflow">
            <div class="row">
                @foreach($taskKanban as $status)
                    <div class="col-md-4">
                        <div class="card rounded-pill bg-gradient">
                            <div class="card-body">
                                <span class="fs-5 fw-bold p-2">{{ $status->name }}</span><span
                                    class="badge position-absolute top-50 end-0 translate-middle bg-pink rounded-pill p-2">{{ $status->tasks_count }}</span>
                            </div>
                        </div>
                        @foreach($status->tasks as $task)
                            <div class="card br-10 m-2">
                                <div class="card-body">
                                    {{-- <img class="profile-xl float-sm-end border" src="img/profile4.jpg"> --}}
                                    <h5 class="text-black m-0 fs-6 fw-bold"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-task">{{ $task->user->name }}</a></h5>
                                    <p class="text-dark-gray m-0 fst-italic">{{ $task->department->name }}</p>
                                    <p class="text-gray m-0 w-90">{{ $task->name }}<a href="#"
                                            class="gray"><i class="bi bi-paperclip p-1 gray"></i></a></p>
                                    <span class="text-pink mt-1 float-start">{{ $task->created_at->calendar().' '.$task->created_at->isoFormat('Do Y') }}</span>
                                    {{-- <span class="m-3 text-pink"><i class="bi bi-clock-history"></i> 24:00:00<span> --}}
                                    <div class="float-end">
                                        <a href="#" class="gray"><i class="bi bi-trash p-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
