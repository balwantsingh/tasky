@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    {{-- <div class="toast-container position-absolute p-3" id="toastPlacement">
        <div class="toast">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
            </div>
            <div class="toast-body">
                Task Updated Successfully
            </div>
        </div>
    </div> --}}