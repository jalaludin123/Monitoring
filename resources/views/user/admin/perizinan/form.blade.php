<form action="{{ $perizinan->id ? url('perindag/perizinan/' . $perizinan->id) : url('perindag/perizinan') }}"
    method="post" enctype="multipart/form-data">
    @csrf
    @if ($perizinan->id)
        @method('PUT')
    @endif
    <div class="card-body p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Perusahaan</label>
                <input type="text" name="name_perusahaan"
                    value="{{ old('name_perusahaan', $perizinan->id ? $perizinan->name_perusahan : '') }}"
                    class="form-control @error('name_perusahaan') is-invalid @enderror">
                @error('name_perusahaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Nama Penanggung Jawab</label>
                <input type="text" value="{{ old('name', $perizinan->id ? $perizinan->name_penangungJawab : '') }}"
                    name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pengawas Kegiatan</label>
                <select name="pengawas" class="form-select @error('pengawas') is-invalid @enderror">
                    <option value="{{ $perizinan->id ? $perizinan->user_id : '' }}">
                        {{ $perizinan->id ? $perizinan->user->name : '--Pilih Pengawas Kegiatan--' }}
                    </option>
                    @foreach ($pengawass as $pengawas)
                        @if ($pengawas->role == 2)
                            <option value="{{ $pengawas->id }}">{{ $pengawas->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('pengawas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Sektor</label>
                <input type="text" name="sektor" value="{{ $perizinan->id ? $perizinan->sektor : 'Perindutrian' }}"
                    readonly class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $perizinan->id ? $perizinan->email_perusahan : '') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $perizinan->id ? $perizinan->phone_perusahan : '') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Skala Usaha</label>
                <select name="skala_usaha" class="form-select @error('skala_usaha') is-invalid @enderror">
                    <option value="{{ $perizinan->id ? $perizinan->skala_usaha : '' }}">
                        {{ $perizinan->id ? $perizinan->skala_usaha : '--Pilih Skala Usaha--' }}</option>
                    <option value="UMK">UMK</option>
                    <option value="Non UMK">Non UMK</option>
                </select>
                @error('skala_usaha')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Badan Usaha</label>
                <input type="text" name="badan_usaha" class="form-control @error('badan_usaha') is-invalid @enderror"
                    value="{{ old('badan_usaha', $perizinan->id ? $perizinan->badan_usaha : '') }}">
                @error('badan_usaha')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>NIB</label>
                <input type="text" name="nib" class="form-control @error('nib') is-invalid @enderror"
                    value="{{ old('nib', $perizinan->id ? $perizinan->nib : '') }}">
                @error('nib')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>KBLI Golongan V</label>
                <input type="text" name="kbli" class="form-control @error('kbli') is-invalid @enderror"
                    value="{{ old('kbli', $perizinan->id ? $perizinan->kbli : '') }}">
                @error('kbli')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>File Perizinan</label>
                <input type="file" name="file_perizinan"
                    class="form-control @error('file_perizinan') is-invalid @enderror">
                @error('file_perizinan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Status Perizinan</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status"
                        {{ $perizinan->status_perizinan == '1' ? 'checked' : '' }} id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Terverifikasi
                    </label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Kota</label>
                <select name="kota" class="form-select @error('kota') is-invalid @enderror" id="kota">
                    <option value="{{ $perizinan->id ? $perizinan->getKecamatan->kota->city_id : '' }}">
                        {{ $perizinan->id ? $perizinan->getKecamatan->kota->city_name : '--Pilih Kota--' }}
                    </option>
                    @foreach ($kotas as $kota)
                        <option value="{{ $kota->city_id }}">{{ $kota->city_name }}</option>
                    @endforeach
                </select>
                @error('kota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label>Kecamatan</label>
                <select name="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror" id="kecamatan">
                    <option value="{{ $perizinan->id ? $perizinan->kecamatan : '' }}">
                        {{ $perizinan->id ? $perizinan->getKecamatan->dis_name : '--Pilih Kecamatan--' }}
                    </option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label>Kelurahan</label>
                <select name="kelurahan" class="form-select @error('kelurahan') is-invalid @enderror" id="kelurahan">
                    <option value="{{ $perizinan->id ? $perizinan->kelurahan : '' }}">
                        {{ $perizinan->id ? $perizinan->getKelurahan->subdis_name : '--Pilih Kelurahan--' }}</option>
                </select>
                @error('kelurahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label>Alamat</label>
                <textarea name="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $perizinan->id ? $perizinan->alamat_perusahan : '') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-outline-primary" type="submit"><i class="bi bi-save me-2"></i>Save</button>
    </div>
</form>
