
<section>

    {{-- Section Header --}}
    <div class="mb-4">
        <h5 class="fw-bold mb-2">المعلومات الشخصية</h5>
        <p class="text-secondary mb-0">
            يمكنك تحديث اسمك وبريدك الإلكتروني من هنا.
        </p>
    </div>

    {{-- Email Verification Form --}}
    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>

    {{-- Update Profile Form --}}
    <form method="POST" action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

        <div class="row g-3">

            {{-- Name --}}
            <div class="col-12">

                <label for="name" class="form-label">
                    الاسم الكامل
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $user->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                    required
                    autofocus
                    autocomplete="name"
                    maxlength="255"
                >

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Email --}}
            <div class="col-12">

                <label for="email" class="form-label">
                    البريد الإلكتروني
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $user->email) }}"
                    class="form-control @error('email') is-invalid @enderror"
                    required
                    autocomplete="username"
                    maxlength="255"
                >

                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        {{-- Email Verification Status --}}
        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

            <div class="alert alert-warning mt-4 mb-3">

                <div class="fw-bold mb-2">
                    <i class="bi bi-exclamation-circle ms-1"></i>
                    البريد الإلكتروني غير مؤكد
                </div>

                <p class="mb-2">
                    يجب تأكيد بريدك الإلكتروني للاستفادة من جميع وظائف الحساب.
                </p>

                <button
                    type="submit"
                    form="send-verification"
                    class="btn btn-outline-warning btn-sm"
                >
                    <i class="bi bi-envelope ms-1"></i>
                    إعادة إرسال رابط التأكيد
                </button>

            </div>

        @endif

        {{-- Verification Success --}}
        @if (session('status') === 'verification-link-sent')

            <div class="alert alert-success mt-3">
                <i class="bi bi-check-circle ms-1"></i>
                تم إرسال رابط تأكيد جديد إلى بريدك الإلكتروني.
            </div>

        @endif

        {{-- Save Button --}}
        <div class="d-flex align-items-center gap-3 mt-4">

            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg ms-1"></i>
                حفظ التغييرات
            </button>

            @if (session('status') === 'profile-updated')

                <span class="text-success">
                    <i class="bi bi-check-circle ms-1"></i>
                    تم حفظ التغييرات بنجاح.
                </span>

            @endif

        </div>

    </form>

</section>
