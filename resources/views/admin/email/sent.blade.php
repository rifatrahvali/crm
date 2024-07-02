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
                                    <h4>Gönderilenler</h4>
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
                                        <a class="nav-link d-flex align-items-center"
                                            href="{{ url('admin/email/sent') }}">
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
                        <div class="p-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-end mb-2 mb-md-0">
                                        <i data-feather="send" class="text-muted me-2"></i>
                                        <h4 class="me-1">Gönderilenler</h4>
                                        <span class="text-muted">(2 Yeni Mail)</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Search mail...">
                                        <button class="btn btn-light btn-icon" type="button" id="button-search-addon"><i
                                                data-feather="search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-none d-md-flex align-items-center flex-wrap">
                                <div class="form-check me-3">
                                    <input type="checkbox" class="form-check-input" id="inboxCheckAll">
                                </div>
                                <div class="btn-group me-2">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        type="button"> seç <span class="caret"></span></button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Mark as read</a>
                                        <a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item"
                                            href="#">Spam</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                            href="#">Delete</a>
                                    </div>
                                </div>
                                <div class="btn-group me-2">
                                    <button class="btn btn-outline-primary" type="button">Arşiv</button>
                                    <a href="" id="getDeleteURL" class="btn btn-outline-primary"
                                        onclick="return confirm('Silmek istediğinizden emin misiniz?');">Sil</a>
                                </div>
                                <div class="btn-group me-2 d-none d-xl-block">
                                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                                        type="button">Order by <span class="caret"></span></button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="#">Date</a>
                                        <a class="dropdown-item" href="#">From</a>
                                        <a class="dropdown-item" href="#">Subject</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Size</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end flex-grow-1">
                                <span class="me-2">1-10 of 253</span>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary btn-icon" type="button">
                                        <i data-feather="chevron-left"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary btn-icon" type="button">
                                        <i data-feather="chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="email-list">

                            <!-- email list item -->
                            @foreach ($getRecord as $value)
                            <div class="email-list-item email-list-item--unread">
                                <div class="email-list-actions">
                                    <div class="form-check">
                                        <!-- gönderilen maillerin idsini checkbox'a atandı -->
                                        <input type="checkbox" class="form-check-inpu delete-all-option"
                                            value="{{ $value->id }}">
                                    </div>
                                    <a class="favorite" href="javascript:;"><span><i data-feather="star"></i></span></a>
                                </div>
                                <a href="./read.html" class="email-list-detail">
                                    <div class="content">
                                        <span class="from">{{ $value->subject}} </span>
                                        <p class="msg">{{ $value->descriptions}}</p>
                                    </div>
                                    <span class="date">
                                        {{ date('d m Y',strtotime($value->created_at)) }}
                                    </span>
                                </a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $('.delete-all-option').change(function () {
            var total = '';
            $('.delete-all-option').each(function () {
                if (this.checked) {
                    var id = $(this).val();
                    total += id+',';
                }
            });
            var url = '{{ url('admin/email/sentDelete?id=') }}'+total;
            $('#getDeleteURL').attr('href',url);
        });
</script>
@endsection