<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            APP<span>Control</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Temel</li>
            <li class="nav-item">
                <a href="{{ route('admin.profile') }}" class="nav-link">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Profil</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Kontrol Paneli</span>
                </a>
            </li>
            <li class="nav-item nav-category">Kullanıcılar</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Kullanıcılar</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item @if(Request::segment(3) == 'list') active  @endif">
                            <a href="{{ url('admin/users/list') }}" class="nav-link">Kullanıcı Listesi</a>
                        </li>
                        <li class="nav-item @if(Request::segment(2) == 'userAdd') active  @endif">
                            <a href="{{ route('admin.userAdd') }}" class="nav-link">Kullanıcı Ekle</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Mail Yönetimi</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/email/compose') }}" class="nav-link">Oluştur</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/email/sent') }}" class="nav-link">Gönderilenler</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Takvim Yönetimi</li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Takvim</span>
                </a>
            </li>
        </ul>
    </div>
</nav>