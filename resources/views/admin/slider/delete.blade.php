<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="delete-form" action="{{ route('admin.slider.delete', 0) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    
                    <h4>{{ __('Are you sure you want to delete this slider?') }}</h4>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }} <i
                            class="fs-4 bi-trash"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
