@extends('admin.AdminDashboard')
@section('admin')

{{-- <div class="card-body">

    <h6 class="card-title">Horizontal Form</h6>

    <form class="forms-sample">
        <div class="row mb-3">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
            </div>
        </div>
        <div class="row mb-3">
            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off"
                    placeholder="Password">
            </div>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">
                Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-secondary">Cancel</button>
    </form>

</div> --}}
<div class="card w-100 h-100">
    <div class="card-header">
        <h5 class="card-title mb-0">Yeni Kullanıcı Ekle</h5>
    </div>

    <div class="card-body">
        @include('_message')
        <form class="row g-3" method="POST" action="{{ url('admin/users/add') }}">
            {{ csrf_field() }}
            <div class="col-md-4">
                <label for="inputName" class="form-label">Ad <span style="color: red;">*</span></label>
                <input type="text" class="form-control" id="name" name="name" required>
                <span style="color:red;">{{ $errors->first('name') }}</span>
            </div>
            <div class="col-md-4">
                <label for="inputUsername" class="form-label">Kullanıcı Adı</label>
                <input type="text" class="form-control" id="inputUsername" name="username">
            </div>
            <div class="col-md-4">
                <label for="inputEmail" class="form-label">E-posta <span style="color: red;">*</span></label>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
                <span style="color:red;">{{ $errors->first('email') }}</span>
            </div>
            <div class="col-md-4">
                <label for="inputPhoto" class="form-label">Fotoğraf</label>
                <input type="file" class="form-control" id="inputPhoto" name="photo">
            </div>
            <div class="col-md-4">
                <label for="inputPhone" class="form-label">Telefon <span style="color: red;">*</span></label>
                <input type="tel" class="form-control" id="inputPhone" name="phone" required>
                <span style="color:red;">{{ $errors->first('phone') }}</span>
            </div>
            <div class="col-md-2">
                <label for="inputRole" class="form-label">Rol <span style="color: red;">*</span></label>
                <select class="form-select" id="role" name="role" required>
                    <option value="">Seçiniz</option>
                    <option value="admin">Admin</option>
                    <option value="agent">Danışman</option>
                    <option value="user">Kullanıcı</option>
                </select>
                {{ $errors->first('role') }}
            </div>
            <div class="col-md-2">
                <label for="inputStatus" class="form-label">Durum <span style="color: red;">*</span></label>
                <select class="form-select" id="status" name="status" required>
                    <option value="">Seçiniz</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Pasif</option>
                </select>
                {{ $errors->first('status') }}
            </div>
            <div class="col-md-3">
                <label for="inputGithub" class="form-label">GitHub</label>
                <input type="text" class="form-control" id="github_info" name="github_info">
            </div>
            <div class="col-md-3">
                <label for="inputX" class="form-label">X (Twitter)</label>
                <input type="text" class="form-control" id="x_info" name="x_info">
            </div>
            <div class="col-md-3">
                <label for="inputLinkedin" class="form-label">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin_info" name="linkedin_info">
            </div>
            <div class="col-md-3">
                <label for="inputWebsite" class="form-label">Web Sitesi</label>
                <input type="url" class="form-control" id="website" name="website">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Adres</label>
                <textarea class="form-control" id="address" name="address" rows="5"></textarea>
            </div>
            <div class="col-12">
                <label for="inputAbout" class="form-label">Hakkında</label>
                <textarea class="form-control" id="inputAbout" name="about" rows="5"></textarea>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Kaydet</button>
                <a href="{{ url('admin/users') }}" class="btn btn-secondary">Kullanıcı Listesine Geri Dön</a>
            </div>

        </form>
    </div>

</div>
@endsection