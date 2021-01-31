@extends('layouts.app')
@section('title', 'Tasks: Lists')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fs-3 fw-bold mb-3 float-start">Task lists</div>
        <div class="col-md-6 mb-3">
            <livewire:task.task-crud />
        </div>
    </div>

    <div class="row">
        <livewire:task.task-list />
    </div>
</div>
@endsection
