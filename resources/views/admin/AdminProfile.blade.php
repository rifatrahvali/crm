@extends('admin.AdminDashboard')

@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="col-md-4 col-xl-3 left-wrapper">
            <div class="card">
                <img class="card-img-top"
                    src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/image.png') }}">
                <div class="card-body">
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">İsim Soyisim</label>
                        <p class="text-muted">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Yetki</label>
                        <p class="text-muted">{{ Auth::user()->role }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Katıldığı Tarih</label>
                        <p class="text-muted">{{ Auth::user()->email_verified_at }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Adres</label>
                        <p class="text-muted">{{ Auth::user()->address }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefon</label>
                        <p class="text-muted">{{ Auth::user()->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Web Site</label>

                        <p class="text-muted">{{ Auth::user()->phone }}</p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="www.google.com" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-9 middle-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Profile Güncelleme</h6>
                        <form class="forms-sample" method="post" action="">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">İsim &
                                    Soyisim</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="İsim Soyisim" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Kullanıcı Adı" value="{{ Auth::user()->username }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Telefon Numarası</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Telefon Numarası" value="{{ Auth::user()->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Adres Bilgisi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Adres Bilgisi" value="{{ Auth::user()->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="role" class="col-sm-3 col-form-label">Yetki
                                    Bilgisi</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="role" name="role">
                                        <option selected disabled>Yetki Seçiniz</option>
                                        <option>Admin</option>
                                        <option>Agent</option>
                                        <option>Kullanıcı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Durum
                                    Bilgisi</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="status" name="status">
                                        <option selected disabled>Durum Seçiniz</option>
                                        <option>Aktif</option>
                                        <option>Pasif</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="about" class="col-sm-3 col-form-label">Hakkımda</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="github_info" class="col-sm-3 col-form-label">Github</label>
                                <div class="col-sm-9">
                                    <input type="text" name="github_info" class="form-control" id="github_info">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="x_info" class="col-sm-3 col-form-label">Twitter |
                                    X</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_info" class="form-control" id="x_info" name="x_info">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="linkedin_info" class="col-sm-3 col-form-label">LinkedIn</label>
                                <div class="col-sm-9">
                                    <input type="text" name="linkedin_info" class="form-control" id="linkedin_info" name="linkedin_info">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="photo" >Görsel</label>
                                <div class="col-sm-9">
                                    <input name="photo" class="form-control" type="file" id="photo">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <img class="card-img-top" style="width:128px;"
                                        src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/image.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- middle wrapper end -->
        <!-- right wrapper start -->
    </div>
</div>
@endsection