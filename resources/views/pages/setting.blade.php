@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fs-3 fw-bold mb-3 float-start">Settings</div>
        <div class="col-md-6 fs-3 fw-bold mb-3">
            <button type="button" class="btn btn-xl btn-pink float-end"
                data-bs-toggle="modal" data-bs-target="#new-task">
                <i class="bi bi-plus-square-dotted p-2"></i> New Task
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <livewire:department />
        </div>
        <div class="col-sm-4">
            <livewire:add-user />
        </div>
        <div class="col-sm-4">
            <livewire:task-deadline />
        </div>
    </div>
</div>

<!-- Modal Create Task-->
<div class="modal fade" id="new-task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <select class="form-select required" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected value="1">CRM</option>
                            <option value="2">CMS</option>
                            <option value="3">Design</option>
                            <option value="3">Job Board</option>
                            <option value="3">ATS</option>
                        </select>
                        <label for="floatingSelect">Select department</label>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="form-floating required">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected value="1">Sandeep Singh</option>
                            <option value="2">Balwant Singh</option>
                            <option value="3">Neeraj Tangriya</option>
                            <option value="3">Hema Chawla</option>
                            <option value="3">Shambhu Patnaik</option>
                        </select>
                        <label for="floatingSelect">Assing to:</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating required">
                        <textarea class="form-control form-control-textarea" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 175px"></textarea>
                        <label for="floatingTextarea2">Message</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-floating">
                        <select class="form-select required" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>None</option>
                            <option value="1">1 day</option>
                            <option value="2">2 days</option>
                            <option value="3">3 days</option>
                            <option value="3">1 week</option>
                            <option value="3">15 days</option>
                            <option value="3">1 month</option>
                        </select>
                        <label for="floatingSelect">Task deadline</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="upload-btn-wrapper">
                        <button class="upload"><i class="bi bi-paperclip"></i> Attachment</button>
                        <input type="file" name="myfile" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-pink b-block">Assign task</button>
            </div>
        </div>
    </div>
</div>
@endsection
