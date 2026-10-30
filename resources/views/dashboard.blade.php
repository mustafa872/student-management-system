
@extends('layouts.app')

@section('title', 'لوحة التحكم')
@section('page-title', 'لوحة التحكم')

@section('content')

<div class="mb-4">
    <h4 class="fw-bold mb-1">
        مرحباً، {{ auth()->user()->name ?? 'بك' }}
    </h4>
    <p class="muted mb-0">
        نظرة عامة على نظام إدارة الطلاب.
    </p>
</div>

{{-- Statistics --}}
<div class="row g-3 mb-4">

    <div class="col-12 col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="muted mb-2">إدارة الطلاب</div>
                    <div class="fw-bold fs-5">ملفات الطلاب</div>
                    <small class="muted">عرض وإضافة وتحديث البيانات</small>
                </div>

                <div class="stat-icon"
                     style="background:#EEF2FF;color:#4F46E5">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('students.index') }}"
                   class="btn btn-sm btn-outline-primary">
                    عرض الطلاب
                    <i class="bi bi-arrow-left me-1"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="muted mb-2">الملف الشخصي</div>
                    <div class="fw-bold fs-5">إعدادات الحساب</div>
                    <small class="muted">تحديث بياناتك وكلمة المرور</small>
                </div>

                <div class="stat-icon"
                     style="background:#ECFDF5;color:#10B981">
                    <i class="bi bi-person-check-fill"></i>
                </div>
            </div>

            @if(Route::has('profile.edit'))
                <div class="mt-3">
                    <a href="{{ route('profile.edit') }}"
                       class="btn btn-sm btn-outline-success">
                        إعدادات الحساب
                        <i class="bi bi-arrow-left me-1"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <div class="col-12 col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="muted mb-2">إدارة النظام</div>
                    <div class="fw-bold fs-5">الأقسام القادمة</div>
                    <small class="muted">الكتب والدورات والبطاقات</small>
                </div>

                <div class="stat-icon"
                     style="background:#FFF7ED;color:#F97316">
                    <i class="bi bi-layers-fill"></i>
                </div>
            </div>

            <div class="mt-3">
                <span class="badge text-bg-warning">
                    قيد التطوير
                </span>
            </div>
        </div>
    </div>

</div>

{{-- Quick Actions --}}
<div class="content-card mb-4">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <div>
            <h5 class="section-title mb-1">الوصول السريع</h5>
            <small class="muted">اختصارات لأهم العمليات في النظام</small>
        </div>

        <i class="bi bi-lightning-charge-fill text-warning fs-4"></i>
    </div>

    <div class="d-flex flex-wrap gap-2">

        @if(Route::has('students.index'))
            <a href="{{ route('students.index') }}"
               class="btn btn-primary">
                <i class="bi bi-people ms-1"></i>
                عرض الطلاب
            </a>
        @endif

        @can('create', App\Models\Student::class)
            @if(Route::has('students.create'))
                <a href="{{ route('students.create') }}"
                   class="btn btn-outline-primary">
                    <i class="bi bi-plus-lg ms-1"></i>
                    إضافة طالب
                </a>
            @endif
        @endcan

        @if(Route::has('profile.edit'))
            <a href="{{ route('profile.edit') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-person ms-1"></i>
                الملف الشخصي
            </a>
        @endif

    </div>

</div>

{{-- System Information --}}
<div class="content-card">

    <div class="d-flex align-items-center gap-2 mb-3">
        <i class="bi bi-info-circle-fill text-primary fs-5"></i>
        <h5 class="section-title mb-0">معلومات النظام</h5>
    </div>

    <div class="row g-3">

        <div class="col-12 col-md-6">
            <div class="p-3 rounded-3"
                 style="background:#F8FAFC;border:1px solid #E2E8F0">
                <small class="muted d-block mb-1">النظام</small>
                <strong>Student Management System</strong>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="p-3 rounded-3"
                 style="background:#F8FAFC;border:1px solid #E2E8F0">
                <small class="muted d-block mb-1">حالة الحساب</small>
                <strong class="text-success">
                    <i class="bi bi-check-circle-fill ms-1"></i>
                    نشط
                </strong>
            </div>
        </div>

    </div>

</div>

@endsection
