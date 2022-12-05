<div class="modal fade" id="editmodal{{ $item->id }}" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update', $item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" placehol-der="nama" name="nama" class="form-control"
                        value="{{ $item->nama }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>