<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Student Management System')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --sidebar: #172554;
            --sidebar-hover: #26396D;
            --bg: #F8FAFC;
            --surface: #FFFFFF;
            --ink: #0F172A;
            --muted: #64748B;
            --border: #E2E8F0;
            --success: #10B981;
            --danger: #DC2626;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font-family: 'Cairo', sans-serif;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        /* Sidebar */

        .sidebar {
            position: fixed;
            inset: 0 0 0 auto;
            width: 260px;
            height: 100vh;
            background: var(--sidebar);
            color: #FFFFFF;
            padding: 24px 16px;
            z-index: 1050;
            overflow-y: auto;
            transition: transform .25s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 10px 25px;
            border-bottom: 1px solid #FFFFFF20;
            margin-bottom: 24px;
            color: #FFFFFF;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            display: grid;
            place-items: center;
            background: var(--primary);
            border-radius: 13px;
            font-size: 22px;
            flex-shrink: 0;
        }

        .brand h5 {
            font-size: 16px;
            font-weight: 800;
            margin: 0;
        }

        .brand small {
            color: #A5B4FC;
            font-size: 11px;
        }

        .menu-label {
            color: #94A3B8;
            font-size: 11px;
            font-weight: 700;
            padding: 0 12px;
            margin: 20px 0 9px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #CBD5E1;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-weight: 600;
            transition: .2s;
        }

        .sidebar-link i {
            font-size: 18px;
        }

        .sidebar-link:hover {
            background: var(--sidebar-hover);
            color: #FFFFFF;
        }

        .sidebar-link.active {
            background: var(--primary);
            color: #FFFFFF;
            box-shadow: 0 5px 15px #4f46e540;
        }

        .sidebar-link.disabled {
            opacity: .4;
            cursor: not-allowed;
            pointer-events: none;
        }

        .sidebar-link:focus-visible {
            outline: 2px solid #A5B4FC;
            outline-offset: 3px;
        }

        /* Main layout */

        .main-wrapper {
            margin-right: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: #FFFFFF;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .page-heading h5 {
            margin: 0;
            font-weight: 800;
            font-size: 17px;
        }

        .page-heading small {
            color: var(--muted);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #EEF2FF;
            color: var(--primary);
            display: grid;
            place-items: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .user-name {
            font-weight: 700;
            font-size: 13px;
        }

        .user-role {
            color: var(--muted);
            font-size: 11px;
        }

        .content-area {
            padding: 30px 32px;
            max-width: 1700px;
            margin: auto;
        }

        .content-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 3px 12px #0f172a08;
        }

        /* Buttons and forms */

        .btn {
            font-family: inherit;
            font-weight: 700;
            border-radius: 9px;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .form-control,
        .form-select {
            border-radius: 9px;
            border-color: var(--border);
            padding: 10px 13px;
            font-family: inherit;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 .2rem #4f46e51f;
        }

        .form-label {
            font-weight: 700;
            color: #334155;
        }

        .required:after {
            content: " *";
            color: var(--danger);
        }

        /* Tables */

        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #F1F5F9;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            padding: 14px;
        }

        .table tbody td {
            padding: 14px;
            border-color: #F1F5F9;
        }

        /* Dashboard */

        .section-title {
            font-weight: 800;
            font-size: 17px;
        }

        .muted {
            color: var(--muted);
        }

        .stat-card {
            background: #FFFFFF;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 3px 12px #0f172a08;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        /* Pagination */

        .pagination {
            gap: 4px;
        }

        .page-link {
            border-radius: 8px !important;
            color: var(--primary);
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
        }

        /* Mobile menu */

        .mobile-menu-btn {
            display: none;
            border: 0;
            background: #EEF2FF;
            color: var(--primary);
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 20px;
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: #0F172A80;
            z-index: 1040;
        }

        .sidebar-overlay.show {
            display: block;
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-right: 0;
            }

            .mobile-menu-btn {
                display: inline-grid;
                place-items: center;
            }

            .topbar {
                padding: 0 18px;
            }

            .content-area {
                padding: 20px 16px;
            }
        }

        @media (max-width: 575px) {
            .topbar {
                height: 68px;
            }

            .user-name {
                max-width: 110px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .content-card {
                padding: 16px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<aside class="sidebar" id="sidebar" aria-label="القائمة الرئيسية">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <div>
            <h5>Student System</h5>
            <small>Management Dashboard</small>
        </div>
    </div>

    <div class="menu-label">القائمة الرئيسية</div>

    @if(Route::has('dashboard'))
        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>لوحة التحكم</span>
        </a>
    @endif

    @if(Route::has('students.index'))
        <a href="{{ route('students.index') }}"
           class="sidebar-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            <span>الطلاب</span>
        </a>
    @endif

    <div class="menu-label">إدارة النظام</div>

    <span class="sidebar-link disabled">
        <i class="bi bi-book-fill"></i>
        <span>الكتب — قريباً</span>
    </span>

    <span class="sidebar-link disabled">
        <i class="bi bi-journal-bookmark-fill"></i>
        <span>الدورات — قريباً</span>
    </span>

    <span class="sidebar-link disabled">
        <i class="bi bi-credit-card-2-front-fill"></i>
        <span>البطاقات — قريباً</span>
    </span>

    <div class="menu-label">الحساب</div>

    @if(Route::has('profile.edit'))
        <a href="{{ route('profile.edit') }}"
           class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="bi bi-person-circle"></i>
            <span>الملف الشخصي</span>
        </a>
    @endif

    @if(Route::has('logout'))
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="sidebar-link w-100 border-0"
                    style="background:transparent;text-align:right">
                <i class="bi bi-box-arrow-right"></i>
                <span>تسجيل الخروج</span>
            </button>
        </form>
    @endif

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="main-wrapper">

    <header class="topbar">

        <div class="d-flex align-items-center gap-3">

            <button class="mobile-menu-btn"
                    id="menuToggle"
                    type="button"
                    aria-label="فتح القائمة"
                    aria-controls="sidebar"
                    aria-expanded="false">
                <i class="bi bi-list"></i>
            </button>

            <div class="page-heading">
                <h5>@yield('page-title', 'لوحة التحكم')</h5>
                <small>مرحباً بك في نظام إدارة الطلاب</small>
            </div>

        </div>

        @auth
            <div class="user-info">

@if(auth()->user()->is_admin)

    @php
        $unreadCount = auth()->user()
            ->unreadNotifications()
            ->count();

        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->take(5)
            ->get();
    @endphp

    <div class="dropdown">

        <button
            class="btn btn-light position-relative"
            type="button"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            aria-label="عرض الإشعارات"
        >
            <i class="bi bi-bell fs-5"></i>

            @if($unreadCount > 0)
                <span
                    class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-danger"
                >
                    {{ $unreadCount }}
                </span>
            @endif
        </button>

        <div
            class="dropdown-menu shadow border-0 p-3"
            style="width: 320px; max-width: 90vw;"
        >
            <h6 class="fw-bold mb-3">
                الإشعارات
            </h6>

           
@forelse($notifications as $notification)

    <div class="border-bottom py-2">

        <div class="fw-bold small">
            {{ $notification->data['title'] ?? 'إشعار جديد' }}
        </div>

        <div class="small text-muted mb-2">
            {{ $notification->data['student_name'] ?? '' }}
        </div>

        @if(is_null($notification->read_at))

            <form
                method="POST"
                action="{{ route('notifications.read', $notification->id) }}"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-sm btn-outline-primary"
                >
                    <i class="bi bi-check2-circle"></i>
                    تحديد كمقروء
                </button>
            </form>

        @else

            <span class="badge bg-secondary">
                تمت القراءة
            </span>

        @endif

    </div>

@empty

    <p class="text-muted small mb-0">
        لا توجد إشعارات حالياً.
    </p>

@endforelse


        </div>
    </div>

@endif


                <div class="text-start d-none d-sm-block">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">مستخدم النظام</div>
                </div>

                <div class="user-avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

            </div>
        @endauth

    </header>

    <main class="content-area">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill ms-2"></i>
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="إغلاق"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill ms-2"></i>
                {{ session('error') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="إغلاق"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="fw-bold mb-2">
                    <i class="bi bi-exclamation-circle-fill ms-2"></i>
                    يرجى مراجعة الأخطاء التالية:
                </div>

                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('menuToggle');

    function openSidebar() {
        sidebar?.classList.add('open');
        overlay?.classList.add('show');
        toggle?.setAttribute('aria-expanded', 'true');
    }

    function closeSidebar() {
        sidebar?.classList.remove('open');
        overlay?.classList.remove('show');
        toggle?.setAttribute('aria-expanded', 'false');
    }

    toggle?.addEventListener('click', () => {
        if (sidebar?.classList.contains('open')) {
            closeSidebar();
        } else {
            openSidebar();
        }
    });

    overlay?.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });

    sidebar?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeSidebar);
    });
</script>

@stack('scripts')

</body>
</html>
