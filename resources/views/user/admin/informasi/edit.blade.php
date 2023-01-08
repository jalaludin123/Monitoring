<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">{{ $title }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ url('perindag/informasi/ubah/' . $informasi->id) }}" method="post" enctype="multipart/form-data"
        id="formUpdate">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label>Name Kategori</label>
                <select name="kategori" class="form-select">
                    <option value="{{ $informasi->kategori_informasis_id }}">
                        {{ $informasi->kategori->kategori_informasi }}</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_informasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Nama Informasi</label>
                <input class="form-control" type="text" name="name" value="{{ $informasi->name_informasi }}">
            </div>
            <div class="mb-3">
                <label>Tentang</label>
                <input class="form-control" type="text" name="tentang" value="{{ $informasi->tentang }}">
            </div>
            <div class="mb-3">
                <label>File Informasi</label>
                <input type="file" name="file_informasi" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="submit" onclick="ubah({{ $informasi->id }})">Save changes</button>
        </div>
    </form>
</div>
