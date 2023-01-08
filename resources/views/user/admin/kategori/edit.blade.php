<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ url('perindag/kategori-informasi/ubah/' . $kategori->id) }}" method="post" id="formUpdate">
        @csrf
        <div class="modal-body">
            <label>Name Kategori</label>
            <input type="text" class="form-control" name="kategori_informasi"
                value="{{ $kategori->kategori_informasi }}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" onclick="ubah({{ $kategori->id }})">Save changes</button>
        </div>
    </form>
</div>
