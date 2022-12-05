<div class="modal fade" id="editmodal{{ $item->id }}" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('menu.update',$item->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="text" placeholder="nama" name="nama" class="form-control mb-3" value="{{ $item->nama }}">
                    <input type="file" placeholder="foto" name="foto" class="form-control mb-3" value="{{ $item->foto }}">
                    <input type="number" placeholder="harga" name="harga" class="form-control mb-3" value="{{ $item->harga }}">
                    <select name="id_category" id="" class="form-control mb-3" >
                        <option value="{{ $item->category->id}}">{{ $item->category->nama }}</option>
                        <option >==pilih category== </option>
                        @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    <textarea name="keterangan" id="" cols="30" rows="10"> Keterangan</textarea>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
        </div>
    </div>
</div>