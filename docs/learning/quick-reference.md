# ⚡ مرجع سريع أثناء البرمجة

**هدفه:** أوامر وصيغ مُلخّصة؛ الشرح الكامل في `MASTER-REFERENCE.md`. بعض الأوامر تولّد ملفات أو تُغيّر البيانات؛ افهمها قبل التنفيذ.

## Windows / PHP / Laravel

```powershell
php -v                     # إصدار PHP في الـ Terminal
where.exe php              # أي ملف PHP يُستخدم عبر PATH
php --ini                  # ملفات إعداد PHP
php -m                     # Extensions المحمّلة
composer --version         # إصدار Composer
php artisan about          # ملخص Laravel وDB
php artisan route:list     # قائمة Routes
php artisan migrate:status # حالة migrations
php artisan serve          # سيرفر تطوير محلي
php artisan tinker         # ساحة تجربة Laravel
php artisan storage:link   # ربط Public Storage (ينشئ رابطاً)
php -l app/Http/Controllers/StudentController.php  # Syntax Check
```

**مهم:** `php artisan migrate` يغيّر قاعدة البيانات؛ `migrate:fresh` قد يزيل كل الجداول والبيانات فلا تستخدمه للتجربة على مشروعك الحقيقي.

## Routes

```php
Route::get('/students', [StudentController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
});
```

داخل `Route::resource` تُستخدم عادةً: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`.

## Blade

```blade
{{ $student->name }}               {{-- عرض هارب HTML --}}
{{ old('name') }}                   {{-- الاحتفاظ ببيان بعد فشل Validation --}}
@csrf                              {{-- حماية Form --}}
@method('PUT')                     {{-- Method Spoofing للتحديث --}}
@error('name') {{ $message }} @enderror
@can('update', $student) ... @endcan
{{ $students->links() }}           {{-- Pagination --}}
```

## Eloquent

```php
Student::all();
Student::find(1);                  // null لو لا يوجد
Student::findOrFail(1);            // 404 عادةً لو لا يوجد
Student::where('stage', 'First')->get();
Student::with(['card','user'])->paginate(5);
$student->load(['books', 'courses']);
$student->courses()->sync([1, 2]); // تغيير روابط Pivot
```

**لا تستخدم `sync([1,2])` على بيانات المشروع الحقيقي لمجرد التجربة**؛ يغيّر ارتباطات الطالب.

## SQL الأساسية

```sql
SELECT id, name FROM students;
SELECT id, COUNT(*) FROM students GROUP BY id;
-- فحص تكرار بطاقة للطالب:
SELECT student_id, COUNT(*) AS copies
FROM cards
GROUP BY student_id
HAVING COUNT(*) > 1;

-- فحص تكرار ارتباطات Pivot:
SELECT student_id, course_id, COUNT(*) AS copies
FROM course_student
GROUP BY student_id, course_id
HAVING COUNT(*) > 1;
```

## Validation

```php
$validated = $request->validate([
    'name' => 'required|string|min:3|max:255',
    'email' => 'required|email|unique:students,email,' . $student->id,
    'age' => 'required|integer|min:1|max:100',
    'stage' => 'required|in:First,Second,Third,Fourth',
    'image' => 'nullable|image',
]);
```

**هذه قواعد تحديث، وليس إنشاء**: تحديث الصورة اختياري؛ إنشاء الطالب في نسخة المشروع المراجَعة كان يتطلب الصورة.

## Policy / Authorization

```php
// داخل StudentPolicy:
return $user->id === $student->user_id;

// داخل Controller:
$this->authorize('update', $student); // throws 403 on denial, typically

// فحص اختبار فقط:
Gate::forUser($user)->allows('update', $student); // bool
```

| قبل تنفيذ Ability | التأثير |
|---|---|
| `return true` | سماح مباشر |
| `return false` | رفض مباشر |
| `return null` | المرور لفحص الـ Ability |

## دليل تشخيص سريع

| العرض | أول شيء افحصه |
|---|---|
| 404 | Route/Resource Model Binding ووجود ID |
| 403 | Policy والـ Ability و`user_id` |
| PHP parse error | السطر السابق والمحارف الغريبة و`php -l` |
| `authorize` unknown | وجود `AuthorizesRequests` Trait |
| Tinker/mbstring | `php -m` وPHP CLI config |
| صورة لا تظهر | `storage:link` وPath وPublic disk |
| Duplicate email | Validation + DB UNIQUE |
| مشكلة DB | `.env` (بدون مشاركة الأسرار) و`artisan about` |
