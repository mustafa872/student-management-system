
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Student Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --dark: #14213d;
            --muted: #64748b;
            --light: #f5f8ff;
        }

        * {
            font-family: 'Cairo', sans-serif;
        }

        body {
            background: #fff;
            color: var(--dark);
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255,255,255,.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #edf0f5;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            background: var(--primary);
            color: white;
            border-radius: 13px;
            font-size: 22px;
        }

        .navbar-brand {
            font-weight: 800;
            color: var(--dark);
        }

        .nav-link {
            color: #475569;
            font-weight: 600;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .btn-primary-custom {
            background: var(--primary);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 700;
            transition: .25s;
        }

        .btn-primary-custom:hover {
            background: #1d4ed8;
            color: white;
            transform: translateY(-2px);
        }

        .btn-outline-custom {
            border: 1px solid #dbe3ef;
            color: var(--dark);
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 700;
        }

        .btn-outline-custom:hover {
            background: #eff6ff;
            border-color: var(--primary);
            color: var(--primary);
        }

        .hero {
            background:
                radial-gradient(circle at 85% 20%, #dbeafe 0, transparent 30%),
                linear-gradient(135deg, #f8fbff, #eef5ff);
            padding: 105px 0 90px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 50px;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 700;
            font-size: 13px;
        }

        .hero h1 {
            font-size: clamp(2.2rem, 5vw, 3.7rem);
            font-weight: 800;
            line-height: 1.55;
            margin: 22px 0;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            color: var(--muted);
            line-height: 2;
            font-size: 17px;
            max-width: 550px;
        }

        .dashboard-preview {
            background: white;
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 25px 70px rgba(37, 99, 235, .13);
            border: 1px solid #e8eef8;
            transform: rotate(-1deg);
        }

        .preview-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 18px;
            border-bottom: 1px solid #edf0f5;
        }

        .preview-stat {
            background: #f8faff;
            padding: 17px;
            border-radius: 13px;
            height: 100%;
        }

        .preview-stat i {
            font-size: 22px;
            color: var(--primary);
        }

        .preview-stat h4 {
            font-weight: 800;
            margin: 10px 0 3px;
        }

        .preview-stat small {
            color: var(--muted);
        }

        .preview-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 13px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }

        .avatar {
            width: 34px;
            height: 34px;
            display: grid;
            place-items: center;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: 10px;
        }

        .section {
            padding: 85px 0;
        }

        .section-heading {
            font-weight: 800;
            font-size: 32px;
            margin-bottom: 12px;
        }

        .section-subtitle {
            color: var(--muted);
            line-height: 1.9;
        }

        .feature-card {
            background: white;
            border: 1px solid #edf0f5;
            border-radius: 17px;
            padding: 28px;
            height: 100%;
            transition: .25s;
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .07);
            border-color: #dbeafe;
        }

        .feature-icon {
            width: 55px;
            height: 55px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #eff6ff;
            color: var(--primary);
            font-size: 25px;
            margin-bottom: 20px;
        }

        .feature-card h5 {
            font-weight: 800;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--muted);
            line-height: 1.9;
            margin: 0;
        }

        .cta {
            background: linear-gradient(120deg, #1e40af, #2563eb);
            border-radius: 22px;
            padding: 55px 25px;
            color: white;
        }

        .cta p {
            color: #dbeafe;
        }

        .footer {
            background: #111c33;
            color: #cbd5e1;
            padding: 35px 0;
        }

        .footer strong {
            color: white;
        }

        @media (max-width: 991px) {
            .hero {
                padding: 75px 0;
            }

            .dashboard-preview {
                margin-top: 50px;
                transform: none;
            }
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container py-2">

        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <span class="brand-icon">
                <i class="bi bi-mortarboard-fill"></i>
            </span>
            <span>Student Management</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="#home">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">المميزات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">عن النظام</a>
                </li>
            </ul>

            <div class="d-flex gap-2 mt-3 mt-lg-0">
                @auth
                    <a href="{{ route('students.index') }}" class="btn btn-primary-custom">
                        <i class="bi bi-speedometer2 ms-1"></i>
                        لوحة التحكم
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-custom">
                        تسجيل الدخول
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary-custom">
                        إنشاء حساب
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero" id="home">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <span class="hero-badge">
                    <i class="bi bi-stars"></i>
                    نظام إدارة تعليمي متكامل
                </span>

                <h1>
                    إدارة الطلاب أصبحت
                    <span>أسهل وأذكى</span>
                </h1>

                <p class="hero-description">
                    منصة متكاملة تساعدك على تنظيم بيانات الطلاب،
                    وإدارة الكتب والبطاقات والدورات من مكان واحد،
                    بواجهة سهلة وتجربة استخدام احترافية.
                </p>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    @auth
                        <a href="{{ route('students.index') }}" class="btn btn-primary-custom">
                            الدخول إلى النظام
                            <i class="bi bi-arrow-left me-2"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary-custom">
                            ابدأ الآن مجاناً
                            <i class="bi bi-arrow-left me-2"></i>
                        </a>

                        <a href="{{ route('login') }}" class="btn btn-outline-custom">
                            تسجيل الدخول
                        </a>
                    @endauth
                </div>

                <div class="d-flex gap-4 mt-5 flex-wrap">
                    <div>
                        <i class="bi bi-shield-check text-primary ms-1"></i>
                        <small class="text-secondary">إدارة آمنة</small>
                    </div>
                    <div>
                        <i class="bi bi-lightning-charge text-primary ms-1"></i>
                        <small class="text-secondary">سهولة الاستخدام</small>
                    </div>
                    <div>
                        <i class="bi bi-phone text-primary ms-1"></i>
                        <small class="text-secondary">متوافق مع جميع الأجهزة</small>
                    </div>
                </div>
            </div>

            <!-- Dashboard Preview -->
            <div class="col-lg-6">
                <div class="dashboard-preview">

                    <div class="preview-header">
                        <div>
                            <h5 class="fw-bold mb-1">لوحة التحكم</h5>
                            <small class="text-secondary">نظرة عامة على النظام</small>
                        </div>
                        <div class="brand-icon">
                            <i class="bi bi-grid-1x2-fill"></i>
                        </div>
                    </div>

                    <div class="row g-3 my-3">
                        <div class="col-6">
                            <div class="preview-stat">
                                <i class="bi bi-people-fill"></i>
                                <h4>الطلاب</h4>
                                <small>إدارة بيانات الطلاب</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="preview-stat">
                                <i class="bi bi-book-fill"></i>
                                <h4>الكتب</h4>
                                <small>تنظيم الكتب والمراجع</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="preview-stat">
                                <i class="bi bi-credit-card-2-front-fill"></i>
                                <h4>البطاقات</h4>
                                <small>إدارة بطاقات الطلاب</small>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="preview-stat">
                                <i class="bi bi-journal-check"></i>
                                <h4>الدورات</h4>
                                <small>متابعة الدورات</small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong>أقسام النظام</strong>
                        <small class="text-primary">نظرة تجريبية</small>
                    </div>

                    <div class="preview-row">
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar"><i class="bi bi-person"></i></span>
                            <span>إدارة بيانات الطلاب</span>
                        </div>
                        <i class="bi bi-chevron-left text-secondary"></i>
                    </div>

                    <div class="preview-row">
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar"><i class="bi bi-book"></i></span>
                            <span>إدارة الكتب والمراجع</span>
                        </div>
                        <i class="bi bi-chevron-left text-secondary"></i>
                    </div>

                    <div class="preview-row border-0">
                        <div class="d-flex align-items-center gap-2">
                            <span class="avatar"><i class="bi bi-mortarboard"></i></span>
                            <span>إدارة الدورات التعليمية</span>
                        </div>
                        <i class="bi bi-chevron-left text-secondary"></i>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- Features -->
<section class="section" id="features">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="section-heading">كل ما تحتاجه في مكان واحد</h2>
            <p class="section-subtitle">
                أدوات متكاملة لتنظيم وإدارة العمليات التعليمية بسهولة وكفاءة.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <h5>إدارة الطلاب</h5>
                    <p>
                        إضافة وتعديل وعرض بيانات الطلاب
                        وتنظيم معلوماتهم بسهولة.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-credit-card-2-front-fill"></i>
                    </div>
                    <h5>البطاقات الطلابية</h5>
                    <p>
                        تنظيم أرقام البطاقات وربطها
                        بالطلاب ومعلوماتهم.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <h5>إدارة الكتب</h5>
                    <p>
                        حفظ بيانات الكتب والمؤلفين
                        وربطها بسجلات الطلاب.
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                    <h5>إدارة الدورات</h5>
                    <p>
                        تنظيم الدورات التعليمية
                        وتسجيل الطلاب فيها.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- About -->
<section class="section bg-light" id="about">
    <div class="container">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <span class="hero-badge mb-3">
                    <i class="bi bi-lightbulb"></i>
                    لماذا هذا النظام؟
                </span>

                <h2 class="section-heading mt-3">
                    تنظيم أفضل، وقت أقل، وإدارة أكثر كفاءة
                </h2>

                <p class="section-subtitle">
                    صُمم النظام ليجمع أهم وظائف إدارة الطلاب في منصة واحدة،
                    ويساعد المستخدم على الوصول إلى المعلومات وإدارتها
                    بطريقة منظمة وواضحة.
                </p>

                <div class="mt-4">
                    <p>
                        <i class="bi bi-check-circle-fill text-primary ms-2"></i>
                        واجهة سهلة ومنظمة.
                    </p>
                    <p>
                        <i class="bi bi-check-circle-fill text-primary ms-2"></i>
                        إدارة مستقلة لحسابات المستخدمين وصلاحياتهم.
                    </p>
                    <p>
                        <i class="bi bi-check-circle-fill text-primary ms-2"></i>
                        ربط الطلاب بالكتب والبطاقات والدورات.
                    </p>
                    <p>
                        <i class="bi bi-check-circle-fill text-primary ms-2"></i>
                        تصميم متجاوب مع الهاتف والحاسوب.
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cta text-center">
                    <i class="bi bi-mortarboard-fill display-3 mb-3"></i>
                    <h2 class="fw-bold mb-3">ابدأ بتنظيم بياناتك اليوم</h2>
                    <p class="mb-4">
                        كل أدوات الإدارة التي تحتاجها في منصة واحدة.
                    </p>

                    @auth
                        <a href="{{ route('students.index') }}" class="btn btn-light fw-bold px-4 py-3">
                            الذهاب إلى لوحة التحكم
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-light fw-bold px-4 py-3">
                            إنشاء حساب جديد
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-mortarboard-fill fs-4 text-primary"></i>
                <strong>Student Management System</strong>
            </div>

            <small>
                © {{ date('Y') }} جميع الحقوق محفوظة.
            </small>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
