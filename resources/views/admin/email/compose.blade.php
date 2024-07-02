@extends('admin.AdminDashboard')

@section('admin')


<div class="row inbox-wrapper">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
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