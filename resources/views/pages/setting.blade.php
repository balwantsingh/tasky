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
            {{-- <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title float-start m-1">Department</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                        class="btn btn-sm btn-pink-outline float-end"><i class="bi bi-plus-square-dotted p-2"></i>
                        New department</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item profile-pic">
                        <p class="setting-label float-start">CRM</p>
                        <div class="">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="gray-icon-setting edit"><i class="bi bi-pencil-square p-2"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                class="gray-icon-setting trash"><i class="bi bi-trash p-2"></i></a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p class="setting-label">CMS</p>
                    </li>
                    <li class="list-group-item">
                        <p class="setting-label">Design</p>
                    </li>
                    <li class="list-group-item">
                        <p class="setting-label">Job Board</p>
                    </li>
                    <li class="list-group-item">
                        <p class="setting-label">ATS</p>
                    </li>
                </ul>
            </div> --}}
        </div>
        <div class="col-sm-4">
            {{-- <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title float-start m-1">User</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#new-user"
                        class="btn btn-sm btn-pink-outline float-end"><i class="bi bi-plus-square-dotted p-2"></i>
                        New user</a>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item profile-pic">
                        <img class="profile float-sm-start border m-2" src="img/profile.png">
                        <p class="setting-label float-start m-1">Sandeep Singh</p>
                        <div class="">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-user"
                                class="gray-icon-setting edit"><i class="bi bi-pencil-square p-2"></i></a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-user"
                                class="gray-icon-setting trash"><i class="bi bi-trash p-2"></i></a>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <img class="profile float-sm-start border m-2" src="img/profile2.png">
                        <p class="setting-label">Neeraj Tangriya</p>
                    </li>

                    <li class="list-group-item">
                        <img class="profile float-sm-start border m-2" src="img/profile3.jpeg">
                        <p class="setting-label">Balwant Singh</p>
                    </li>

                    <li class="list-group-item">
                        <img class="profile float-sm-start border m-2" src="img/profile4.jpg">
                        <p class="setting-label">Hema Chawla</p>
                    </li>

                    <li class="list-group-item">
                        <img class="profile float-sm-start border m-2" src="img/profile.png">
                        <p class="setting-label">Shambhu Patnaik</p>
                    </li>
                </ul>
            </div> --}}
        </div>
        <div class="col-sm-4">
            <livewire:task-deadline />
        </div>
    </div>
</div>

<!-- Modal Create department -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="d-grad form-floating mb-3">
                    <input type="text" class="form-control form-control-xl required focus" id="floatingInput"
                        placeholder="User name i.e. James">
                    <label for="floatingInput">i.e. Marketing</label>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-pink b-block">Create</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit department -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="d-grad form-floating mb-3">
                    <input type="text" class="form-control form-control-xl required focus" id="floatingInputValue"
                        placeholder="User name i.e. James" value="CRM">
                    <label for="floatingInputValue">Edit department</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-pink b-block">Update</button>
            </div>
        </div>
    </div>
</div 

<!-- Modal New User -->
<div class="modal fade" id="new-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <select class="form-select required" id="floatingSelect" aria-label="Floating label select example">
                        <option selected value="1">CRM</option>
                    </select>
                    <label for="floatingSelect">Select department</label>
                </div>


                <div class="form-floating mb-2">
                    <input type="text" class="form-control form-control-xl required" id="floatingInput"
                        placeholder="User name i.e. James ">
                    <label for="floatingInput">User name i.e. James</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control form-control-xl required" id="floatingInput"
                        placeholder="User name i.e. James ">
                    <label for="floatingInput">User email</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-pink b-block">Create</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Edit User -->
<div class="modal fade" id="edit-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <select class="form-select required" id="floatingSelect" aria-label="Floating label select example">
                        <option selected value="1">CRM</option>
                    </select>
                    <label for="floatingSelect">Select department</label>
                </div>


                <div class="form-floating mb-2">
                    <input type="text" class="form-control form-control-xl required" id="floatingInputValue"
                        placeholder="User name i.e. James" value="Sandeep Indana">
                    <label for="floatingInputValue">User name i.e. James</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control form-control-xl required" id="floatingInputValue"
                        placeholder="User name i.e. James" value="sandeepindana@gmail.com">
                    <label for="floatingInputValue">User email</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-lg btn-pink b-block">Update</button>
            </div>
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
