<div class="modal fade users-show-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Article Category </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-sm btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
</div>
