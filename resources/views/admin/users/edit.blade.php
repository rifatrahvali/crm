@extends('admin.AdminDashboard')
@section('admin')

<div class="card w-100 h-100">
    <div class="card-header">
        <h5 class="card-title mb-0">Kullanıcı Bilgilerini Güncelle</h5>
    </div>

    <div class="card-body">
        @include('_message')
        <form class="row g-3" method="POST" action="{{ url('admin/users/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-4">
                <label for="inputName" class="form-label">Ad <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $getRecord->name }}" required>
                <span style="color:red;">{{ $errors->first('name') }}</span>
            </div>
            <div class="col-md-4">
                <label for="inputUsername" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="inputUsername" name="username"
                    value="{{ $getRecord->username }}">
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">E-posta <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $getRecord->email }}"
                    readonly>
                <span style="color:red;">{{ $errors->first('email') }}</span>
            </div>
            <div class="col-md-4">
                <label for="photo" class="form-label">Fotoğraf</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="col-md-4">
                <label for="phone" class="form-label">Telefon <span style="color: red;">*</span></label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $getRecord->phone }}" required>
                <span style="color:red;">{{ $errors->first('phone') }}</span>
            </div>
            <div class="col-md-2">
                <label for="role" class="form-label">Yetki <span style="color: red;">*</span></label>
                <select class="form-select" id="role" name="role" required>
                    <option value="">Seçiniz</option>
                    <option {{ ($getRecord->role == 'admin' ? 'selected' : '') }} value="admin">Admin</option>
                    <option {{ ($getRecord->role == 'agent' ? 'selected' : '') }} value="agent">Danışman</option>
                    <option {{ ($getRecord->role == 'user' ? 'selected' : '') }} value="user">Kullanıcı</option>
                </select>
                {{ $errors->first('role') }}
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Durum <span style="color: red;">*</span></label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Seçiniz</option>
                    <option {{ ($getRecord->status == 'active' ? 'selected' : '') }} value="active">Aktif</option>
                    <option {{ ($getRecord->status == 'inactive' ? 'selected' : '') }} value="inactive">Pasif</option>
                </select>
                {{ $errors->first('status') }}
            </div>
            <div class="col-md-3">
                <label for="inputGithub" class="form-label">GitHub</label>
                <input type="text" class="form-control" id="github_info" name="github_info"
                    value="{{ $getRecord->github_info }}">
            </div>
            <div class="col-md-3">
                <label for="inputX" class="form-label">X (Twitter)</label>
                <input type="text" class="form-control" id="x_info" name="x_info" value="{{ $getRecord->x_info }}">
            </div>
            <div class="col-md-3">
                <label for="inputLinkedin" class="form-label">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin_info" name="linkedin_info"
                    value="{{ $getRecord->linkedin_info }}">
            </div>
            <div class="col-md-3">
                <label for="inputWebsite" class="form-label">Web Sitesi</label>
                <input type="url" class="form-control" id="website" name="website" value="{{ $getRecord->website }}">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Adres</label>
                <textarea class="form-control" id="address" name="address" rows="5">{{ $getRecord->address }}</textarea>
            </div>
            <div class="col-12">
                <label for="inputAbout" class="form-label">Hakkında</label>
                <textarea class="form-control" id="inputAbout" name="about" rows="5">{{ $getRecord->about }}</textarea>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Güncelle</button>
                <a href="{{ url('admin/users') }}" class="btn btn-secondary">Kullanıcı Listesine Geri Dön</a>
            </div>

        </form>
    </div>

</div>
@endsection