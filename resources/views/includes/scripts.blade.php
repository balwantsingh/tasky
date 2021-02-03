<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
<script src="{{ asset('js/alpineJs.js') }}" defer></script>
<script>
    window.addEventListener('closeModal', event => {
        $("#add-deadline").modal('hide'); 
        $("#departmentModal").modal('hide'); 
        $("#new-user").modal('hide'); 
        $("#taskModal").modal('hide'); 
        $("#updateTaskModal").modal('hide'); 
    })
</script>
@stack('scripts')