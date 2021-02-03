@extends('layouts.app')
@section('title', 'Dashboard')
@push('styles')
    <link href="{{ asset('css/dragula.css') }}" rel="stylesheet">
@endpush
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
                <a href="{{ route('list.tasks') }}"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3"
                    aria-current="true">
                    Table View
                </a>
            </div>
        </div>
        <div class="col-md-10 overflow">
            <livewire:dashboard.kanban />
        </div>
    </div>
</div>
@push('scripts')
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.3/dragula.min.js"></script> --}}
    <script src="{{ asset('js/dragula.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>


    <script type="text/javascript">
        window.onload = function () {
            var stageIdsArr = [];

            $(".dragContent").each(function () {
                // alert($(this).attr('id'));
                var stId = "#" + $(this).attr('id');
                stageIdsArr.push(document.querySelector(stId));

            });

            var dragulaCards = dragula(stageIdsArr);

            dragulaCards.on('drop', function (el, target, source, sibling) {
                taskDragDrop(el.id, target.id, source.id);
            });

            var dragulaKanban = dragula([
                document.querySelector('#kanban')
            ], {
                moves: function (el, container, handle) {
                    return handle.classList.contains('moveCard');
                }
            });
        }

    </script>
    <script>
        const taskKanbanApi =
            "{{ url('kanban/tasks/{task_id}/{status_id}/{from_id}') }}";
        //Drag and drop feature
        function taskDragDrop(task_id, status_id, from_id) {

            $.get(taskKanbanApi, {

                'task_id': task_id,

                'status_id': status_id,

                'from_id': from_id,

            }, function (result, status) {

                // alert(result);
                // $('.toast').toast('show');
                swal({
                    title: "Updated!",
                    text: `Task ${task_id} status updated!`,
                    icon: "success",
                });
                var res = eval("(" + result + ")");

            });

        }

    </script>
@endpush
@endsection
