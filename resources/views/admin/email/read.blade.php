@extends('admin.AdminDashboard')

@section('admin')



<div class="col-lg-10 offset-1">
    @include('_message')
    <div class="card shadow-sm">
        <div class="card-body bg-light">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom tx-16">
                <div class="d-flex align-items-center">
                    <i data-feather="star" class="text-primary icon-lg me-2"></i>
                    <span>{{ $getRecord->subject }}</span>
                </div>
                <div>
                    <a href="{{ url('admin/email/ReadDelete/'.$getRecord->id) }}" class="text-decoration-none">
                        <i data-feather="trash" class="text-muted icon-lg"></i>
                    </a>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between flex-wrap px-3 py-2 border-bottom">
                <div class="d-flex align-items-center">
                    <div class="me-2">
                        <img src="https://via.placeholder.com/36x36" alt="Avatar" class="rounded-circle img-xs">
                    </div>
                </div>
                <div class="tx-13 text-muted mt-2 mt-sm-0">{{ date('d/m/Y',strtotime($getRecord->created_at)) }}</div>
            </div>
            <div class="p-4 border-bottom">
                <p>
                    {{$getRecord->descriptions}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection