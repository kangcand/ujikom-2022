<div class="modal fade articleTag-show-{{ $tag->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Article Tag </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tag Name</label>
                    <input type="text" class="form-control" value="{{ $tag->name }}" name="name" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
</div>
