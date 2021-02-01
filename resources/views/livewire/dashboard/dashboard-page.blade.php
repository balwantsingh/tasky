<div wire:poll>
    <div class="row">
        <div class="col-md-2">
            @hasrole('admin')
                <div class="col-12 d-grid mb-3">
                    <livewire:task.task-crud />
                </div>
            @endhasrole
            <div class="list-group">
                <a href="{{ route('list.tasks') }}"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3"
                    aria-current="true">
                    Lists Task
                </a>
            </div>
        </div>
        <div class="col-md-10 overflow">
            <livewire:dashboard.kanban />
        </div>
    </div>
</div>
