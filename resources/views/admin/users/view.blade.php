@extends('admin.AdminDashboard')
@section('admin')


<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Kullanıcılar</a></li>
        <li class="breadcrumb-item"><a href="#">Kullanıcı Listesi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kullanıcı Detayı</li>
    </ol>
</nav>

<div class="card mb-3 shadow-lg border-0">
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
        <h2 class="card-title mb-0">Kullanıcı Profili</h2>
        <a href="{{ url('admin/users') }}" class="btn btn-sm btn-danger"><i data-feather="corner-up-left"
                class="me-2"></i>Kullanıcı Listesine Dön</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ $getRecord->photo ? url('upload/' . $getRecord->photo) : url('upload/no-profile.png') }}"
                    class="img-fluid rounded-circle shadow-lg mb-3" alt="Profile Photo" width="180" height="180">
                <h2>{{ $getRecord->username }}</h2>
                <h3>{{ $getRecord->role == 'admin' ? 'Yönetici' : ($getRecord->role == 'agent' ? 'Danışman' :
                    'Kullanıcı') }}</h3>
                <p class="fst-italic py-2">{{ $getRecord->about }}</p>
            </div>
            <div class="col-lg-8 py-4">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="mail" class="text-primary me-2"></i>
                            <strong>Email:</strong>
                            <p class="mb-0">{{ $getRecord->email }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="phone" class="text-primary me-2"></i>
                            <strong>Telefon:</strong>
                            <p class="mb-0">{{ $getRecord->phone }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="map-pin" class="text-primary me-2"></i>
                            <strong>Adres:</strong>
                            <p class="mb-0">{{ $getRecord->address }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="globe" class="text-primary me-2"></i>
                            <strong>Website:</strong>
                            <p class="mb-0">{{ $getRecord->website }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="command" class="text-primary me-2"></i>
                            <strong>Rol:</strong>
                            <span
                                class="badge bg-{{ $getRecord->role == 'admin' ? 'primary' : ($getRecord->role == 'agent' ? 'info' : 'warning') }}">
                                {{ $getRecord->role }}
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-light p-3 rounded">
                            <i data-feather="sliders" class="text-primary me-2"></i>
                            <strong>Durum:</strong>
                            <span class="badge bg-{{ $getRecord->status == 'active' ? 'success' : 'danger' }}">
                                {{ $getRecord->status == 'active' ? 'Aktif' : 'Pasif' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted text-center">
        <div class="social-links d-flex gap-2 justify-content-center">
            <a href="{{ $getRecord->github_info }}" class="btn btn-sm btn-outline-dark">
                <i data-feather="github" class="me-2"></i>Github
            </a>
            <a href="{{ $getRecord->x_info }}" class="btn btn-sm btn-outline-info">
                <i data-feather="x" class="me-2"></i>Twitter
            </a>
            <a href="{{ $getRecord->linkedin_info }}" class="btn btn-sm btn-outline-primary">
                <i data-feather="linkedin" class="me-2"></i>LinkedIn
            </a>
            <a href="{{ $getRecord->website }}" class="btn btn-sm btn-outline-secondary">
                <i data-feather="globe" class="me-2"></i>Website
            </a>
        </div>
    </div>
</div>

@endsection