@extends('admin.AdminDashboard')

@section('admin')


<div class="row inbox-wrapper">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 border-end-lg">
                        <div class="aside-content">
                            <div class="d-flex align-items-center justify-content-between">
                                <button class="navbar-toggle btn btn-icon border d-block d-lg-none"
                                    data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                                    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg></span>
                                </button>
                                <div class="order-first">
                                    <h4>Mail Service</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="d-grid my-3">
                                <a class="btn btn-primary" href="{{ url('admin/email/compose') }}">Yeni Mail</a>
                            </div>
                            <div class="email-aside-nav collapse">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" href="../email/inbox.html">
                                            <i data-feather="inbox" class="me-2"></i>Gelen Kutusu
                                        </a>
                                    </li>
                                    <li class="nav-item mt-2">
                                        <a class="nav-link d-flex align-items-center" href="{{ url('admin/email/sent') }}">
                                            <i data-feather="send" class="me-2"></i>
                                            Gönderilenler
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        @include('_message')
                        <div class="d-flex align-items-center p-3 border-bottom tx-16">
                            <i data-feather="edit" class="me-2"></i>
                            Yeni Mail
                        </div>
                        <form action="{{ url('admin/email/compose_post') }}" method="post">
                            @csrf
                            <div class="p-3 pb-0">
                                <div class="to">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Kime</label>
                                        <div class="col-md-10">
                                            <select class="form-select" id="user_id" name="user_id">
                                                <option selected="X" disabled="">Çalışan veya Kullanıcı maili seçiniz.</option>
                                                @foreach ($getEmail as $value)
                                                <option value="{{ $value->id }}">{{ $value->role }} |{{ $value->name }} | {{ $value->email }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="to cc">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Bilgi</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="cc_email" name="cc_email">
                                        </div>
                                    </div>
                                </div>
                                <div class="subject">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Konu</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" id="subject"
                                                name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="description">
                                    <div class="row mb-3">
                                        <label class="col-md-2 col-form-label">Açıklama</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" id="descriptions" name="descriptions"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="row mb-3">
                                        <div class="col-md-10 offset-2">
                                            <button class="btn btn-primary me-1 mb-1" type="submit"> Gönder</button>
                                            <button class="btn btn-secondary me-1 mb-1" type="button"> İptal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection