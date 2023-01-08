<form action="{{ url('perindag/setting') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card-body p-4">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Name Dinas</label>
                <input type="text" class="form-control @error('name_web') is-invalid @enderror" name="name_web"
                    value="{{ old('name_web', $setting->name_website) }}">
                @error('name_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>URL Website</label>
                <input type="text" class="form-control @error('url_web') is-invalid @enderror" name="url_web"
                    value="{{ old('url_web', $setting->url_website) }}">
                @error('url_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Phone Dinas</label>
                <input type="text" class="form-control @error('phone_web') is-invalid @enderror" name="phone_web"
                    value="{{ old('phone_web', $setting->phone_website) }}">
                @error('phone_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Email Dinas</label>
                <input type="email" class="form-control @error('email_web') is-invalid @enderror" name="email_web"
                    value="{{ old('email_web', $setting->email_website) }}">
                @error('email_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Youte Dinas</label>
                <input type="text" class="form-control @error('yt_web') is-invalid @enderror" name="yt_web"
                    value="{{ old('yt_web', $setting->youtube_website) }}">
                @error('yt_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Twitter Dinas</label>
                <input type="text" class="form-control @error('tw_web') is-invalid @enderror" name="tw_web"
                    value="{{ old('tw_web', $setting->twitter_website) }}">
                @error('tw_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Logo Dinas</label>
                <input type="file" class="form-control @error('logo_web') is-invalid @enderror" name="logo_web"
                    onchange="previewLogo()" id="loadLogo">
                @error('logo_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label>Background Website</label>
                <input type="file" class="form-control @error('bg_web') is-invalid @enderror" name="bg_web"
                    onchange="previewBg()" id="loadBg">
                @error('bg_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        @if ($setting->id)
            <div class="row mb-3">
                <div class="col-md-6">
                    <img src="{{ asset('image/logo/' . $setting->logo) }}" alt="" class="rounded-3"
                        width="300px" height="200px" id="loadImg">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('image/background/' . $setting->background) }}" alt="" class="rounded-3"
                        width="300px" height="200px" id="loadImgBg">
                </div>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-md-4">
                <label>Wa Dinas</label>
                <input type="text" class="form-control @error('wa_web') is-invalid @enderror" name="wa_web"
                    value="{{ old('wa_web', $setting->wa_website) }}">
                @error('wa_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label>Facebook Dinas</label>
                <input type="text" class="form-control @error('fb_web') is-invalid @enderror" name="fb_web"
                    value="{{ old('fb_web', $setting->fb_website) }}">
                @error('fb_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label>Instagram Dinas</label>
                <input type="text" class="form-control @error('ig_web') is-invalid @enderror" name="ig_web"
                    value="{{ old('ig_web', $setting->ig_website) }}">
                @error('ig_web')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label>Alamat Dinas</label>
                <textarea name="alamat" rows="4" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $setting->address_website) }}</textarea>
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
