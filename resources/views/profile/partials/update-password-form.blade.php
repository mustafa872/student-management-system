<section>

    <div class="mb-4">
        <h5 class="fw-bold mb-2">تحديث كلمة المرور</h5>
       <p class="text-secondary mb-0">
            استخدم كلمة مرور قوية لحماية حسابك.
        </p>
    </div>

    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        <div class="row g-3">

            {{-- كلمة المرور الحالية --}}
            <div class="col-12">

                <label for="update_password_current_password" class="form-label">
                    كلمة المرور الحالية
                </label>

                <input
                    type="password"
                    id="update_password_current_password"
                    name="current_password"
                    class="form-control @if($errors->updatePassword->has('current_password')) is-invalid @endif"
                    autocomplete="current-password"
                    required
                >

                @if($errors->updatePassword->has('current_password'))
                    <div class="invalid-feedback">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif

            </div>

            {{-- كلمة المرور الجديدة --}}
            <div class="col-12">

                <label for="update_password_password" class="form-label">
                    كلمة المرور الجديدة
                </label>

                <input
                    type="password"
                    id="update_password_password"
                    name="password"
                    class="form-control @if($errors->updatePassword->has('password')) is-invalid @endif"
                    autocomplete="new-password"
                    required
                >

                @if($errors->updatePassword->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif

            </div>

            {{-- تأكيد كلمة المرور --}}
            <div class="col-12">

                <label for="update_password_password_confirmation" class="form-label">
                    تأكيد كلمة المرور الجديدة
                </label>

                <input
                    type="password"
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    class="form-control"
                    autocomplete="new-password"
                    required
                >

            </div>

        </div>

        {{-- أزرار الحفظ --}}
        <div class="d-flex align-items-center gap-3 mt-4">

            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-shield-lock ms-1"></i>
                تحديث كلمة المرور
            </button>

            @if(session('status') === 'password-updated')

                <span class="text-success">
                    <i class="bi bi-check-circle ms-1"></i>
                    تم تحديث كلمة المرور بنجاح.
                </span>

            @endif

        </div>

    </form>

</section>
