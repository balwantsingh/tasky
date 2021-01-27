@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            @hasrole('admin')
                <div class="col-12 d-grid mb-3">
                    <livewire:task.task-crud />
                </div>
            @endhasrole
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
            <livewire:dashboard.kanban />
        </div>
    </div>
</div>
@endsection
