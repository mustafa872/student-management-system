@extends('layouts.app')

@section('title', 'تفاصيل الطالب')
@section('page-title', 'تفاصيل الطالب')

@section('content')

@php
    $stages = [
        'First' => 'الأولى',
        'Second' => 'الثانية',
        'Third' => 'الثالثة',
        'Fourth' => 'الرابعة',
    ];

    $stageName = $stages[$student->stage] ?? $student->stage;
@endphp

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

    <div>
        <h4 class="fw-bold mb-1">تفاصيل الطالب</h4>
        <p class="muted mb-0">عرض المعلومات الأكاديمية والشخصية.</p>
    </div>

    <div class="d-flex gap-2 flex-wrap">

        <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-right ms-1"></i>
            قائمة الطلاب
        </a>

        @can('update', $student)
            <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">
                <i class="bi bi-pencil-square ms-1"></i>
                تعديل
            </a>
        @endcan

        @can('delete', $student)
            <form
                action="{{ route('students.destroy', $student) }}"
                method="POST"
                onsubmit="return confirm('هل أنت متأكد من حذف هذا الطالب؟ لا يمكن التراجع عن هذه العملية.');"
            >
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash ms-1"></i>
                    حذف الطالب
                </button>
            </form>
        @endcan

    </div>
</div>

{{-- Student Profile --}}
<div class="content-card mb-4"
     style="background:linear-gradient(115deg,#172554,#4F46E5);color:white;border:0">

    <div class="d-flex align-items-center flex-wrap gap-4">

        @if($student->image)

            <img
                src="{{ asset('storage/' . $student->image) }}"
                alt="{{ $student->name }}"
                width="112"
                height="112"
                class="rounded-circle border border-4 border-white"
                style="object-fit:cover"
            >

        @else

            <div
                class="rounded-circle d-flex align-items-center justify-content-center"
                style="width:112px;height:112px;background:#ffffff25;font-size:48px"
            >
                <i class="bi bi-person-fill"></i>
            </div>

        @endif

        <div class="flex-grow-1">

            <h3 class="fw-bold mb-2">{{ $student->name }}</h3>

            <div class="mb-2">
                <i class="bi bi-envelope ms-2"></i>
                {{ $student->email }}
            </div>

            <span class="badge bg-light text-primary">
                المرحلة {{ $stageName }}
            </span>

        </div>

        <div class="rounded-3 p-3" style="background:#ffffff20">
            <small class="d-block">رقم الطالب</small>
            <strong class="fs-3">#{{ $student->id }}</strong>
        </div>

    </div>
</div>

{{-- Statistics --}}
<div class="row g-3 mb-4">

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="muted mb-2">العمر</div>
            <div class="fs-3 fw-bold">{{ $student->age }} سنة</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="muted mb-2">الكتب</div>
            <div class="fs-3 fw-bold">{{ $student->books->count() }}</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="muted mb-2">الدورات</div>
            <div class="fs-3 fw-bold">{{ $student->courses->count() }}</div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="muted mb-2">تاريخ التسجيل</div>
            <div class="fs-5 fw-bold">
                {{ $student->created_at?->format('Y-m-d') ?? 'غير محدد' }}
            </div>
        </div>
    </div>

</div>

{{-- Student Card --}}
<div class="content-card mb-4">

    <h5 class="section-title mb-3">
        <i class="bi bi-credit-card-2-front ms-2" style="color:#4F46E5"></i>
        البطاقة الطلابية
    </h5>

    @if($student->card)

        <div
            class="d-flex align-items-center justify-content-between flex-wrap gap-3 rounded-3 p-4"
            style="background:#EEF2FF"
        >

            <div>
                <div class="muted mb-1">رقم البطاقة</div>
                <strong class="fs-4 text-primary">
                    {{ $student->card->card_number }}
                </strong>
            </div>

            <span class="badge rounded-pill px-3 py-2"
                  style="background:#DCFCE7;color:#15803D">
                بطاقة صادرة
            </span>

        </div>

    @else

        <div class="text-center py-3">
            <i class="bi bi-credit-card display-5 text-secondary"></i>
            <p class="muted mt-2 mb-0">
                لا توجد بطاقة مسجلة لهذا الطالب.
            </p>
        </div>

    @endif

</div>

{{-- Books and Courses --}}
<div class="row g-4">

    {{-- Books --}}
    <div class="col-12 col-xl-6">

        <div class="content-card h-100">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="section-title mb-0">
                    <i class="bi bi-book ms-2" style="color:#4F46E5"></i>
                    الكتب
                </h5>

                <span class="badge bg-light text-primary">
                    {{ $student->books->count() }}
                </span>

            </div>

            @forelse($student->books as $book)

                <div class="d-flex justify-content-between align-items-start border-bottom py-3 gap-2">

                    <div>
                        <div class="fw-bold">{{ $book->title }}</div>

                        <small class="muted">
                            {{ $book->author ?: 'المؤلف غير محدد' }}
                        </small>
                    </div>

                    @if($book->pages)
                        <span class="badge bg-light text-secondary">
                            {{ $book->pages }} صفحة
                        </span>
                    @endif

                </div>

            @empty

                <p class="muted text-center py-4 mb-0">
                    لا توجد كتب مرتبطة بهذا الطالب.
                </p>

            @endforelse

        </div>

    </div>

    {{-- Courses --}}
    <div class="col-12 col-xl-6">

        <div class="content-card h-100">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="section-title mb-0">
                    <i class="bi bi-journal-bookmark ms-2" style="color:#4F46E5"></i>
                    الدورات
                </h5>

                <span class="badge bg-light text-primary">
                    {{ $student->courses->count() }}
                </span>

            </div>

            @forelse($student->courses as $course)

                <div class="d-flex align-items-center gap-2 border-bottom py-3">

                    <span
                        class="stat-icon"
                        style="width:38px;height:38px;background:#EEF2FF;color:#4F46E5"
                    >
                        <i class="bi bi-journal-check"></i>
                    </span>

                    <strong>{{ $course->name }}</strong>

                </div>

            @empty

                <p class="muted text-center py-4 mb-0">
                    لا توجد دورات مرتبطة بهذا الطالب.
                </p>

            @endforelse

        </div>

    </div>

</div>

{{-- Additional Information --}}
<div class="content-card mt-4">

    <h5 class="section-title mb-3">معلومات إضافية</h5>

    <div class="row g-3">

        <div class="col-12 col-md-6">
            <small class="muted d-block">أضيف بواسطة</small>

            <strong>
                {{ $student->user?->name ?? 'غير محدد' }}
            </strong>
        </div>

        <div class="col-12 col-md-6">
            <small class="muted d-block">آخر تحديث</small>

            <strong>
                {{ $student->updated_at?->format('Y-m-d H:i') ?? 'غير محدد' }}
            </strong>
        </div>

    </div>

</div>

@endsection
