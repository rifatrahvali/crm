@extends('admin.AdminDashboard')
@section('admin')


<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Kullanıcılar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Listesi</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-12 strech-card">
        <div class="card">
            <div class="card-header">
                Kullanıcı Ara
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kullanıcı Listesi</h4>
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
                            @foreach ($getRecord as $value)
                            <tr class="table">
                                <td>{{ $value->id }}</td>
                                <td>
                                    @if (!empty($value->photo))
                                    <img style="width: 100; height:100;" src="{{ asset('upload/'.$value->photo) }}
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
                                            class="btn btn-warning">Görüntüle</span></a>
                                </td>
                            </tr>
                            @endforeach
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