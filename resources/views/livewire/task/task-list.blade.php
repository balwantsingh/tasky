@extends('layouts.app')
@section('title', 'Tasks: Lists')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fs-3 fw-bold mb-3 float-start">Statistics</div>
        <div class="col-md-6 mb-3">
            {{-- <button type="button" class="btn btn-xl btn-pink float-end"
                data-bs-toggle="modal" data-bs-target="#new-task"><i class="bi bi-plus-square-dotted p-2"></i> New
                Task
            </button> --}}
            <livewire:task.task-crud />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#today" role="tab"
                        aria-controls="home" aria-selected="true">Today <span
                            class="badge bg-pink rounded-pill">5</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#completed" role="tab"
                        aria-controls="profile" aria-selected="false">Completed <span
                            class="badge bg-pink rounded-pill">2</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#pending" role="tab"
                        aria-controls="contact" aria-selected="false">Pending <span
                            class="badge bg-pink rounded-pill">5</span></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#deleted" role="tab"
                        aria-controls="contact" aria-selected="false">Deleted <span
                            class="badge bg-pink rounded-pill">5</span></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Assign to</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Task desc.</th>
                                        <th scope="col">Assign date</th>
                                        <th scope="col">Deadline</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            b
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card">
                        <div class="card-body">
                            c
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="deleted" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="card">
                        <div class="card-body">
                            d
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
