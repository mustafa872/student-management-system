@extends('layouts.app')

@section('title', 'إدارة الطلاب')
@section('page-title', 'إدارة الطلاب')

@section('content')

{{-- Page Header --}}
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

    <div>
        <h4 class="fw-bold mb-1">قائمة الطلاب</h4>
        <p class="muted mb-0">إدارة بيانات الطلاب والبطاقات الدراسية.</p>
    </div>

    @can('create', App\Models\Student::class)
        <a href="{{ route('students.create') }}" class="btn btn-primary px-4">
            <i class="bi bi-plus-lg ms-1"></i>
            إضافة طالب جديد
        </a>
    @endcan

</div>

{{-- Statistics --}}
<div class="row g-3 mb-4">

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card d-flex justify-content-between align-items-center">
            <div>
                <div class="muted mb-2">إجمالي الطلاب</div>
                <div class="fs-3 fw-bold">{{ $students->total() }}</div>
            </div>

            <div class="stat-icon" style="background:#EEF2FF;color:#4F46E5">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card d-flex justify-content-between align-items-center">
            <div>
                <div class="muted mb-2">في الصفحة الحالية</div>
                <div class="fs-3 fw-bold">{{ $students->count() }}</div>
            </div>

            <div class="stat-icon" style="background:#ECFDF5;color:#10B981">
                <i class="bi bi-person-check-fill"></i>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card d-flex justify-content-between align-items-center">
            <div>
                <div class="muted mb-2">رقم الصفحة</div>
                <div class="fs-3 fw-bold">{{ $students->currentPage() }}</div>
            </div>

            <div class="stat-icon" style="background:#FFF7ED;color:#F97316">
                <i class="bi bi-file-earmark-text-fill"></i>
            </div>
        </div>
    </div>

</div>

{{-- Students Table --}}
<div class="content-card">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">

        <div>
            <h5 class="section-title mb-1">بيانات الطلاب</h5>
            <small class="muted">قائمة الطلاب المسجلين في النظام</small>
        </div>

        <span class="badge rounded-pill px-3 py-2"
              style="background:#EEF2FF;color:#4F46E5">
            {{ $students->total() }} طالب
        </span>

    </div>

    <div class="table-responsive">

        <table class="table table-hover mb-0">

            <thead>
                <tr>
                    <th>#</th>
                    <th>الطالب</th>
                    <th>البريد الإلكتروني</th>
                    <th>العمر</th>
                    <th>المرحلة</th>
                    <th>البطاقة</th>
                    <th>أُضيف بواسطة</th>
                    <th>تاريخ الإضافة</th>
                    <th class="text-center">الإجراءات</th>
                </tr>
            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr>

                        {{-- ID --}}
                        <td class="fw-bold muted">
                            {{ $student->id }}
                        </td>

                        {{-- Student Information --}}
                        <td>
                            <div class="d-flex align-items-center gap-2">

                                @if($student->image)
                                    <img
                                        src="{{ asset('storage/'.$student->image) }}"
                                        alt="{{ $student->name }}"
                                        width="42"
                                        height="42"
                                        class="rounded-circle"
                                        style="object-fit:cover"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="user-avatar rounded-circle">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                @endif

                                <div>
                                    <div class="fw-bold">
                                        {{ $student->name }}
                                    </div>

                                    <small class="muted">
                                        طالب #{{ $student->id }}
                                    </small>
                                </div>

                            </div>
                        </td>

                        {{-- Email --}}
                        <td class="muted">
                            {{ $student->email }}
                        </td>

                        {{-- Age --}}
                        <td>
                            {{ $student->age }} سنة
                        </td>

                        {{-- Stage --}}
                        <td>
                            <span class="badge rounded-pill px-3 py-2"
                                  style="background:#F1F5F9;color:#334155">
                                {{ $student->stage }}
                            </span>
                        </td>

                        {{-- Card --}}
                        <td>

                            @if($student->card)

                                <span class="badge rounded-pill px-3 py-2"
                                      style="background:#ECFDF5;color:#059669">
                                    <i class="bi bi-credit-card ms-1"></i>
                                    {{ $student->card->card_number }}
                                </span>

                            @else

                                <span class="badge rounded-pill px-3 py-2"
                                      style="background:#FFF7ED;color:#C2410C">
                                    لا توجد بطاقة
                                </span>

                            @endif

                        </td>

                        {{-- Created By --}}
                        <td>
                            @if($student->user)
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-person-circle text-primary"></i>
                                    <span>{{ $student->user->name }}</span>
                                </div>
                            @else
                                <span class="muted">غير معروف</span>
                            @endif
                        </td>

                        {{-- Created At --}}
                        <td class="muted">
                            {{ $student->created_at?->format('Y-m-d') ?? '—' }}
                        </td>

                        {{-- Actions --}}
                        <td>

                            <div class="d-flex justify-content-center gap-1">

                                <a href="{{ route('students.show', $student) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="عرض تفاصيل الطالب"
                                   aria-label="عرض تفاصيل الطالب">

                                    <i class="bi bi-eye"></i>

                                </a>

                                @can('update', $student)

                                    <a href="{{ route('students.edit', $student) }}"
                                       class="btn btn-sm btn-outline-secondary"
                                       title="تعديل بيانات الطالب"
                                       aria-label="تعديل بيانات الطالب">

                                        <i class="bi bi-pencil-square"></i>

                                    </a>

                                @endcan

                                @can('delete', $student)

                                    <form
                                        action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        onsubmit="return confirm('هل أنت متأكد من حذف الطالب {{ addslashes($student->name) }}؟ لا يمكن التراجع عن هذه العملية.');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-sm btn-outline-danger"
                                            title="حذف الطالب"
                                            aria-label="حذف الطالب"
                                            type="submit"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>

                                    </form>

                                @endcan

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="9" class="text-center py-5">

                            <i class="bi bi-people display-5 text-secondary"></i>

                            <h6 class="fw-bold mt-3">
                                لا يوجد طلاب حالياً
                            </h6>

                            <p class="muted">
                                لم تتم إضافة أي طالب إلى النظام بعد.
                            </p>

                            @can('create', App\Models\Student::class)

                                <a href="{{ route('students.create') }}"
                                   class="btn btn-primary">
                                    <i class="bi bi-plus-lg ms-1"></i>
                                    إضافة أول طالب
                                </a>

                            @endcan

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
    @if($students->hasPages())

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">

            <small class="muted">
                عرض {{ $students->firstItem() }}
                إلى {{ $students->lastItem() }}
                من {{ $students->total() }} طالب
            </small>

            {{ $students->links() }}

        </div>

    @endif

</div>

@endsection
