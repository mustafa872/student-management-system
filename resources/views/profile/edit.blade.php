
@extends('layouts.app')

@section('title', 'الملف الشخصي')
@section('page-title', 'الملف الشخصي')

@section('content')

    {{-- Page Header --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">إعدادات الحساب</h4>
        <p class="text-secondary mb-0">
            إدارة معلوماتك الشخصية وكلمة المرور وإعدادات الحساب.
        </p>
    </div>

    {{-- Profile Information --}}
    <div class="mb-4">
        @include('profile.partials.update-profile-information-form')
    </div>

    {{-- Update Password --}}
    <div class="mb-4">
        @include('profile.partials.update-password-form')
    </div>

    {{-- Delete Account --}}
    <div>
        @include('profile.partials.delete-user-form')
    </div>

@endsection
