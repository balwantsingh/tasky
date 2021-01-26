@extends('layouts.app')

@section('title', 'Settings')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fs-3 fw-bold mb-3 float-start">Settings</div>
        <div class="col-md-6 mb-3">
            <livewire:task.task-crud />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <livewire:department />
        </div>
        <div class="col-sm-3">
            <livewire:add-user />
        </div>
        <div class="col-sm-3">
            <livewire:task-deadline />
        </div>
        <div class="col-sm-3">
            <livewire:status />
        </div>
    </div>
</div>
@endsection
