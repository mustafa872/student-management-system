@extends('layouts.app')

@section('title', 'تعديل بيانات الطالب')
@section('page-title', 'تعديل بيانات الطالب')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
    <div>
        <h4 class="fw-bold mb-1">تعديل بيانات الطالب</h4>
        <p class="muted mb-0">تحديث معلومات {{ $student->name }}.</p>
    </div>

    <a href="{{ route('students.show', $student) }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-right ms-1"></i>
        العودة للتفاصيل
    </a>
</div>

<form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- المعلومات الأساسية --}}
    <div class="content-card mb-4">

        <h5 class="section-title mb-4">
            <i class="bi bi-pencil-square ms-2" style="color:#4F46E5"></i>
            المعلومات الأساسية
        </h5>

        <div class="row g-3">

            {{-- اسم الطالب --}}
            <div class="col-12 col-md-6">
                <label for="name" class="form-label required">اسم الطالب</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $student->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                    required
                    minlength="3"
                    maxlength="255"
                >

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- البريد الإلكتروني --}}
            <div class="col-12 col-md-6">
                <label for="email" class="form-label required">البريد الإلكتروني</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $student->email) }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required
                    maxlength="255"
                >

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- العمر --}}
            <div class="col-12 col-md-6">
                <label for="age" class="form-label required">العمر</label>

                <input
                    type="number"
                    id="age"
                    name="age"
                    value="{{ old('age', $student->age) }}"
                    min="1"
                    max="100"
                    class="form-control @error('age') is-invalid @enderror"
                    required
                >

                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- المرحلة الدراسية --}}
            <div class="col-12 col-md-6">
                <label for="stage" class="form-label required">المرحلة الدراسية</label>

                <select
                    id="stage"
                    name="stage"
                    class="form-select @error('stage') is-invalid @enderror"
                    required
                >
                    <option value="">اختر المرحلة</option>

                    @foreach([
                        'First' => 'الأولى',
                        'Second' => 'الثانية',
                        'Third' => 'الثالثة',
                        'Fourth' => 'الرابعة'
                    ] as $value => $label)

                        <option
                            value="{{ $value }}"
                            @selected(old('stage', $student->stage) === $value)
                        >
                            {{ $label }}
                        </option>

                    @endforeach
                </select>

                @error('stage')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- صورة الطالب --}}
            <div class="col-12">

                <label class="form-label">الصورة الحالية</label>

                <div class="d-flex align-items-center gap-3 mb-3">

                    @if($student->image)

                        <img
                            src="{{ asset('storage/' . $student->image) }}"
                            alt="{{ $student->name }}"
                            width="72"
                            height="72"
                            class="rounded-circle"
                            style="object-fit: cover"
                        >

                    @else

                        <div class="user-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                    @endif

                    <span class="muted">
                        يمكنك اختيار صورة جديدة لاستبدال الصورة الحالية.
                    </span>

                </div>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg,.jpeg,.png"
                    class="form-control @error('image') is-invalid @enderror"
                >

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <small class="muted">
                    اختيار صورة جديدة اختياري. الصيغ المدعومة JPG وJPEG وPNG، والحد الأقصى 2MB.
                </small>

            </div>

        </div>
    </div>

    {{-- الدورات --}}
    @if(isset($courses))

        <div class="content-card mb-4">

            <h5 class="section-title mb-3">
                <i class="bi bi-journal-bookmark ms-2" style="color:#4F46E5"></i>
                الدورات المسجل بها
            </h5>

            @if($courses->count())

                @php
                    $selectedCourses = old(
                        'courses',
                        $student->courses->pluck('id')->all()
                    );
                @endphp

                <div class="row g-3">

                    @foreach($courses as $course)

                        <div class="col-12 col-sm-6 col-lg-4">

                            <label class="border rounded-3 p-3 w-100 d-flex align-items-center gap-2">

                                <input
                                    class="form-check-input mt-0"
                                    type="checkbox"
                                    name="courses[]"
                                    value="{{ $course->id }}"
                                    @checked(in_array($course->id, (array) $selectedCourses))
                                >

                                <span>{{ $course->name }}</span>

                            </label>

                        </div>

                    @endforeach

                </div>

            @else

                <p class="muted mb-0">لا توجد دورات متاحة حالياً.</p>

            @endif

            @error('courses')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            @foreach($errors->get('courses.*') as $messages)
    @foreach($messages as $message)
        <div class="text-danger mt-2">{{ $message }}</div>
    @endforeach
@endforeach

        </div>

    @endif

    {{-- أزرار الحفظ والإلغاء --}}
    <div class="d-flex gap-2 flex-wrap">

        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg ms-1"></i>
            حفظ التعديلات
        </button>

        <a href="{{ route('students.show', $student) }}" class="btn btn-light border px-4">
            إلغاء
        </a>

    </div>

</form>

@endsection
