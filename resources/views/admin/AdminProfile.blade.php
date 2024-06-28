@extends('admin.AdminDashboard')

@section('admin')

<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="col-md-4 col-xl-3 left-wrapper">
            <div class="card">
                <img class="card-img-top"
                    src="{{ !empty($getRecord->photo) ? url('upload/' . $getRecord->photo) : url('upload/no-profile.png') }}">
                <div class="card-body">
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">İsim Soyisim</label>
                        <p class="text-muted">{{ $getRecord->name }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Hakkımda</label>
                        <p class="text-muted">{{ $getRecord->about }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Yetki</label>
                        <p class="text-muted">{{ $getRecord->role }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Katıldığı Tarih</label>
                        <p class="text-muted">{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Adres</label>
                        <p class="text-muted">{{ $getRecord->address }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                        <p class="text-muted">{{ $getRecord->email }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefon</label>
                        <p class="text-muted">{{ $getRecord->phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Web Site</label>

                        <p class="text-muted">
                            <a href="{{ $getRecord->website }}">
                                {{ $getRecord->website }}
                            </a>

                        </p>
                    </div>
                    <div class="mt-3 d-flex social-links">
                        <a href="{{ $getRecord->github_info }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="{{ $getRecord->x_info }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="{{ $getRecord->linkedin_info }}" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->

        
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-9 middle-wrapper">
            @include('_message')
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Profile Güncelleme</h6>
                        <form class="forms-sample" method="post" action="{{ url('admin/profile/update') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row mb-3">
                                <label for="name" class="col-sm-3 col-form-label">İsim &
                                    Soyisim</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="İsim Soyisim" value="{{ $getRecord->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Kullanıcı Adı" value="{{ $getRecord->username }}">
                                    @error('username')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ $getRecord->email }}">
                                    @error('email')
                                    <span style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-3 col-form-label">Telefon Numarası</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="phone" name="phone"
                                        placeholder="Telefon Numarası" value="{{ $getRecord->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-3 col-form-label">Adres Bilgisi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Adres Bilgisi" value="{{ $getRecord->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Parola</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="(Boş Bırakırsanız Değişmeyecektir.)">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="about" class="col-sm-3 col-form-label">Hakkımda</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="about" id="about"
                                        rows="3">{{ $getRecord->about }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="github_info" class="col-sm-3 col-form-label">Github</label>
                                <div class="col-sm-9">
                                    <input type="text" name="github_info" class="form-control" id="github_info"
                                        value="{{ $getRecord->github_info }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="x_info" class="col-sm-3 col-form-label">Twitter |
                                    X</label>
                                <div class="col-sm-9">
                                    <input type="text" name="x_info" class="form-control" id="x_info"
                                        value="{{ $getRecord->x_info }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="linkedin_info" class="col-sm-3 col-form-label">LinkedIn</label>
                                <div class="col-sm-9">
                                    <input type="text" name="linkedin_info" class="form-control" id="linkedin_info"
                                        value="{{ $getRecord->linkedin_info }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="website" class="col-sm-3 col-form-label">Web Site</label>
                                <div class="col-sm-9">
                                    <input type="text" name="website" class="form-control" id="website"
                                        value="{{ $getRecord->website }}">
                                </div>
                            </div>
                            <div class=" row mb-3">
                                <label class="col-sm-3 col-form-label" for="photo">Görsel</label>
                                <div class="col-sm-9">
                                    <input name="photo" class="form-control" type="file" id="photo">
                                </div>
                            </div>
                            @if (!empty($getRecord->photo))
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <img class="card-img-top" style="width:128px;"
                                        src="{{ !empty($getRecord->photo) ? url('upload/' . $getRecord->photo) : url('upload/no-profile.png') }}">
                                </div>
                            </div>
                            @endif


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