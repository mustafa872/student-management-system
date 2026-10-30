<section class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">

        {{-- Section Header --}}
        <div class="mb-4">
            <div class="d-flex align-items-center gap-2 mb-2">
                <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>

                <h5 class="fw-bold text-danger mb-0">
                    {{ __('Delete Account') }}
                </h5>
            </div>

            <p class="text-secondary mb-0">
                عند حذف حسابك، سيتم نقل جميع الطلاب المرتبطين بحسابك إلى مستخدم آخر تختاره.
                ستبقى بيانات الطلاب والكتب والبطاقات والمقررات المرتبطة بهم محفوظة.
            </p>
        </div>

        {{-- Information --}}
        <div class="alert alert-info border-0 rounded-3 d-flex align-items-start gap-2">
            <i class="bi bi-info-circle-fill mt-1"></i>

            <div>
                <strong>معلومة مهمة:</strong>
                يجب اختيار مستخدم آخر لاستلام ملكية الطلاب قبل حذف حسابك.
            </div>
        </div>

        {{-- Warning --}}
        <div class="alert alert-danger border-0 rounded-3 d-flex align-items-start gap-2">
            <i class="bi bi-exclamation-circle-fill mt-1"></i>

            <div>
                <strong>تنبيه:</strong>
                حذف الحساب نهائي ولا يمكن التراجع عنه. سيتم تسجيل خروجك بعد إتمام نقل الطلاب وحذف الحساب.
            </div>
        </div>

        {{-- Delete Account Form --}}
        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            onsubmit="return confirm('هل أنت متأكد من حذف حسابك ونقل جميع طلابك إلى المستخدم المحدد؟ لا يمكن التراجع عن حذف الحساب.');"
        >
            @csrf
            @method('DELETE')

            {{-- Transfer Students To --}}
            <div class="mb-4">
                <label for="transfer_to_user_id" class="form-label fw-semibold">
                    <i class="bi bi-person-check me-1"></i>
                    نقل الطلاب إلى المستخدم
                </label>

                <select
                    id="transfer_to_user_id"
                    name="transfer_to_user_id"
                    class="form-select @if($errors->userDeletion->has('transfer_to_user_id')) is-invalid @endif"
                    required
                >
                    <option value="">-- اختر المستخدم المستلم --</option>

                    @foreach($transferUsers as $transferUser)
                        <option
                            value="{{ $transferUser->id }}"
                            @selected(old('transfer_to_user_id') == $transferUser->id)
                        >
                            {{ $transferUser->name }} - {{ $transferUser->email }}
                        </option>
                    @endforeach
                </select>

                @if($errors->userDeletion->has('transfer_to_user_id'))
                    <div class="invalid-feedback">
                        {{ $errors->userDeletion->first('transfer_to_user_id') }}
                    </div>
                @endif

                <div class="form-text">
                    سيتم نقل ملكية جميع الطلاب المسجلين باسمك إلى هذا المستخدم.
                </div>
            </div>

            {{-- Current Password --}}
            <div class="mb-4">
                <label for="delete_account_password" class="form-label fw-semibold">
                    <i class="bi bi-lock me-1"></i>
                    {{ __('Password') }}
                </label>

                <input
                    type="password"
                    id="delete_account_password"
                    name="password"
                    class="form-control @if($errors->userDeletion->has('password')) is-invalid @endif"
                    placeholder="{{ __('Password') }}"
                    autocomplete="current-password"
                    required
                >

                @if($errors->userDeletion->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->userDeletion->first('password') }}
                    </div>
                @endif
            </div>

            {{-- Submit --}}
            <div class="d-flex justify-content-end">
                <button
                    type="submit"
                    class="btn btn-danger px-4"
                    @disabled($transferUsers->isEmpty())
                >
                    <i class="bi bi-trash3 me-1"></i>
                    {{ __('Delete Account') }}
                </button>
            </div>

            @if($transferUsers->isEmpty())
                <div class="text-danger small text-end mt-2">
                    لا يوجد مستخدم آخر حالياً لنقل الطلاب إليه.
                </div>
            @endif

        </form>

    </div>
</section>
