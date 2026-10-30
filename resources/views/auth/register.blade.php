<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب | Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --dark: #14213d;
            --muted: #64748b;
        }

        * { font-family: 'Cairo', sans-serif; }

        body {
            min-height: 100vh;
            background: #f4f7fc;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 680px;
            background: white;
            border-radius: 25px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 20px 65px rgba(20, 33, 61, .10);
        }

        .auth-side {
            background: linear-gradient(145deg, #14213d, #1d4ed8);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .auth-side::before,
        .auth-side::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
        }

        .auth-side::before {
            width: 350px;
            height: 350px;
            top: -130px;
            left: -130px;
        }

        .auth-side::after {
            width: 250px;
            height: 250px;
            bottom: -100px;
            right: -100px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            z-index: 1;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            display: grid;
            place-items: center;
            background: rgba(255,255,255,.15);
            border-radius: 14px;
            font-size: 25px;
        }

        .brand-name { font-weight: 800; }

        .side-content {
            position: relative;
            z-index: 1;
        }

        .side-content h2 {
            font-size: 34px;
            font-weight: 800;
            line-height: 1.7;
        }

        .side-content p {
            color: #dbeafe;
            line-height: 2;
        }

        .side-icon {
            font-size: 100px;
            color: rgba(255,255,255,.16);
            margin-top: 25px;
        }

        .side-footer {
            color: #cbd5e1;
            font-size: 13px;
            position: relative;
            z-index: 1;
        }

        .auth-form {
            padding: 45px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-heading h1 {
            color: var(--dark);
            font-size: 29px;
            font-weight: 800;
        }

        .form-heading p { color: var(--muted); }

        .form-label {
            color: #334155;
            font-weight: 700;
            font-size: 14px;
        }

        .form-control {
            height: 49px;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
            padding: 12px 15px;
            background: #f8fafc;
        }

        .form-control:focus {
            background: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37,99,235,.10);
        }

        .input-group-text {
            background: #f8fafc;
            border-color: #e2e8f0;
            color: #64748b;
            border-radius: 11px;
        }

        .input-group .form-control {
            border-radius: 11px 0 0 11px;
        }

        .input-group .input-group-text {
            border-radius: 0 11px 11px 0;
        }

        .btn-auth {
            height: 52px;
            background: var(--primary);
            color: white;
            border: 0;
            border-radius: 11px;
            font-weight: 700;
            transition: .2s;
        }

        .btn-auth:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
        }

        .auth-link {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .auth-link:hover { text-decoration: underline; }

        @media(max-width: 767px) {
            body { padding: 12px; }

            .auth-wrapper {
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .auth-side {
                padding: 25px;
                min-height: 190px;
            }

            .side-content { display: none; }
            .side-footer { margin-top: 25px; }
            .auth-form { padding: 35px 25px; }
        }
    </style>
</head>

<body>

<div class="auth-wrapper">

    <aside class="auth-side">
        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div>
                <div class="brand-name">Student Management</div>
                <small class="text-white-50">نظام إدارة الطلاب</small>
            </div>
        </div>

        <div class="side-content">
            <h2>ابدأ رحلتك معنا</h2>
            <p>
                أنشئ حسابك الخاص واستفد من أدوات إدارة الطلاب
                وتنظيم الكتب والبطاقات والدورات التعليمية.
            </p>
            <i class="bi bi-person-plus-fill side-icon"></i>
        </div>

        <div class="side-footer">
            © {{ date('Y') }} Student Management System
        </div>
    </aside>

    <main class="auth-form">

        <div class="form-heading mb-4">
            <h1>إنشاء حساب جديد</h1>
            <p>املأ المعلومات التالية لإنشاء حسابك.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">الاسم الكامل</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="أدخل اسمك الكامل"
                        required
                        autofocus
                        autocomplete="name"
                    >
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="example@email.com"
                        required
                        autocomplete="username"
                    >
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="أنشئ كلمة مرور"
                        required
                        autocomplete="new-password"
                    >
                </div>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">
                    تأكيد كلمة المرور
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-shield-lock"></i>
                    </span>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="أعد كتابة كلمة المرور"
                        required
                        autocomplete="new-password"
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-auth w-100">
                إنشاء الحساب
                <i class="bi bi-arrow-left me-2"></i>
            </button>
        </form>

        <div class="text-center mt-4">
            <span class="text-secondary small">لديك حساب بالفعل؟</span>
            <a href="{{ route('login') }}" class="auth-link me-1">
                تسجيل الدخول
            </a>
        </div>

    </main>
</div>

</body>
</html>
