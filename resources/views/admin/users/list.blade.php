@extends('admin.AdminDashboard')
@section('admin')

<div class="row">
    <div class="col-12 col-xl-12 mb-2">
        <div class="row d-flex flex-grow justify-content-center">
            <!-- Her bir düğme ve badge içeren div -->

            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-secondary">
                    Admin Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalAdmin }}</span>
                </button>
            </div>
            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-success">
                    Danışman Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalAgent }}</span>
                </button>
            </div>
            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-info">
                    Yetkisiz Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalUser }}</span>
                </button>
            </div>
            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-primary">
                    Yetkisiz Aktif Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalUserActive }}</span>
                </button>
            </div>
            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-danger">
                    Aktif Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalActive }}</span>
                </button>
            </div>
            <div class="col-auto custom-btn">
                <button type="button" class="btn btn-warning">
                    Pasif Kullanıcılar <span class="badge bg-light text-dark">{{ $TotalInactive }}</span>
                </button>
            </div>
        </div>
    </div>

</div>

{{-- Gelişmiş Filtre --}}
<div class="accordion col-lg-12" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Genişmiş Arama
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" name="id" id="id" class="form-control" value="{{ request('id') }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">İsim</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ request('name') }}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <label for="username" class="form-label">Kullanıcı adı</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    value="{{ request('username') }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ request('email') }}">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ request('phone') }}">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="role" class="form-label">Yetki</label>
                                <select class="form-select form-control" name="role" id="role">
                                    <option value="">Yetki Seç</option>
                                    <option value="admin">Admin</option>
                                    <option value="agent">Danışman</option>
                                    <option value="user">Kullanıcı</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="status" class="form-label">Durum</label>
                                <select class="form-select form-control" name="status" id="status">
                                    <option value="active">Durum Seç</option>
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Pasif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" id="website" class="form-control"
                                    value="{{ request('') }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="startdate" class="form-label">Başlangıç Tarihi</label>
                                <input type="date" name="startdate" id="startdate" class="form-control"
                                    value="{{ request('startdate') }}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="mb-3">
                                <label for="enddate" class="form-label">Bitiş Tarihi</label>
                                <input type="date" name="enddate" id="enddate" class="form-control"
                                    value="{{ request('enddate') }}">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Ara</button>
                    <a href="{{ url('admin/users/list') }}" class="btn btn-danger">Sıfırla</a>
                </form>
            </div>
        </div>
    </div>

</div>

{{-- Tablo ve Filtre --}}
<div class="row mt-2">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Kullanıcı Listesi</h4>
                                <div class="d-flex">
                                    <input type="text" name="genel" id="genel" class="form-control me-2"
                                        placeholder="Kullanıcı tablosu arama">
                                    <button type="submit" class="btn btn-primary me-2">Ara</button>
                                    <a href="{{ url('admin/users/list') }}" class="btn btn-danger">Sıfırla</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Profil</th>
                                <th>İsim Soyisim</th>
                                <th>Kullanıcı Adı</th>
                                <th>Email</th>
                                <th>Telefon</th>
                                <th>Adres</th>
                                <th>Website</th>
                                <th>Github</th>
                                <th>X</th>
                                <th>LinkedIn</th>
                                <th>Yetkisi</th>
                                <th>Durum</th>
                                <th>Kayıt Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($getRecord as $value)
                            <tr class="table">
                                <td>{{ $value->id }}</td>
                                <td>
                                    @if (!empty($value->photo))
                                    <img style="width: 100; height:100;" src="{{ asset('upload/'.$value->photo) }}
                                        ">
                                    @elseif (empty($value->photo))
                                    <img style="width: 100; height:100;" src=" {{ $value->photo ?
                                    url('upload/' . $value->photo) : url('upload/no-profile.png') }}
                                    ">
                                    @endif
                                </td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->phone }}</td>
                                <td>{{ $value->address }}</td>
                                <td>{{ $value->website }}</td>
                                <td>{{ $value->github_info }}</td>
                                <td>{{ $value->x_info }}</td>
                                <td>{{ $value->linkedin_info }}</td>
                                <td>
                                    @if ($value->role == 'admin')
                                    <span class="badge bg-primary">Admin</span>
                                    @elseif ($value->role == 'agent')
                                    <span class="badge bg-info">Danışman</span>
                                    @elseif ($value->role == 'user')
                                    <span class="badge bg-warning">Kullanıcı</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($value->status == 'active')
                                    <span class="badge bg-success">Aktif</span>
                                    @elseif ($value->status == 'inactive')
                                    <span class="badge bg-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                                <td>
                                    <a href="{{ url('admin/users/view/'.$value->id) }}"><span
                                            class="btn btn-info">Görüntüle</span></a>
                                    <a href="{{ url('admin/users/edit/'.$value->id) }}"><span
                                            class="btn btn-info">Düzenle</span></a>
                                    <a href="{{ url('admin/users/delete/'.$value->id) }}"
                                        onclick="return confirm('Silmek istediğinizden emin misiniz ?')"><span
                                            class="btn btn-warning">Sil</span></a>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">Kayıt bulunamadı.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>


                </div>
                <div class="pag mt-3" style="float: right">
                    {{-- PAGINATION KOMUTU--}}
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection