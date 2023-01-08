<table class="table table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Name Kategori</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->kategori_informasi }}</td>
                <td>
                    <button class="btn btn-outline-warning" onclick="edit({{ $data->id }})"><i
                            class="bi bi-box-arrow-in-down-right"></i></button>
                    <button class="btn btn-outline-danger" onclick="hapus({{ $data->id }})"><i
                            class="bi bi-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@if ($datas->links())
    <div>
        {{ $datas->links() }}
    </div>
@endif
