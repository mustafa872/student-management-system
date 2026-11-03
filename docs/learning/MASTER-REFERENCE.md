# موسوعة تعلّم PHP وLaravel 12 — المرجع التعليمي المنظّم

> **الإصدار 2.0.0 — 2026-10-31**  
> **المسار:** PHP → OOP → SQL → Laravel → مشاريع واقعية → APIs → Tests → Production.  
> **اللغة:** شرح باللهجة العراقية مع إبقاء الأسماء التقنية الإنجليزية وتعريفها.  
> **المثال المركزي:** Student Management System.  
> **تنبيه منهجي:** وجود الشرح هنا **لا يعني** أنك درست الموضوع أو أتقنته. حالة تقدّمك الحقيقية موجودة في `progress.md` و`CURRICULUM.md`.

## شلون تستخدم هذا الكتاب؟

1. اقرا **الفكرة** و**ليش نحتاجها** قبل ما تنسخ كود.
2. افهم المثال سطر بسطر، ثم حاول تكتبه بنفسك؛ الأمثلة للتعلّم وليست نسخاً مؤكدة من مشروعك.
3. جرّب ضمن بيئة تطوير/اختبار، لا على بيانات مهمة؛ اقرأ قسم **جرّب**.
4. جاوب عن الأسئلة دون مراجعة الحل أولاً؛ بعدها نعالج خطأ واحد في كل مرة.
5. لا نعدّ الفصل منجزاً إلا بعد **شرح منك + تطبيق + اختبار**. نضيف الأدلة إلى `progress.md`.
6. إذا ظهر مصطلح غير واضح، راجع **المعجم** في نهاية الكتاب أو اسأل عنه قبل المتابعة.

**اتفاق مهم:** هذا الكتاب يغطي **خريطة ومفاهيم Laravel الأساسية والاحترافية** مع تطبيقات تعليمية، لكنه لا يدّعي أنه نسخة حرفية أو بديل كامل عن جميع صفحات API الرسمية. نعتمد [توثيق Laravel 12](https://laravel.com/docs/12.x) للمراجعة والتفاصيل المتغيرة. النسخة 13 تتطلب PHP 8.3+؛ حالياً نتعلم على 12 المتوافق مع بيئتك PHP 8.2.

**رموز التقدم:** `✅` سبق تطبيقه/مراجعته من سجلنا، `🟡` قيد الإتقان، `⬜` محتوى مرجعي للمستقبل. لا تغيّر الرموز هنا بالاعتماد على مجرد قراءة فصل.

## فهرس الموسوعة (45 فصلاً)


### الجزء الأول: الأساسيات

- [01 — شلون يشتغل الويب؟ HTTP](#ch01)
- [02 — PHP الأساسية](#ch02)
- [03 — OOP في PHP](#ch03)
- [04 — Composer وAutoload وGit](#ch04)
- [05 — SQL وقواعد البيانات وPDO](#ch05)

### الجزء الثاني: HTTP وLaravel الأساسي

- [06 — تثبيت Laravel والبيئة](#ch06)
- [07 — بنية المجلدات وLifecycle](#ch07)
- [08 — Routing وResource Routes](#ch08)
- [09 — Middleware](#ch09)
- [10 — Controllers وRequest](#ch10)
- [11 — Blade والقوالب](#ch11)
- [12 — Validation وForm Requests](#ch12)
- [13 — Sessions وCookies وCSRF](#ch13)

### الجزء الثالث: قواعد البيانات والملفات

- [14 — Migrations وSchema](#ch14)
- [15 — Query Builder وTransactions](#ch15)
- [16 — Eloquent Models وCRUD](#ch16)
- [17 — Eloquent Relationships](#ch17)
- [18 — N+1 والأداء](#ch18)
- [19 — File Storage](#ch19)

### الجزء الرابع: الهوية والأمان

- [20 — Authentication](#ch20)
- [21 — Policies وGate وOwnership](#ch21)
- [22 — أمن التطبيق](#ch22)
- [23 — Error Handling وLogging](#ch23)

### الجزء الخامس: بناء الأنظمة

- [24 — Service Container وDI](#ch24)
- [25 — Service Providers وFacades](#ch25)
- [26 — Collections وHelpers](#ch26)
- [27 — Cache وRate Limiting](#ch27)
- [28 — Events وListeners](#ch28)
- [29 — Jobs وQueues](#ch29)
- [30 — Scheduler وArtisan](#ch30)
- [31 — Mail وNotifications](#ch31)
- [32 — HTTP Client](#ch32)

### الجزء السادس: APIs والاختبارات والتشغيل

- [33 — REST APIs وResources](#ch33)
- [34 — Sanctum](#ch34)
- [35 — Feature/Unit Testing](#ch35)
- [36 — Factories وSeeders](#ch36)
- [37 — Frontend وVite](#ch37)
- [38 — Localization](#ch38)
- [39 — Deployment](#ch39)
- [40 — Architecture وSOLID](#ch40)
- [41 — Advanced Ecosystem](#ch41)

### الجزء السابع: المشروع والمرجع السريع

- [42 — مشروع Student Management](#ch42)
- [43 — مقارنات مفاهيم](#ch43)
- [44 — منهج اختبار الإتقان](#ch44)
- [45 — Glossary والمصادر](#ch45)

**ملفات مساندة:** [المسار الدراسي](CURRICULUM.md) · [المختبرات العملية](PRACTICE-LABS.md) · [سجل تعلمنا السابق](OUR-LEARNING-HISTORY.md) · [التقدم](progress.md) · [بنك الأسئلة](question-bank.md) · [الأخطاء](error-log.md).

---

<a id="ch01"></a>
## 01 | شلون يشتغل الويب؟ HTTP وClient/Server  ✅

**الفكرة:** الـ **Client** هو المتصفح، والـ **Server** هو الجهاز الذي يشغّل تطبيق PHP/Laravel. بيناتهم **HTTP Request** (طلب) و**HTTP Response** (استجابة). عنوان `URL` يشير إلى مورد، وطريقة HTTP تصف نوع العملية المطلوبة.

**ليش؟** لأن فهم الطلب والرد يفسّر لك شنو يسوي `Route` و`Controller` و`View` وما معنى 403 و404 و500.

| الطريقة | الاستخدام الشائع | مثال |
|---|---|---|
| GET | قراءة / فتح صفحة | `/students` |
| POST | إنشاء | إرسال طالب جديد |
| PUT/PATCH | تعديل | تحديث بيانات الطالب |
| DELETE | حذف | حذف طالب |

**مسار الطلب:** Browser → Server → `public/index.php` → Laravel boot → Middleware → Route → Controller → DB/Service → Response. ممكن المسار ينتهي باكراً إذا فشل `auth` أو `authorize`.

**Response Codes:** `200` نجاح، `201` إنشاء، `302` إعادة توجيه، `403` ممنوع، `404` غير موجود، `422` بيانات غير صالحة (شائع مع API)، `500` خطأ خادم.

**مثال:** لما تكتب `http://127.0.0.1:8000/students/5/edit`، المتصفح يطلب صفحة؛ Laravel يقرأ رقم الطالب من المسار، وبعد التحقق من الهوية والصلاحية يرد بصفحة أو `403`.

**جرّب:** افتح DevTools → Network، افتح `/students`، وحدّد `Status` و`Method`. لا تخلط `302` (رد تحويل) مع الصفحة التالية بعده.

**راجع نفسك:** ليش ما يكفي إخفاء زر تعديل لحماية رابط مباشر؟ شنو الفرق بين 403 و404؟

<a id="ch02"></a>
## 02 | PHP الأساسية: Variables, Types, Arrays, Functions  ✅

**الفكرة:** PHP لغة Server-side. المتغير يبدأ بـ `$`، وللقيم أنواع مثل `string` و`int` و`bool` و`array`. لغة PHP هي الأساس الذي يشتغل به Laravel.

```php
<?php
$name = 'Ali';
$age = 20;
$active = true;
$stages = ['First', 'Second', 'Third'];

function canEnroll(int $age, bool $active): bool
{
    return $age >= 6 && $active;
}

echo canEnroll($age, $active) ? 'Allowed' : 'Denied';
```

**شرح:** `function` تعرّف دالة قابلة لإعادة الاستخدام؛ `int $age` يحدد نوع وسيط؛ `: bool` يحدد نوع النتيجة؛ `&&` يعني تحقق الشرطين؛ `?:` هنا شرط مختصر.

```php
$students = [
    ['name' => 'Ali', 'age' => 20],
    ['name' => 'Sara', 'age' => 22],
];
foreach ($students as $student) {
    echo $student['name'];
}

var_dump(5 == '5');  // true: مقارنة مرنة
var_dump(5 === '5'); // false: القيمة والنوع مختلفان
```

**انتبه:** `===` تقارن القيمة والنوع معاً، و`==` قد تحوّل النوع. `empty('0')` ترجع `true` في PHP؛ هذا مهم في Validation اليدوي. عرّف `null` بوصفه غياب قيمة، وليس نفس `false`.

**جرّب:** اكتب دالة `isValidStage(string $stage): bool` تعتمد على `in_array($stage, $stages, true)`؛ اختبر قيمة صحيحة وغير صحيحة.

**راجع نفسك:** شنو الفرق بين Associative Array وIndexed Array؟ ليش نستخدم `return` بدل `echo` داخل دوال منطق الأعمال؟

<a id="ch03"></a>
## 03 | OOP في PHP: Class, Object, Interface, Trait  ⬜

**الفكرة:** البرمجة الكائنية **OOP** تجمع بيانات وسلوكاً داخل **Class** (قالب). الـ **Object** نسخة منه. **Property** خاصية، **Method** دالة ضمن الكائن. الـ **Constructor** يجهّز الكائن عند إنشائه.

```php
<?php
class StudentProfile
{
    public function __construct(
        public string $name,
        private int $age
    ) {}

    public function isAdult(): bool
    {
        return $this->age >= 18;
    }
}

$student = new StudentProfile('Ali', 20);
echo $student->name;
var_dump($student->isAdult());
```

**شرح:** `new` تنشئ Object. `$this` تشير للكائن الحالي. `public` متاح من الخارج، و`private` داخلي. `__construct` يُنفَّذ عند الإنشاء.

- **Inheritance:** Class ترث من أخرى بـ `extends` لإعادة استخدام/توسيع سلوكها، مثل `StudentController extends Controller`.
- **Interface:** عقد يلزم الكلاس بتوفير Methods معيّنة، دون فرض كل تفاصيل تنفيذها.
- **Abstract Class:** كلاس لا يُنشأ مباشرة وقد يعرّف وظائف/عقوداً مشتركة.
- **Trait:** مجموعة Methods قابلة للإدراج في Classes عبر `use`؛ مثال `AuthorizesRequests`.
- **Namespace / use:** تحديد الاسم المؤهّل للكلاس واستيراده لتفادي التعارض.
- **Dependency Injection:** إعطاء الكائن اعتماده من الخارج بدلاً من إنشائه بداخله؛ لاحقاً في الفصل 24.

**جرّب:** اكتب `StudentProfile` وثلاثة Objects ثم أضف Method ترجع اسم الطالب بصيغة منسّقة، وغيّر `private` إلى `public` وفسّر الفرق. لا تغيّر ملفات المشروع الحقيقي هنا.

**راجع نفسك:** ما الفرق بين Class وTrait؟ وهل `extends` هي نفسها `implements`؟

<a id="ch04"></a>
## 04 | Composer وAutoload وGit  🟡

**Composer** مدير حزم PHP؛ ينزل المكتبات ويضبط الاعتماديات في `composer.json` و`composer.lock`. **Autoload** يسمح باستعمال Classes بدون `require` يدوي لكل ملف، غالباً بمعيار PSR-4.

```powershell
php -v
composer --version
composer install
php artisan --version
```

- `composer install`: يثبت النسخ من lock file قدر الإمكان؛ مفيد عند نسخ مشروع موجود.
- `composer update`: يحدث الاعتماديات وفق القيود وقد يغيّر إصدارات كثيرة؛ لا تنفذه عشوائياً.
- `composer require vendor/package`: يضيف اعتماداً.
- `vendor/`: مكتبات مُثبّتة، عادةً لا تُرفع إلى Git.
- `git status`, `git diff`, `git add`, `git commit`: لتتبع تغييراتك ورجوعك الآمن.

**بيئتك:** مشروعنا على Windows/XAMPP. سبق ظهرت مشاكل `PATH` و`mbstring` بسبب تعدد نسخ PHP؛ نفحص بالترتيب `where.exe php`، `php -v`، `php --ini`، و`php -m`. لا نفترض أن PHP المستخدم في Terminal هو نفسه الذي يستخدمه Apache.

**جرّب:** اقرأ `composer.json` وحدّد Laravel وإصدار PHP المطلوب من دون تعديله، ثم `git status` وحدّد الملفات المتغيرة.

**راجع نفسك:** ليش نحافظ على `composer.lock`؟ وهل `php artisan` يعمل إذا `vendor/` مفقود؟

<a id="ch05"></a>
## 05 | SQL وقواعد البيانات العلائقية وPDO  ✅

**قاعدة البيانات Database** تضم جداول. **Primary Key** يميّز سجل، و**Foreign Key** يربط جدولاً بآخر. **Constraint** قيد يمنع حالات غير سليمة، مثل `UNIQUE` للبريد.

```sql
SELECT id, name FROM students WHERE stage = 'First';
INSERT INTO students (name, email, age, stage)
VALUES ('Ali', 'ali@example.test', 20, 'First');
UPDATE students SET age = 21 WHERE id = 1;
DELETE FROM students WHERE id = 1;
```

**CRUD:** Create/Read/Update/Delete = إنشاء/قراءة/تعديل/حذف. **JOIN** تجمع بيانات جدولين وفق علاقة. **Index** يسرّع استعلامات مناسبة مقابل كلفة كتابة/تخزين. **Transaction** تنفذ تغييرات متعددة كوحدة تنجح أو تُلغى.

```php
// PHP عادي، خارج Laravel؛ مثال تعليمي
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
```

**شرح:** `prepare()` ينشئ SQL بموضع للمدخل، `execute()` يمرر القيمة بشكل منفصل؛ هذه طريقة أساسية للحد من SQL injection. في Laravel نستخدم Eloquent أو Query Builder بدلاً من كتابة PDO في كل Controller.

**جرّب:** ارسم الجداول `users` و`students`، اربط `students.user_id` بـ `users.id`، ثم حدّد هل العلاقة One-to-Many أو One-to-One.

**راجع نفسك:** شنو يصير لو شغّلنا `UPDATE` بلا `WHERE`؟ ليش `UNIQUE` ما يكفي بدلاً عن Validation؟

---

<a id="ch06"></a>
## 06 | تثبيت Laravel 12 والبيئة وملف .env  ✅

**المتطلبات:** إصدار PHP متوافق (Laravel 12 يحتاج PHP 8.2+)، Composer، إضافات PHP المطلوبة، وقاعدة بيانات. Node/Vite لتطوير الواجهة.

```powershell
php -v
composer --version
composer create-project laravel/laravel demo-app "^12.0"
cd demo-app
php artisan serve
```

**هذه الأوامر لمشروع تجريبي منفصل**؛ لا تنشئ `demo-app` داخل مشروعك الحالي إن لم تكن تقصد ذلك. **Artisan** أداة أوامر Laravel. `php artisan serve` يشغّل سيرفر تطوير وليس بيئة إنتاج.

`.env` يحتوي إعدادات خاصة بالبيئة، مثل `APP_ENV`, `APP_DEBUG`, `DB_CONNECTION`. لا تنشر `.env` ولا مفاتيح الدخول. `config/` يقرأ القيم عند تجهيز التطبيق، ويفضل استخدام `config()` في كود التطبيق بدلاً من `env()` مباشرة خارج ملفات الإعدادات.

```dotenv
APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
```

هذا مثال تعليمي فقط؛ إعداد قاعدة مشروعك الفعلي قد يختلف، ولا تغيّره بدون مراجعة.

**جرّب:** `php artisan about`، و`php artisan config:show database` (احذر من مشاركة إعدادات تحتوي أسراراً). قارن `php -v` و`php artisan --version`.

**راجع نفسك:** لماذا `APP_DEBUG=true` غير مناسب في الإنتاج؟ ما الفرق بين `.env` و`config/database.php`؟

<a id="ch07"></a>
## 07 | بنية المجلدات وRequest Lifecycle  ✅

**الفكرة:** Laravel يقسم المسؤوليات، فلا نضع كل الكود في ملف واحد. **MVC** = Model (بيانات) + View (واجهة) + Controller (تنسيق الطلب)، مع خدمات إضافية.

| المسار | الوظيفة |
|---|---|
| `routes/web.php` | مسارات صفحات المتصفح |
| `app/Http/Controllers/` | Controllers |
| `app/Models/` | Models |
| `resources/views/` | ملفات Blade |
| `database/migrations/` | بنية الجداول |
| `app/Policies/` | قواعد الصلاحيات |
| `bootstrap/app.php` | إعدادات الإقلاع وتسجيل المسارات والـ middleware في الهيكل الحديث |
| `storage/logs/` | سجلات الأخطاء |
| `public/` | نقطة الدخول والملفات العامة |
| `tests/` | الاختبارات |

**مسار مثال:** يدخل `/students` → Route يوصل `StudentController@index` → الـ Controller يستعلم `Student::paginate(5)` → Blade تعرض النتائج → Response ترجع HTML. الـ Middleware قد يمنع الطلب قبل الوصول إلى Controller.

**جرّب:** افتح `routes/web.php` وموديل `Student` وView `students/index.blade.php` وارسم الأسهم بينها على ورقة.

**راجع نفسك:** وين نحط شرط ملكية الطالب؟ ليش ما نخلي SQL مباشرة بصفحة Blade؟

<a id="ch08"></a>
## 08 | Routing وResource Routes وRoute Model Binding  ✅

**Route** تربط Method + URL بفعل. **Named Route** اسم ثابت نستعمله بدل كتابة رابط يدوياً. **Route Model Binding** يحوّل قيمة مثل `{student}` إلى Model إذا أمكن العثور عليه.

```php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
});
```

يولّد Resource routes شائعة: `index/create/store/show/edit/update/destroy`. مثال عملي: `GET /students/{student}/edit` → `edit(Student $student)`؛ عدم وجود الطالب يؤدي عادةً إلى 404.

```php
$url = route('students.edit', $student);
// route('students.index') -> رابط جدول الطلاب
```

**أسماء Parameter مهمة:** `{student}` في Route يطابق `$student` عند implicit binding. `Route::get()` لقراءة، `Route::post()` للإرسال، ويمكن تقييد مدخلات المسار بـ `whereNumber`.

**جرّب:** `php artisan route:list --path=students`، ثم اكتب اسم Route الخاص بـ POST لإنشاء طالب وRoute حذف طالب.

**راجع نفسك:** الفرق بين `students.create` و`students.store`؟ وهل Route Model Binding بحد ذاته يفحص ملكية السجل؟ (لا).

<a id="ch09"></a>
## 09 | Middleware: بوابات الطلب  ✅

**Middleware** طبقة تمر عبرها الطلبات قبل/بعد الوصول للكود المستهدف. مثل `auth` للتأكد من تسجيل الدخول و`verified` للتحقق من البريد في المسارات المعنية.

```php
Route::middleware(['auth'])->group(function () {
    Route::resource('students', StudentController::class);
});
```

**فروق مهمة:** `auth` يحدد أنك مسجّل؛ **Policy** تقرر هل يحق لك تعديل *هذا* الطالب. المستخدم المسجّل قد يُمنع من تعديل سجل غيره.

**Custom Middleware:** يُستخدم لقواعد عامة على الطلبات؛ في Laravel 12 ضبط الاختصارات (aliases) وتجميع Middleware يتم عادةً عبر `bootstrap/app.php`. لا تنقل تعليمات Laravel 9 التي تعتمد على `Http/Kernel.php` كما هي دون فحص الإصدار.

**جرّب:** افتح صفحة الطلاب بدون تسجيل، راقب التحويل إلى login. ثم سجّل دخول مستخدم غير مالك وجرب رابط edit لسجل آخر (على بيانات تدريبية): المتوقع 403 إذا Policy مطبقة.

**راجع نفسك:** ليش فحص `auth` وحده لا يحمي الملكية؟ ومتى يفضّل Middleware على Policy؟

<a id="ch10"></a>
## 10 | Controllers وRequest وResponses  ✅

**Controller** ينظم معالجة طلب. **Request** يمثل البيانات الواردة. **Response** ما سيرجع للمتصفح: View أو Redirect أو JSON وغيرها.

```php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query()->paginate(5);
        return view('students.index', compact('students'));
    }
}
```

**شرح:** `Student::query()` يبني استعلاماً. `paginate(5)` يجلب صفحة من خمسة سجلات تقريباً. `view()` يعرض قالباً ويمرر له البيانات. `compact('students')` تنشئ مصفوفة `['students' => $students]`.

**Redirect** ليس View: `return redirect()->route('students.index')` يخبر المتصفح بطلب رابط جديد. `response()->json(['ok' => true])` يعيد JSON بدلاً من صفحة.

**جرّب:** تتبع في مخطط: `Route` → `index()` → `Student` → `students.index`؛ اشرح دور كل جزء بلا نسخ.

**راجع نفسك:** `edit()` ماذا تعرض؟ و`update()` ماذا تنفذ؟ ليش يفضّل Controller خفيف بدل كود متضخم؟

---
<a id="ch11"></a>
## 11 | Blade: القوالب، Components، Layouts  ✅

**الفكرة:** Blade هو **Template Engine** (محرّك قوالب) يحوّل صفحات `.blade.php` إلى HTML. الـ **Layout** هيكل مشترك، والـ **Component** قطعة واجهة قابلة لإعادة الاستخدام. Blade مو بديل عن حماية Controller؛ وظيفته العرض.

**ليش نحتاجه؟** صفحة الطلاب والتعديل والعرض كلها تتشارك التنقل والألوان؛ بدل تكرار HTML نعزل الهيكل. نصوص المستخدم تظهر بالهروب التلقائي `{{ }}`، بينما `{!! !!}` تطبع HTML غير مفلتر ويُفضّل تجنبها للمدخلات.

```blade
{{-- resources/views/students/index.blade.php : مثال تعليمي --}}
<x-app-layout>
    <x-slot name="header"><h2>Students</h2></x-slot>
    <h1>{{ $pageTitle }}</h1>
    @forelse ($students as $student)
        <div>{{ $student->name }}</div>
        @if (auth()->user()?->can('update', $student))
            <a href="{{ route('students.edit', $student) }}">Edit</a>
        @endif
    @empty
        <p>No students</p>
    @endforelse
    {{ $students->links() }}
</x-app-layout>
```

**فكك المثال:** `x-app-layout` يتوقع **Component layout** مناسباً، و`x-slot` يرسل محتوى المنطقة المسماة `header`؛ `@forelse` تكرر، ومع خلو القائمة تنفّذ `@empty`. `route()` ينشئ رابطاً بحسب اسم Route. `links()` يعرض pagination. يمكن كتابة `@can('update', $student)` بدلاً من شرط `can()`.

**مشكلتنا السابقة:** لو ملف `layouts/app.blade.php` يستعمل `{{ $slot }}` وهو مستدعى على أنه Layout عادي عبر `@extends` فقد يظهر `Undefined variable $slot`. الحل هو **اختيار نمط واحد متسق**: Component بـ `<x-app-layout>` أو Layout بـ `@extends('layouts.app')` ثم `@section`/`@yield`. لا نخلطهما دون تصميم.

**جرّب:** افتح View تبع show وحدد أين الـ Layout، وأين الـ Slot/Section، ثم جرّب عرض اسم يحمل `<b>` كنص وتحقق أن `{{ }}` لا ينفذ HTML.

**اختبار:** شنو الفرق بين `@csrf` و`@method`؟ ليش `@can` وحده غير كافٍ؟ متى تختار Component بدل تكرار HTML؟

<a id="ch12"></a>
## 12 | Validation وForm Request  ✅ / ⬜

**الفكرة:** **Validation** قواعد تتحقق من بيانات الطلب؛ **Form Request** صنف يجمع قواعد التحقق والتفويض في ملف مستقل. التحقق مو نفسه التفويض: قد يكون البريد صحيحاً لكن المستخدم غير مالك السجل.

**مثال من مشروعنا:**

```php
use Illuminate\Validation\Rule;

$validated = $request->validate([
    'name' => ['required', 'string', 'min:3', 'max:255'],
    'age' => ['required', 'integer', 'between:1,100'],
    'stage' => ['required', Rule::in(['First','Second','Third','Fourth'])],
    'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($student->id)],
    'image' => ['nullable', 'image', 'max:2048'],
]);
```

`required`: لازم قيمة. `integer`: عدد صحيح. `between`: حدان. `Rule::in`: ضمن قائمة. `unique()->ignore($student->id)`: باستثناء الطالب الجاري عند تحديث بريده؛ **لا تمرر قيمة ID خاضعة لتحكم المستخدم دون تحقق** بل استخدم الـ Model المستخرج من Route Model Binding. `nullable`: غياب الملف مقبول. `image` و`max:2048`: التحقق من صورة والحجم بالكيلوبايت، ولا يغني عن إعداد تخزين آمن.

**Form Request:**

```bash
php artisan make:request UpdateStudentRequest
```

```php
// app/Http/Requests/UpdateStudentRequest.php (مقتطف تعليمي)
public function authorize(): bool
{
    return $this->user()?->can('update', $this->route('student')) ?? false;
}

public function rules(): array
{
    return ['name' => ['required', 'string', 'min:3']];
}
```

**بالتنفيذ:** إذا فشل التحقق في طلب Web معتاد يرجع Redirect مع أخطاء وقيم سابقة؛ مع API يستعمل Laravel غالباً HTTP 422. في Blade: `old('name')` و`@error('name')`. `validated()` يعيد الحقول التي اجتازت التحقق؛ لا تخلطها مع `$request->all()`.

**تحذير:** لا تعتمد على قواعد Validation لتوليد `user_id`؛ خذه من حساب المصادق عليه عند الإنشاء. Form Request المذكور **مستقبلي** ولم نثبت أننا استعملناه فعلياً.

**جرّب:** جرّب اسم حرفين، بريد طالب آخر، صورة أكبر من المسموح؛ دوّن ماذا يحدث وكيف تظهر الأخطاء. **اختبار:** ماذا يفعل `ignore`؟ لماذا `required` لا تساوي `filled`؟ وهل `validated` يحمي من التلاعب بالمالك تلقائياً؟

<a id="ch13"></a>
## 13 | Sessions وCookies وCSRF  ✅

**الفكرة:** HTTP بطبيعته Stateless (الطلب لا يحمل ذاكرة جلسة بذاته). **Session** بيانات تحتفظ بها جهة الخادم بربط مع متصفح، و**Cookie** قيمة يرسلها المتصفح مع الطلبات. CSRF هجوم يجعل المتصفح يرسل طلباً غير مرغوب إلى موقع لديه جلسة نشطة؛ رمز CSRF يتحقق من شرعية إرسال النموذج.

```blade
<form method="POST" action="{{ route('students.store') }}">
    @csrf
    <input name="name" value="{{ old('name') }}">
    @error('name')<small>{{ $message }}</small>@enderror
    <button type="submit">Save</button>
</form>
```

**ليش مهم؟** تسجيل الدخول يشغل الجلسة، و`@csrf` يضيف رمزاً داخل النموذج. فرق أساسي: CSRF لا يمنح إذن تعديل الطالب؛ الصلاحية تُفحص بالـ Policy. و`old()` جزء من تجربة المستخدم وليس مصدراً موثوقاً للحفظ.

```php
session()->flash('status', 'Student created successfully');
return redirect()->route('students.index');
```

`flash` رسائل قصيرة تظهر في الطلب التالي. لتجنب كشف معلومات حساسة لا تخزن كلمات مرور أو أسراراً في Session/Logs دون ضرورة.

**جرّب:** أرسل نموذجاً بلا `@csrf` في بيئة اختبار منفصلة، ثم أرجع الرمز؛ راقب أثر Middleware. **سؤال:** ما الفرق بين تسجيل الدخول والتحقق من وجود إذن على سجل واحد؟

<a id="ch14"></a>
## 14 | Migrations وSchema وIndexes  ✅

**Migration** ملف PHP يصف تعديل **Schema** (بنية قاعدة البيانات) بطريقة قابلة لإعادة التشغيل والتراجع بضوابط. **Index** فهرس يساعد الاستعلامات، لكنه قد يزيد كلفة التحديث والتخزين. الـ **Foreign Key** علاقة مرجعية تحافظ على سلامة البيانات.

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedTinyInteger('age');
            $table->string('stage');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('students'); }
};
```

**شرح:** `up()` ينشئ البنية و`down()` يعكسها. `foreignId()->constrained()` يرتبط غالباً بالمفتاح `id` في جدول `users`. `cascadeOnDelete()` يحذف السجلات التابعة عند حذف المستخدم، **وهو قرار تصميم لا تفترضه مناسباً لكل تطبيق**. مثال الدراسة ممكن يختلف عن Migration الحقيقية.

```bash
php artisan migrate:status
php artisan make:migration add_phone_to_students_table --table=students
php artisan migrate
```

لا تطبّق `migrate:fresh` على بيانات مهمة: يحذف جميع الجداول ثم يعيد إنشائها. استخدم نسخاً احتياطية، وراجع Migration قبل تشغيلها.

**جرّب:** ارسم Schema يضم `users`, `students`, `cards`, `books`, `courses`, `course_student`. حدد One-to-One / One-to-Many / Many-to-Many. **اختبار:** هل `unique` في Validation يعوّض `unique index` في DB؟ لا؛ الأفضل الاثنين لأسباب مختلفة.

<a id="ch15"></a>
## 15 | Query Builder وTransactions وRaw SQL  📘 / ⬜

**Query Builder** واجهة تبني استعلامات SQL عبر PHP بدون كتابة كل النص يدوياً؛ **Transaction** مجموعة عمليات تنجح كلها أو تفشل كلها (Atomicity) عند دعم المحرك.

```php
use Illuminate\Support\Facades\DB;

$rows = DB::table('students')
    ->where('stage', 'Third')
    ->orderBy('name')
    ->limit(10)
    ->get();

DB::transaction(function () use ($student) {
    $student->update(['stage' => 'Fourth']);
    // مثال: تحديث سجل تابع مرتبط داخل نفس المعاملة عند الحاجة
});
```

**ليش؟** إذا عندك نقل طالب وتغيير بيانات مرتبطة، لا تريد تعديل الأولى وفشل الثانية. Transactions تساعد بشرط أن كافة العمليات داخلها وتستخدم اتصالاً متوافقاً.

**SQL Injection:** لا تدمج نص المستخدم مباشرة داخل SQL. استخدم Binding أو Query Builder:

```php
DB::select('select * from students where email = ?', [$email]);
```

**تنبيه:** تمرير اسم العمود غير الموثوق مباشرةً إلى `orderBy` قد يمثل خطراً؛ اسم الحقل ليس Value Binding. حدد Allowlist للأعمدة المقبولة.

**جرّب:** اكتب مكافئ SQL لـ `where('stage', 'Third')->orderBy('name')`. **سؤال:** شنو الفرق بين `get()` (Collection) و`first()` (سجل واحد/`null`)؟

<a id="ch16"></a>
## 16 | Eloquent: Models, CRUD, Scopes, Casting  ✅ / ⬜

**ORM** اختصار Object-Relational Mapper: يمثل سجلات قاعدة البيانات ككائنات PHP. **Eloquent Model** صنف يحدد جدولاً وعلاقات وعمليات على السجلات. **Mass Assignment** تعيين مجموعة حقول دفعة واحدة باستخدام `create()`/`update()`.

```php
class Student extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = ['name', 'email', 'age', 'stage', 'image', 'user_id'];
}

$student = Student::findOrFail(5);
$student->update(['stage' => 'Fourth']);
$students = Student::where('stage', 'Third')->latest()->paginate(5);
```

`findOrFail` يرجع السجل أو 404. `update` يحفظ تغييرات الحقول المسموحة؛ لكن وجود `user_id` في `$fillable` يتطلب **عدم تمرير ملكية مصدرها Request مباشرةً**. لتحديد مالك السجل استخدم `$request->user()->id` عند الإنشاء.

**Accessor/Mutator/Casts:** تحويل قيمة عند قراءتها أو حفظها. **Scope** يعيد منطق استعلام متكرر.

```php
// داخل Model
protected function casts(): array { return ['age' => 'integer']; }

public function scopeInStage($query, string $stage)
{
    return $query->where('stage', $stage);
}
// الاستعمال: Student::inStage('Third')->get();
```

**Query vs Collection:** قبل `get()` أو `paginate()` تبني Query؛ بعد `get()` عادةً لديك Collection في الذاكرة. انتبه إلى الأداء وعدد الصفوف.

**جرّب:** جرّب في Tinker على قاعدة تدريبية `Student::where('stage','First')->count()`؛ **سؤال:** ليش `all()` مع آلاف الطلاب أقل مناسبة من `paginate()`؟

<a id="ch17"></a>
## 17 | Eloquent Relationships من One-to-One إلى Polymorphic  ✅ / ⬜

**Relationship** تربط نموذجين دون كتابة JOIN يدوي كل مرة. الـ **Foreign Key** يحدد المرجع. في مشروعنا: الطالب لديه Card واحد، Books متعددة، Courses عديدة بعلاقة Pivot، ويتبع User.

```php
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasOne, HasMany, BelongsToMany};

// داخل Student Model:
public function user(): BelongsTo { return $this->belongsTo(User::class); }
public function card(): HasOne { return $this->hasOne(Card::class); }
public function books(): HasMany { return $this->hasMany(Book::class); }
public function courses(): BelongsToMany { return $this->belongsToMany(Course::class); }
```

**السطر المهم:** `belongsTo(User::class)` يفترض عادةً `students.user_id`. `hasMany(Book::class)` يفترض `books.student_id`. `belongsToMany` يفترض Pivot باسم `course_student` مع `course_id` و`student_id` وفق التسمية الافتراضية.

```php
$student->courses()->sync([1, 3]); // استبدال الروابط بالقائمة المحددة
$student->courses()->syncWithoutDetaching([4]); // أضف رابطاً دون فصل الموجود
$student->courses()->attach(2);  // احذر التكرار / قيد uniqueness
$student->courses()->detach(3);
```

**مهم:** `sync([])` قد يزيل جميع روابط الطالب. لا تقبَل IDs مستخدم دون Validation لصلاحيتها وملاءمتها. `courses()` يعيد Relationship/Query، لكن `$student->courses` يعيد النتائج المحملة.

**علاقات متقدمة (للمستقبل):** `hasManyThrough` للوصول عبر جدول وسيط، و`morphMany`/`morphTo` للعلاقات متعددة الأنواع **Polymorphic**؛ مثال تعليقات قد تتبع طالباً أو كتاباً عبر `commentable_type/id`. لا تبدأ بهذه قبل ضبط العلاقات الأربع الأساسية.

**جرّب:** ارسم الجداول والمفاتيح، ثم تتبع أي SQL متوقع عند طلب `$student->books`. **اختبار:** شنو الفرق بين `sync`, `attach`, `detach`؟ وليش Pivot يحتاج مفتاحين؟

<a id="ch18"></a>
## 18 | N+1 وEager Loading وPagination والأداء  ✅ / 📘

**N+1 Problem:** تجلب قائمة طلاب باستعلام واحد، ثم تنفذ استعلاماً منفصلاً لكل طالب عندما تعرض مالكه. مئة طالب ممكن يعني 101 استعلام أو أكثر. **Eager Loading** تحميل العلاقات مقدماً لتقليل عدد الاستعلامات.

```php
// أفضل لجدول الطلاب عند الحاجة لاسم المالك والبطاقة:
$students = Student::with(['user', 'card'])->paginate(5);

// معلومات عدد الكتب دون تحميلها كلها:
$students = Student::withCount('books')->paginate(5);

// إذا جلبت السجل مسبقاً:
$student->load(['user', 'card', 'books', 'courses']);
```

**فروق:** `with()` قبل جلب Models، `load()` بعد جلبها، `withCount()` يضيف `books_count`. `paginate(5)` يستعلم عن الصفحة وعدد الصفوف عادةً، بينما `simplePaginate()` يقلل بعض العمل عندما لا تحتاج عدد الصفحات.

**الأداء مو فقط عدد Query:** راقب Indexes وأعمدة SELECT وحجم البيانات؛ لا تستعمل `all()` على جدول ضخم. تعلم قراءة `EXPLAIN` لاحقاً وتجنّب افتراض أن تحسيناً معيناً أسرع بدون قياس.

**جرّب:** قارن صفحة الطلاب قبل وبعد `with` باستخدام Laravel Debug tools المتاحة محلياً أو `DB::listen` في بيئة تطوير. **اختبار:** هل `@can` في Loop قد يسبب استعلامات إضافية إذا Policy تصل لعلاقات غير محملة؟ نعم، بحسب كود Policy.

<a id="ch19"></a>
## 19 | File Storage ورفع الصور  ✅

**Storage Disk** اسم مساحة التخزين المنطقية في Laravel. الـ `public` disk معد للملفات المنشورة؛ ربط `storage:link` يجعل ملفات `storage/app/public` قابلة للعرض من `public/storage` في الإعدادات المعتادة.

```php
$validated = $request->validate([
    'image' => ['nullable', 'image', 'max:2048'],
]);

if ($request->hasFile('image')) {
    $path = $request->file('image')->store('students', 'public');
    $student->update(['image' => $path]);
}
```

**عرض الصورة:**

```blade
@if ($student->image)
    <img src="{{ asset('storage/' . $student->image) }}" alt="Student image">
@endif
```

**تحديث الصورة:** حفظ الجديدة ثم تحديث DB والتعامل مع حذف القديمة بحذر؛ لا تحذف القديمة قبل ضمان نجاح الجديدة. عمليات Filesystem وDB ليست Transaction واحدة افتراضياً، ففكّر بحالات فشل أي خطوة. عند الحذف استخدم `Storage::disk('public')->delete($student->image)` بعد التأكد من سياسة الصلاحية وأن المسار صادر من النظام. لا تحفظ أصل اسم الملف من المستخدم دون تنقية.

```bash
php artisan storage:link
```

**تحذير:** الملفات الحساسة مثل وثائق الهوية لا توضع في `public` بلا مبرر. **جرّب:** اختبر ملفاً غير صورة، وصورة جديدة، وصورة قديمة محذوفة، وعرض الملف بعد تحديث الصفحة. **سؤال:** شنو الفرق بين `asset()` و`Storage::url()`؟

<a id="ch20"></a>
## 20 | Authentication وPassword Hashing وEmail Verification  ✅ / ⬜

**Authentication** سؤال «من أنت؟»؛ **Authorization** سؤال «مسموح لك شتسوي؟». Laravel يدير الجلسة والمستخدم عبر Guards، وتستطيع معرفة المستخدم الحالي بواسطة `$request->user()` أو `Auth::user()` و`Auth::id()`.

```php
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
});

// داخل Controller عند إنشاء سجل:
$validated = $request->validate(['name' => ['required','string']]);
$validated['user_id'] = $request->user()->id;
Student::create($validated);
```

**شرح:** `auth` يمنع الضيف، لكنه لا يضمن ملكية كل طالب. `user_id` ناتج من هوية خاضعة لخادم المصادقة، لا من حقل HTML يرسله العميل.

**Hashing:** لا تحفظ Password كنص عادي. `Hash::make($password)` يولد Hash وتتحقق بواسطة `Hash::check($entered, $storedHash)`؛ الـ Hash ليس تشفيراً قابلاً للاستعادة. أدوات Starter Kits تعالج النماذج والجلسات بشكل موحد ولا نكتب نظام تسجيل دخول خاصاً بلا داعٍ.

**Verified:** Middleware `verified` لا يعمل كشرط دائم لكل صفحة؛ يلزم وضعه على المسارات المراد تقييدها، ووجود إعدادات التحقق الملائمة.

**جرّب:** افتح `/students` كضيف، ثم بعد تسجيل الدخول، وقارن الاستجابة؛ **سؤال:** هل `email_verified_at = null` يمنع تلقائياً `students.index` إذا عليها `auth` فقط؟ لا.

<a id="ch21"></a>
## 21 | Policies وGate وOwnership: درسنا المحوري  ✅ / 🟡

**Policy** صنف يضم قواعد السماح على مورد مثل `Student`. **Ability** اسم الفعل مثل `view`, `create`, `update`, `delete`. **Gate** واجهة للتحقق من القرار. الـ Policy **لا تحفظ السجل ولا تعدله**؛ هي فقط تقرر الأهلية.

```php
// app/Policies/StudentPolicy.php — مثال تعليمـي مبسّط
use App\Models\Student;
use App\Models\User;

public function update(User $user, Student $student): bool
{
    return $user->id === $student->user_id;
}

public function delete(User $user, Student $student): bool
{
    return $user->id === $student->user_id;
}
```

`$user` هو المستخدم الجاري فحصه و`$student` السجل المستهدف. المقارنة `===` صارمة؛ IDs الصحيحة داخل Eloquent المعتاد أعداد صحيحة، لكن لو ظهر اختلاف نوع راجع Casts بدل تعميم تغييرات عشوائية.

```php
// داخل Controller، قبل تعديل أو حذف السجل:
$this->authorize('update', $student);
$student->update($validated);

// في Blade لإخفاء الزر فقط:
@can('update', $student)
  <a href="{{ route('students.edit', $student) }}">Edit</a>
@endcan
```

**التفريق:** `Gate::forUser($user)->allows('update', $student)` يرجع Boolean للفحص بدون تعديل. `Gate::authorize(...)` و`$this->authorize(...)` يفرضان القرار وعند الرفض يوقفان الطلب غالباً بـ 403؛ قد تحتاج Trait `Illuminate\Foundation\Auth\Access\AuthorizesRequests` مع بعض التكوينات من Controller الأساسي. `@can` يخفي واجهة لكنه لا يحمي الرابط المباشر؛ لذلك نفحص `edit`, `update`, `destroy` في Controller.

### Policy::before() — قيد إتقان

```php
public function before(User $user, string $ability): ?bool
{
    if ($user->is_blocked) {
        return false; // رفض شامل أولاً حسب سياسة مثالنا
    }

    if ($user->is_admin) {
        return true;  // سماح شامل للمشرف غير المحظور
    }

    return null; // تابع إلى method الخاصة بالفعل
}
```

| حالة المستخدم | قيمة before | هل تصل إلى update/delete؟ |
|---|---|---|
| Blocked | `false` | لا؛ رفض |
| Admin وغير Blocked | `true` | لا؛ سماح |
| عادي | `null` | نعم، تذهب لقرار الدالة |
| Admin + Blocked | `false` لأن blocked أولاً | لا؛ رفض |

**تفصيلة دقيقة من Laravel 12:** `before()` في **Policy** لا تُستدعى إذا الصنف لا يحتوي دالة بنفس اسم الـ Ability الجاري فحصها. لذلك لا تفترض أنها تسمح بقدرة غير موجودة في Policy. كذلك `Gate::allowIf()` / `Gate::denyIf()` هو **Inline authorization** وله سلوك مختلف تجاه hooks. مصدر رسمي: https://laravel.com/docs/12.x/authorization

**معلومة مشروعك:** `is_admin` و`is_blocked` في هذا المثال **حقول افتراضية لأغراض الدرس** حتى نراجع الـ Model/Migrations ونتأكد قبل استخدامها فعلياً.

**جرّب من Tinker (فحص فقط):**

```php
use App\Models\{User,Student};
use Illuminate\Support\Facades\Gate;
$user1 = User::findOrFail(1);
$user2 = User::findOrFail(2);
$student = Student::findOrFail(5);
Gate::forUser($user1)->allows('update', $student);
Gate::forUser($user2)->allows('update', $student);
```

هذه IDs **أمثلة من سجل اختبار سابق** وقد تتغير؛ تحقق من وجود بياناتك الحالية. لا تختبر بالحذف الفعلي. **اختبار:** ماذا يحصل عند تبديل ترتيب `admin` و`blocked`؟ ما الفرق بين فحص `view` و`viewAny`؟ لماذا يجب التفويض قبل الحفظ؟

<a id="ch22"></a>
## 22 | Security: طبقات الحماية في تطبيق Laravel  📘 / ⬜

**Security** ليست دالة واحدة؛ هي طبقات. تحقّق من الهوية، والصلاحيات، والمدخلات، وإخراج HTML، والاستعلامات، والملفات، والإعدادات. مبدأ **Least Privilege**: اسمح بأقل عمليات يحتاجها المستخدم.

| موضع | الخطر | الإجراء |
|---|---|---|
| Routes | ضيف يصل لصفحة خاصة | `auth` middleware |
| Controller / Policy | مستخدم يغيّر ID بالعنوان | `authorize` على السجل الحقيقي |
| Store | تزوير `user_id` | اشتقه من المستخدم المصادق عليه |
| Query | إدخال SQL ضار | Query Builder / binding |
| Blade | XSS | `{{ }}` وتجنّب إخراج HTML غير موثوق |
| Form | CSRF | `@csrf` ومسارات وسيطة مناسبة |
| Upload | ملفات غير مرغوبة | تحقّق من النوع والحجم وخزنها بالـ Disk الصحيح |
| Production | تسريب تفاصيل | `APP_DEBUG=false` وحماية `.env` |

**مهم:** HTTP 403 يعني أن الخادم رفض وصولاً، لكن **ليس دليلاً وحيداً** على اكتمال حماية كل Routes؛ فحص `show()` و`index()` وسياسات عرض البيانات كذلك. إخفاء رابط ليس آلية أمنية.

**جرّب:** اكتب Test matrix بالأدوار (Guest / Owner / Non-owner / Admin / Blocked) مقابل (index / show / edit / update / delete) وحدد استجابة متوقعة وفق سياسات مشروعنا **المقرّرة** لا المفترضة. **سؤال:** ما الفرق بين حماية واجهة وبين حماية عملية بالخادم؟

<a id="ch23"></a>
## 23 | Error Handling وLogging وDebugging  ✅ / ⬜

**Exception** مشكلة أثناء التنفيذ؛ **Stack Trace** سلسلة الاستدعاءات المؤدية للمشكلة؛ **Log** سجل يشخص ما حدث. لا تخلط بين «خطأ برمجي» (500) ورفض مقصود (403).

```bash
php -l app/Http/Controllers/StudentController.php
php artisan route:list
php artisan about
php artisan optimize:clear
```

`php -l` يفحص صياغة PHP، وليس صحة منطق الصلاحيات. `route:list` يعرض المسارات المسجلة، `about` يعرض بيئة المشروع، و`optimize:clear` يزيل ملفات Cache الخاصة بالتطبيق؛ استخدمه عند مشاكل الإعدادات/المسارات المؤقتة.

**تجارب حقيقية من مشروعنا:** ظهر خطأ Parse بعد حرف غير ظاهر بجوار `edit(Student $student)`؛ فحص Syntax ساعد. وظهر نقص `AuthorizesRequests` في base Controller عند استدعاء `$this->authorize()`، ثم 403 كان رفضاً متوقعاً لحساب غير مالك. وظهر `$slot` بسبب عدم تطابق نمط Layout/Component.

**منهج حل الخطأ:** 1) انسخ النص الكامل مع السطر. 2) حدد الملف. 3) أعد إنتاجه. 4) اقترح سبباً واحداً. 5) جرّب تغييراً صغيراً. 6) أعد الاختبار. 7) سجّل السبب والحل في `error-log.md`.

**تحذير:** لا تنسخ `.env` وكلمات المرور والسجلات التي تحتوي معلومات شخصية إلى المحادثة أو Git. **اختبار:** ما الفرق بين `ParseError` و`AuthorizationException`؟

<a id="ch24"></a>
## 24 | Service Container وDependency Injection وContracts  ⬜

**Service Container** مدير ينشئ Objects ويوصل تبعياتها تلقائياً. **Dependency Injection (DI)**: بدلاً من أن تنشئ الدالة كل ما تحتاجه داخلياً، يُمرَّر لها ما تعتمد عليه. **Contract/Interface** يحدد ما يجب تنفيذه دون ربط الكود بتطبيق واحد.

```php
interface StudentNotifier
{
    public function notify(int $studentId): void;
}

class LogStudentNotifier implements StudentNotifier
{
    public function notify(int $studentId): void
    {
        logger()->info('Student updated', ['student_id' => $studentId]);
    }
}
```

داخل Service Provider يمكن الربط هكذا:

```php
$this->app->bind(StudentNotifier::class, LogStudentNotifier::class);
```

ثم:

```php
public function __construct(private StudentNotifier $notifier) {}
```

**ليش يهم؟** لو تغيرت طريقة الإشعار من Log إلى Email، لا تغير كل Controller. في الاختبارات تستبدل التطبيق بنسخة Fake. **توضيح:** هذا نمط مستقبلي؛ مشروعك لا يحتاج طبقات واجهات لكل عملية CRUD صغيرة.

**جرّب:** اشرح ما يحدث عندما يطلب Laravel كائناً يعتمد على `StudentNotifier`، ولماذا Bind يختلف عن كتابة `new LogStudentNotifier()` في كل مكان. **اختبار:** هل Dependency Injection يعني استخدام Facade؟ لا؛ أسلوبان مختلفان للوصول لخدمات.

<a id="ch25"></a>
## 25 | Service Providers وFacades وHelpers  ⬜

**Service Provider** مكان تسجيل الخدمات وتهيئتها في التطبيق. **Facade** واجهة Static-looking للوصول لخدمة عبر Container؛ مثال `Cache::get()`, `DB::transaction()`, `Gate::allows()`، وهي ليست static عادية بالمعنى الدقيق.

```php
use Illuminate\Support\Facades\Cache;

$stages = Cache::remember('student-stages', 600, function () {
    return ['First', 'Second', 'Third', 'Fourth'];
});
```

**شرح:** أول طلب ينفذ Closure ويحفظ الناتج 600 ثانية؛ الطلبات اللاحقة قد تعيد المخزون حتى انتهاء المدة، بحسب الـ Store. Cache بيانات قابلة للإعادة وليست قاعدة بيانات مرجعية.

**متى أتجنب Facade؟** إذا كان الاعتماد معقداً وتريد عقوداً واضحة واختباراً معزولاً، استخدم DI. **جرّب:** حدد 3 Facades استخدمناها بالفعل (`Auth`, `Gate`, `Storage`) واكتب الخدمة المقابلة لها بعبارة واحدة. **سؤال:** متى نستخدم `register()` ومتى `boot()` في Service Provider؟

<a id="ch26"></a>
## 26 | Collections وHelpers: التعامل المنظم مع البيانات  ⬜

**Collection** كائن يوفر وظائف للتعامل مع مجموعة عناصر عبر `map`, `filter`, `pluck`, `groupBy`, `sum`. إذا حصلت على `Student::get()` فالنتيجة **Eloquent Collection** تحمل Models؛ أما Query Builder قبل `get` فينفذ التصفية غالباً في DB.

```php
$students = collect([
    ['name' => 'Ali', 'stage' => 'First'],
    ['name' => 'Sara', 'stage' => 'Second'],
]);

$names = $students->pluck('name');       // ['Ali','Sara']
$first = $students->where('stage', 'First');
$upper = $names->map(fn ($name) => strtoupper($name));
```

**متى أصفّي بالـ DB؟** إذا عندك آلاف الطلاب، `Student::where('stage','First')->paginate(20)` أفضل من `Student::all()->where(...)` غالباً، لأن الأخير يسحب كل الصفوف للذاكرة قبل الفلترة. `map` يحول القيم، `filter` يختار، `each` ينفذ إجراءً على كل عنصر.

**جرّب:** انشئ Collection من خمسة أسماء، استخرج الأسماء التي يزيد طولها عن 4؛ بعدها اكتب مثال Query Builder يتجنب تحميل آلاف السجلات. **اختبار:** ماذا ترجع `pluck()`؟ وهل كل Collection يجب أن تتصل بقاعدة البيانات؟

<a id="ch27"></a>
## 27 | Cache وRate Limiting  ⬜

**Cache** يخزن نتيجة مكلفة لفترة لتقليل العمل. **TTL** مدة صلاحية القيمة. **Invalidation** إبطال نتيجة قديمة عند تغير مصدرها. **Rate Limiting** يحدد عدد الطلبات خلال نافذة زمنية لتقليل الإساءة والتحميل الزائد.

```php
use Illuminate\Support\Facades\Cache;

$count = Cache::remember('students-count', now()->addMinutes(5),
    fn () => \App\Models\Student::count()
);
// بعد إنشاء/حذف طالب، إذا أردت دقة فورية:
Cache::forget('students-count');
```

**أخطاء شائعة:** وضع بيانات المستخدمين كلهم تحت نفس Key، أو حفظ صلاحية في Cache مدة طويلة بدون استراتيجية تحديث، أو اعتبار Cache مصدراً دائماً للبيانات. اختر مفاتيح واضحة، وانتبه لاختلاف Cache Driver بين Local وProduction.

**Rate Limiting:** يستعمل Laravel Limiters في أماكن مثل محاولات تسجيل الدخول أو APIs. التصور: «10 محاولات لكل مستخدم/دقيقة» لا يعني منع الإساءة تماماً؛ ادرس الـ Key وسلوك الاستجابات وبيئة Proxy.

**جرّب:** عدّد الحالات التي تجعل عدد الطلاب المخزن في Cache غير صحيح. **اختبار:** ما الفرق بين `remember` و`put` و`forget`؟

<a id="ch28"></a>
## 28 | Events وListeners وObservers  ⬜

**Event** معلومة تقول إن شيئاً حدث، مثل `StudentRegistered`. **Listener** يستجيب للحدث. **Observer** يجمع معالجات أحداث Model (مثل `created`, `updated`). هذه مفاهيم لتنظيم آثار جانبية، وليست بديلاً عن معاملة قاعدة بيانات صحيحة.

```bash
php artisan make:event StudentRegistered
php artisan make:listener SendStudentWelcome --event=StudentRegistered
```

```php
// بعد حفظ الطالب بنجاح:
event(new StudentRegistered($student));
```

**الفكرة:** الـ Controller ينشئ الطالب؛ النظام قد يحتاج لاحقاً Email أو تسجيل Audit دون ازدحام Controller. في تطبيق حقيقي يجب إنشاء Event/Listener والتأكد من Constructor وتعريف المعالجة/التسجيل. الكود هنا **تصوير لمسار الاستخدام لا ملف جاهز للنشر**.

**Observer مثال ذهني:** `StudentObserver@created` يستقبل Model عند إنشائه. احذر إدخال تعديلات تتسبب في إطلاق أحداث متسلسلة بلا قصد.

**جرّب:** اكتب 3 أحداث محتملة لمشروعنا، وحدد هل الإشعار ينبغي أن يعمل بعد نجاح DB transaction. **سؤال:** الفرق بين Event وبين Queue Job؟

<a id="ch29"></a>
## 29 | Jobs وQueues وRetries  ⬜

**Job** مهمة مستقلة مثل إرسال رسالة أو معالجة ملف. **Queue** طابور يجعل المهمة تُنفذ لاحقاً بواسطة Worker لتبقى استجابة المستخدم سريعة. هذا لا يعني وجود Background Worker تلقائياً: يجب تشغيله وإدارته في بيئة التشغيل.

```bash
php artisan make:job ExportStudentsReport
php artisan queue:work
```

```php
// مثال استدعاء بعد تعريف Job حقيقي:
ExportStudentsReport::dispatch($userId);
```

**السلوك:** `dispatch` يرسل Job بحسب إعدادات queue connection؛ إذا كان Driver `sync` فالتنفيذ فوري، لا بالخلفية. تجنب تمرير بيانات حساسة كبيرة أو كائنات غير قابلة للتسلسل في Payload. عند فشل المهمة تحدد Retries/Backoff وتراقب Failed Jobs، وتجعل المهمة قدر الإمكان **Idempotent** (إعادتها لا تكرر أثراً خطيراً).

**Transactional consistency:** لا تُرسل إشعار نجاح بعملية لم تثبت بعد؛ ادرس `afterCommit` إذا كانت المهمة تعتمد على معاملة الجداول.

**جرّب:** اشرح ماذا يحدث إذا توقف `queue:work` أو كان Connection `sync`. **اختبار:** هل `dispatch()` وحدها تضمن أن Job اكتملت؟ لا.

<a id="ch30"></a>
## 30 | Task Scheduling وArtisan Commands  ⬜

**Scheduler** يحدد مهام دورية بدلاً من إدارة Cron منفصل لكل مهمة. **Artisan Command** عملية CLI خاصة بمشروعك. مثال مناسب لاحقاً: تقرير إحصائي يومي دون أن يفتحه مستخدم يدوياً.

```bash
php artisan make:command SummarizeStudents
php artisan schedule:list
php artisan schedule:run
```

```php
// routes/console.php — بعد إنشاء الأمر المناسب
use Illuminate\Support\Facades\Schedule;
Schedule::command('students:summarize')->daily();
```

**تنبيه:** سطر `students:summarize` هنا اسم توقيع مفترض لأمر عليك تعريفه أولاً. `schedule:run` يفحص المهام المستحقة وقت التشغيل؛ في Production يشغله Cron أو خدمة جدولة مناسبة، وغالباً مرة في الدقيقة للمهام بالدقائق.

**مقارنة:** Scheduler يقول *متى* تُطلق المهمة، وQueue Worker يقوم بـ *تنفيذ الوظائف المؤجلة*. **جرّب:** اقترح مهمة أسبوعية وتأكد من عدم تشغيلها على بيانات إنتاج حقيقية أثناء التدريب. **سؤال:** هل `schedule:run` يفتح سيرفراً مستمراً تلقائياً؟ لا.

<a id="ch31"></a>
## 31 | Mail وNotifications وBroadcasting  ⬜

**Mailable** يمثل رسالة بريد يمكنك تخصيص عنوانها ومحتواها؛ **Notification** تجريد إشعار يمكن إرساله عبر قنوات متعددة (mail/database وغيرها)؛ **Broadcasting** نقل أحداث للتطبيقات/المتصفحات لحظياً باستخدام نظام مناسب.

```bash
php artisan make:mail StudentWelcome
php artisan make:notification StudentCreated
```

```php
// مفاهيم بعد تعريف الرسالة Notification وتكوين البريد:
// $student->user->notify(new StudentCreated($student));
```

**ماذا نختار؟** إشعار مستخدم عام متعدد القنوات = Notification؛ بريد غني بقالب خاص = Mailable؛ تحديث مباشر لواجهة المراقبة = Event + Broadcasting. اختبر باستخدام Fakes ولا ترسل رسائل فعلية أثناء التطوير دون قصد.

**السلامة:** لا تخزن رموز البريد وكلمات المرور في الكود؛ في `.env` محلياً، ومتغيرات بيئة مؤمّنة في Production. لا تستخدم عناوين بريد حقيقية للتجارب الجماعية.

**جرّب:** صمّم إشعاراً لولي أمر عند نجاح تسجيل الطالب، وقرر هل نحتاج Queue، وماذا نفعل عند فشل الإرسال. **اختبار:** لماذا إرسال البريد داخل طلب الحفظ قد يجعل واجهة المستخدم بطيئة؟

<a id="ch32"></a>
## 32 | HTTP Client والتعامل مع خدمات خارجية  ⬜

**HTTP Client** يستخدمه Laravel عندما يتصل تطبيقك بخدمة أخرى (ليس نفس Route الذي يستقبل الطلب). أهم العناصر: Endpoint، Method، Timeout، Authentication، Response Codes، Retry.

```php
use Illuminate\Support\Facades\Http;

$response = Http::timeout(5)->get('https://example.org/api/stages');
if ($response->successful()) {
    $stages = $response->json();
}
```

هذا عنوان **توضيحي** ليس API فعلياً مضموناً. لا تفترض أن كل استجابة JSON صالحة؛ تحقّق من البنية واحتمال فشل الشبكة. لا تضع مفاتيح API داخل Repository عام.

**اختبار آمن:** `Http::fake()` يجهّز استجابة اصطناعية دون طلب شبكة حقيقي؛ ثم تختبر ما إذا كان كودك تعامل مع رد 200 أو 500. **سؤال:** شنو الفرق بين Status 404 من API خارجي و404 من Route محلي؟

<a id="ch33"></a>
## 33 | REST APIs وJSON وAPI Resources  ⬜

**API** واجهة تتيح لتطبيق آخر الوصول إلى بيانات/عمليات وفق عقد متفق عليه. **REST-style API** يستخدم Resources وHTTP Methods وحالات الرد بصورة منطقية. **JSON** صيغة تبادل بيانات.

| العملية | مثال عنوان | طريقة | رد شائع |
|---|---|---|---|
| قائمة الطلاب | `/api/students` | GET | `200` |
| طالب محدد | `/api/students/5` | GET | `200` أو `404` |
| إنشاء | `/api/students` | POST | `201` |
| تعديل | `/api/students/5` | PATCH | `200` أو `204` |
| حذف | `/api/students/5` | DELETE | `204` |

**فكرة Resource:** لا تعيد Model بكل حقوله بلا تفكير؛ **API Resource** يحدد البيانات المكشوفة للعميل.

```bash
php artisan make:resource StudentResource
```

```php
// داخل app/Http/Resources/StudentResource.php
public function toArray($request): array
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'stage' => $this->stage,
    ];
}
```

`API Resource` يغير عرض البيانات **ولا يضيف Authorization تلقائياً**. `Route::apiResource` ينشئ مسارات REST بدون create/edit HTML. قد تحتاج إعداد API Routes في تطبيق Laravel 12 (مثل `php artisan install:api`) إذا مشروعك لا يحتويها.

**جرّب:** صمّم JSON response لطالب واحد دون كشف حقول داخلية، وعرّف ماذا يحدث لو طالب غير مالك طلب `/api/students/5`. **سؤال:** ما الفرق بين `web.php` و`api.php` في Middleware والتكوين؟

<a id="ch34"></a>
## 34 | API Authentication وSanctum  ⬜

**Sanctum** حزمة للمصادقة في تطبيقات Laravel مثل APIs وSPAs؛ استراتيجياتها تختلف بين Token-based requests وSPA cookie/session. **Token** سرّ يمثّل صلاحية وصول؛ حفظه ونقله مسؤولية أمنية مهمة.

```bash
# لا تنفذ قبل تأكدنا من الحاجة والنسخ الاحتياطية:
php artisan install:api
```

**القاعدة:** المستخدم المصادق عليه عبر Token لا يعني أنه يملك كل الطلاب. افحص Policy على السجل ذاته؛ وقد تحتاج أيضاً فحص Ability الخاصة بالـ Token وفق التصميم. ادرس انتهاء صلاحية Token وإلغائه ومنع تخزينه علناً.

**تطبيق تعليمي:** API تعرض قائمة الطلاب التي يحق للمستخدم مشاهدتها، ثم Endpoint يعيد `403` عندما يطلب تعديل طالب لشخص آخر. تستعمل Feature Tests لتثبت ذلك.

**جرّب:** قارن Browser Cookie وBearer Token في جدول هوية/مكان التخزين/المخاطر. **سؤال:** لماذا لا تكفي `auth:sanctum` دون Ownership Policy؟

<a id="ch35"></a>
## 35 | Testing: Unit وFeature واختبار الصلاحيات  ⬜

**Test** كود يتحقق أن السلوك المتوقع يتكرر بثقة. **Unit Test** يفحص وحدة معزولة؛ **Feature Test** يفحص أكثر من جزء (Route/Controller/DB/Policy). **Assertion** تأكيد متوقع مثل `assertForbidden()`.

```bash
php artisan make:test StudentAuthorizationTest
php artisan test --filter=StudentAuthorizationTest
```

**مثال PHPUnit-style** (يتطلب Student Factory مناسباً لحقول مشروعك):

```php
<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\{Student, User};
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_non_owner_cannot_edit_student(): void
    {
        $owner = User::factory()->create();
        $other = User::factory()->create();
        $student = Student::factory()->for($owner)->create();

        $this->actingAs($other)
            ->get(route('students.edit', $student))
            ->assertForbidden();
    }
}
```

**قراءة المثال:** `RefreshDatabase` يعزل بيانات الاختبار؛ يجب التأكد من إعداد Connection خاص بالتجارب قبل البدء، خصوصاً لتجنب المساس ببيانات العمل. `actingAs` يسجل المستخدم داخل Client الاختبار. `assertForbidden` يتوقع 403. Factory المفقودة يجب إنشاؤها أولاً؛ لا تنفذ المثال باعتباره جاهزاً دون متطلبات.

**مصفوفة ضرورية:** Guest→Redirect، Owner→200، Non-owner→403، Missing Student→404، Validation failure→Errors، Store creates correct `user_id`، Delete forbidden→Record remains.

**جرّب:** اكتب اختباراً *بكلمات فقط* (Arrange/Act/Assert) لمنع حذف سجل غير مملوك، ثم حوّله لكود تدريجياً. **اختبار:** ما الفرق بين `assertForbidden` و`assertNotFound`؟

<a id="ch36"></a>
## 36 | Factories وSeeders وDatabase Tests  ⬜

**Factory** وصف طريقة إنشاء بيانات اختبار اصطناعية قابلة للتكرار. **Seeder** يملأ قاعدة التطوير ببيانات مبدئية. **Faker** يولّد بيانات تخيلية، لكن لا تعتمد على ذلك كاختبار لكل Edge Case.

```bash
php artisan make:factory StudentFactory --model=Student
php artisan make:seeder StudentsSeeder
```

```php
// من داخل Test بعد تجهيز Factory:
$user = User::factory()->create();
$student = Student::factory()->for($user)->create([
    'stage' => 'Third',
]);
```

**خطورة عملية:** `php artisan db:seed` يكتب بيانات في الاتصال المهيأ، لذلك تحقق من `APP_ENV` و`DB_CONNECTION` والقاعدة المستهدفة قبل التنفيذ؛ و`migrate:fresh --seed` يحذف الجداول أولاً، فلا ينفّذ على البيانات المهمة.

**جرّب:** فكر بحالة اختبار يكون فيها للطالب مالك وبطاقة وكتابان وثلاث دورات، وكيف تبنيها باستخدام Factories/Relationships. **اختبار:** لماذا لا نختبر على نفس DB المستخدمة يومياً؟

<a id="ch37"></a>
## 37 | Frontend: Vite وBootstrap وLivewire/Inertia  ✅ / ⬜

**Frontend** الجزء الذي يتفاعل معه المستخدم. **Vite** أداة بناء ملفات CSS/JS ضمن Laravel؛ **Bootstrap** مكتبة CSS/Components؛ **Tailwind** Utility CSS؛ **Livewire** تفاعل ديناميكي باستخدام PHP؛ **Inertia** جسر بين Laravel وواجهات React/Vue/Svelte.

```blade
{{-- داخل Layout مع إعداد Vite صحيح --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

```bash
npm install
npm run dev
npm run build
```

**فك الفكرة:** `npm run dev` يراقب التعديلات في بيئة تطوير، و`build` ينتج Assets للإنتاج. في مشروعك استخدمنا Breeze/Tailwind مع واجهات Bootstrap وتنسيقات Icons؛ مهم تمنع تضارب التنسيقات والـ Layouts.

**اختيار مناسب لمسارنا:** أتقن Blade وForms وBootstrap أولاً، بعدها Livewire أو Inertia إذا احتجنا تفاعلاً أكبر. لا يوجد سبب لإعادة بناء مشروعك الآن بمجرد ذكر تقنيات جديدة.

**جرّب:** حدد أين يحمل المشروع Bootstrap Icons وأين `@vite`، وراقب هل يستخدم مصدر CSS مكرر. **سؤال:** هل `npm run build` ينشئ جداول DB؟ لا.

<a id="ch38"></a>
## 38 | Localization وDate/Time وTimezones  ⬜

**Localization (i18n/l10n)** تهيئة النصوص والتواريخ والأرقام لتناسب لغة المستخدم. **Timezone** المنطقة الزمنية؛ تخزين الوقت في UTC أو سياسة محددة وعرضه محلياً يقلل الالتباس.

```php
// ملف ترجمة (مثال محتوى): lang/ar/students.php
return ['created' => 'تم إنشاء الطالب بنجاح'];
```

```blade
{{ __('students.created') }}
{{ $student->created_at?->format('Y-m-d H:i') }}
```

**انتبه:** مجلد `lang` قد يحتاج نشره/إنشاءه بحسب مشروعك وإعداد Laravel. `Carbon` يسهّل حساب الفترات والأيام، لكن لا تُدخل توقيت جهاز المستخدم مباشرة في SQL دون فهم التحويل.

**جرّب:** ترجم عنوان جدول الطلاب للعربية والإنجليزية بطريقة Keys بدل النص الصلب، وجرّب عرض وقت الإنشاء. **سؤال:** لماذا قد يختلف وقت DB عن ساعة الكمبيوتر؟

<a id="ch39"></a>
## 39 | Deployment وEnvironment وProduction Safety  ⬜

**Deployment** نشر التطبيق على خادم عام. **Production** بيئة مستخدمين حقيقية تختلف جذرياً عن Development. تحتاج PHP وإضافاته، Web Server يوجه إلى `public/`، إعدادات DB، وAssets جاهزة، وأذونات صحيحة على مجلدات قابلة للكتابة.

**Checklist قبل النشر:**

1. نسخ احتياطية موثقة للـ Database والملفات.
2. إعداد متغيرات البيئة بصورة مؤمّنة، `APP_DEBUG=false` في الإنتاج.
3. `APP_KEY` ثابت وفريد للتطبيق؛ لا تعِد توليده عشوائياً في Production.
4. تشغيل Database Migrations بعد مراجعة تأثيرها وخطة Rollback.
5. نشر Assets (`npm run build`)، وتخزين ملفات المستخدم بصورة مناسبة.
6. جدولة Scheduler وتشغيل Queue Worker وإدارة إعادة تشغيلهما إذا استعملناهما.
7. HTTPS وLogs وMonitoring ومراجعة صلاحيات الملفات.

```bash
# أوامر تعليمية للاستعمال في بيئة معدّة مسبقاً، وليست نشر آلي كامل
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
```

**تحذير:** `--force` يتجاوز تحذير الإنتاج ولا يجعل Migration آمنة بحد ذاته. لا تنفذ على خادم حقيقي دون مراجعة وتخطيط. `php artisan serve` خادم تطوير وليس طريقة النشر العامة.

**جرّب:** أنشئ ورقة تقارن بيئتك XAMPP المحلية بسيرفر إنتاج (PHP version, DB, Environment, HTTPS, Queue, Backup). **سؤال:** لماذا `APP_DEBUG=true` خطر في Production؟

<a id="ch40"></a>
## 40 | Architecture وSOLID وأنماط التطبيق  ⬜

**Architecture** تنظيم المسؤوليات كي تستطيع تطوير واختبار المشروع. ابدأ من MVC الجيد، ثم افصل منطق الأعمال المتكرر عند الحاجة. **SOLID** مجموعة مبادئ لتقليل الاعتماد والتضخم، ليست شرطاً لخلق Interface لكل Class.

**من وضعنا الحالي إلى تنظيم عملي:**

```text
HTTP request
  -> Middleware/Auth
  -> Form Request (validation)
  -> Controller (request orchestration + authorization)
  -> Domain Service (عند وجود منطق مركب)
  -> Eloquent/DB
  -> Event/Job (آثار لاحقة عند الحاجة)
  -> View or API Resource
```

**مثال ذهني:** إن كان تسجيل طالب يحتاج إنشاء بطاقة، إضافة دورات، إرسال إشعار، وتسجيل Audit، لا تضع الجميع بلا تنظيم في `store()`. فكر في Transaction لعمليات DB وEvent/Job للرسائل. لكن لا تفصل وظائف بسيطة إلى ملفات كثيرة دون مكسب.

**مبادئ مهمة:** `DRY` تجنب نسخ المنطق، `KISS` أبقِ الحل بسيطاً، `Single Responsibility` لكل وحدة مسؤولية واضحة، و`Separation of Concerns` لا تجعل Blade تتخذ قرارات الأمان.

**جرّب:** انظر إلى `StudentController` واكتب الوظائف التي يمكن أن تنتقل لاحقاً إلى Request/Service، بدون تعديل ملف فعلي قبل مراجعة. **اختبار:** هل وضع كود استعلام في Controller دائماً خطأ؟ يعتمد على التعقيد وليس قاعدة مطلقة.

<a id="ch41"></a>
## 41 | Advanced Laravel Map: مواضيع تحتاجها حسب المشروع  ⬜

هذه **خريطة مرجعية** للاتساع وليست ادعاء بشرح وثائق Laravel كاملة صفحة بصفحة:

| الموضوع | وظيفته | وقت مناسب له |
|---|---|---|
| Broadcasting / Reverb | تحديثات فورية | لوحة مراقبة حية |
| Scout / Search | بحث متخصص | قاعدة بيانات كبيرة |
| Redis | Cache/Queue backend | ارتفاع الحمل |
| Horizon | مراقبة Redis Queues | عند استعمال Queues بكثافة |
| Telescope / Pulse | Debug ومراقبة | تحسين الأداء والتشخيص |
| Pennant | Feature Flags | تفعيل ميزات تدريجياً |
| Socialite | Login خارجي | إذا احتجت حسابات طرف ثالث |
| Passport | OAuth2 Server | متطلبات تفويض API كبيرة |
| Cashier | اشتراكات ومدفوعات | تطبيق تجاري يتطلب ذلك |
| Octane | خادم تطبيقات عالي الأداء | بعد القياس والحاجة |
| Dusk | اختبار متصفح | تدفقات UI معقدة |
| Pint | تنسيق PHP | جودة وتوحيد Style |
| Package Development | مكتبة قابلة لإعادة الاستخدام | بعد بناء تطبيقات متعددة |
| Concurrency / Processes | مهام موازية / تشغيل عمليات | حالات متقدمة مع اختبار |

**طريقة تعلم صحيحة:** لا تبدأ بـ Octane قبل تثبيت `Controllers/Policies/Tests`. لا تضف Package لمجرد الشعبية. اقرأ الهدف، المتطلبات، والتكلفة التشغيلية قبل القرار.

**سؤال:** أي ثلاثة مواضيع من الجدول تتوقع أنها الأكثر فائدة لمشروع الطلاب خلال الأشهر القادمة؟ اشرح السبب.

<a id="ch42"></a>
## 42 | Student Management System — مخطط مشروع كامل  ✅ / ⬜

**المشروع العملي هو مختبرنا:**

```text
app/
  Models/{Student,User,Card,Book,Course}.php
  Http/Controllers/StudentController.php
  Policies/StudentPolicy.php
resources/views/students/
  index.blade.php
  create.blade.php
  edit.blade.php
  show.blade.php
routes/web.php
 database/migrations/
 tests/Feature/...
```

هذا **تخطيط مرجعي** وليس تأكيداً أن جميع المسارات/الملفات بهذه الصيغة في جهازك. بالعودة إلى `OUR-LEARNING-HISTORY.md` تجد ما توثق عن الملفات الفعلية.

**مسار إنشاء الطالب المحمي:**

1. GET `students/create` يعرض Form.
2. POST `students` يصل للـ Middleware ثم Controller.
3. فحص `create` Policy إذا قررنا حماية إنشاء السجل.
4. Validation لاسم/عمر/مرحلة/بريد.
5. تعيين `user_id` من حساب المستخدم الحالي، وليس من Request.
6. تخزين صورة إن وُجدت مع إدارة فشل الحفظ.
7. إنشاء السجل وتوثيق علاقاته بما يلائم تصميم DB.
8. Redirect مع Flash Message.
9. Feature Test: بيانات صحيحة/خاطئة/ضيف/مالك/عدم تلاعب بالملكية.

**مسار تعديل الطالب المحمي:** `Route Model Binding → authorize('update',$student) → validate → save → redirect`، مع اختبار رابط مباشر لسجل غير مملوك. **مسار الحذف:** `authorize('delete', $student)` أولاً ثم التعامل مع الملفات/السجلات ذات الصلة وفق قواعد المشروع.

**قائمة جودة المشروع:** Pagination، Eager Loading، التحقق من المدخلات، Foreign Keys، عدم اعتماد `user_id` المرسل، توحيد Layout، أتمتة اختبارات الصلاحية، توثيق أخطاء سابقة، وعدم استعمال بيانات إنتاج في التجارب.

**جرّب:** ارسم Data Flow لزر Edit من Blade إلى DB وارجع View/Redirect. **سؤال:** أين يجب فحص الصلاحية إذا تم تجاوز زر Edit وفتح URL مباشرة؟

<a id="ch43"></a>
## 43 | مقارنة الأكواد التي يسهل الخلط بينها  ✅ / 📘

| A | B | الفرق |
|---|---|---|
| `edit()` | `update()` | الأولى صفحة تعديل، الثانية تحفظ الطلب |
| `create()` | `store()` | الأولى Form جديد، الثانية حفظ |
| `show()` | `index()` | واحد مقابل مجموعة |
| `viewAny()` | `view()` | قائمة مقابل سجل واحد في Policy |
| `@can` | `authorize()` | عرض واجهة مقابل فرض قرار بالخادم |
| `Gate::allows()` | `Gate::authorize()` | Boolean مقابل فرض / Exception |
| `Auth::id()` | `$student->user_id` | ID المستخدم الحالي مقابل مالك السجل |
| `with()` | `load()` | قبل جلب Models مقابل بعد الجلب |
| `$student->courses` | `$student->courses()` | Collection / نتيجة مقابل علاقة Query |
| `attach()` | `sync()` | إضافة رابط مقابل جعل الروابط مساوية للقائمة |
| `$request->all()` | `$request->validated()` | كل المدخلات مقابل المدخلات المتحققة (مع Form Request) |
| `get()` | `first()` | مجموعة مقابل سجل واحد أو null |
| `find()` | `findOrFail()` | null عند الغياب مقابل Exception/404 |
| `null` | `false` في `before()` | متابعة فحص Policy مقابل رفض |
| `migrate` | `migrate:fresh` | تطبيق تغييرات غير منفذة مقابل حذف الجداول وإعادة بنائها |
| `Hash::make` | Encryption | Hash أحادي الاتجاه مقابل تشفير قابل للفك بمفتاح |
| `config()` | `env()` | استهلاك الإعدادات من Config مقابل قراءة البيئة؛ `env` لا تستعمله عشوائياً خارج Config مع caching |
| `npm run dev` | `npm run build` | Development watcher مقابل Assets للبناء |

**تمرين:** اختر 5 أزواج واشرحها كأنك مدرّس لمبتدئ، مع مثال من مشروعنا.

<a id="ch44"></a>
## 44 | منهج التعلم الذكي والاختبار النهائي لكل فصل  ✅

**معيار إغلاق أي درس:**

1. **تعريف:** تشرح المصطلح باللهجة العراقية مع اسمه بالإنجليزية.
2. **سبب الاستخدام:** مثال لمشكلة حقيقية يحلها.
3. **تتبع كود:** توقع نتيجة برنامج بسيط قبل تشغيله.
4. **تطبيق:** تكتب أو تعدّل جزءاً بنفسك بعد توجيه تدريجي.
5. **اختبار:** أسئلة فهم + Trace + سيناريو + خطأ مقصود + Edge Case.
6. **توثيق:** نتيجة الاختبار، صعوبة واجهتها، والدليل في `progress.md`.

**مثال معيار Policy:** تميز Login عن Permission؛ تتوقع 403 لمستخدم غير مالك؛ تستخدم `allows` للفحص و`authorize` للفرض؛ لا تعتمد على `@can` وحده؛ تعرف أن `before()` = `true`/`false`/`null` وتتبع ترتيب الشروط؛ تختبرها دون حذف سجلات.

**سجل الدرس النموذجي:**

```text
Lesson ID: L-021
Topic: Policy::before()
Date: YYYY-MM-DD
Status: In progress / Completed after test
My explanation: ...
Code tested: ...
Expected/Actual: ...
Quiz score: ... / ...
Mistake corrected: ...
Next revision date: ...
```

**ملاحظة:** لا تغيّر `✅` في Curriculum لمجرد وجود فصل مشروح في هذا الكتاب؛ إثبات الإتقان من التطبيق والاختبار.

<a id="ch45"></a>
## 45 | Glossary + مسارات التوثيق الرسمي

| المصطلح | المعنى المختصر |
|---|---|
| Framework | إطار ينظم بناء التطبيق ويوفر خدمات شائعة |
| Route | ربط URL/HTTP method بمعالج |
| Controller | كلاس ينسق استجابة الطلب |
| Middleware | طبقة تفحص الطلب عند المرور |
| Model | تمثيل كائني لبيانات الجدول |
| Migration | تغيير Schema بإصدارات |
| ORM | تحويل صفوف DB إلى Objects |
| Query Builder | إنشاء استعلامات عبر Methods |
| Blade | نظام قوالب لإخراج HTML |
| Validation | التحقق من صحة المدخلات |
| Authentication | تحديد هوية المستخدم |
| Authorization | تقرير صلاحية المستخدم للعمل |
| Gate | واجهة فحص السماح أو الرفض |
| Policy | قرارات أفعال مرتبطة بمورد/Model |
| Session | سياق مستخدم عبر طلبات HTTP |
| CSRF | طلب مزيف يستغل جلسة متصفح |
| Eager Loading | تحميل العلاقات مقدماً لتقليل N+1 |
| Pivot | جدول وسيط لعلاقة Many-to-Many |
| Trait | آلية PHP لإعادة استخدام طرق داخل Classes |
| Interface/Contract | تعهد بوجود Methods معينة |
| Dependency Injection | تمرير التبعيات بدل إنشائها داخلياً |
| Event/Listener | إعلان حدث وكود يستجيب له |
| Queue/Job | طابور ومهمة تنفذ بحسب Connection/Worker |
| Cache | تخزين مؤقت لتحسين الأداء |
| API Resource | تحديد البيانات المعادة بشكل JSON |
| Factory/Seeder | توليد بيانات اختبار / بيانات أولية |
| Unit/Feature Test | اختبار وحدة / تدفق نظام متكامل |
| Deployment | تجهيز ونشر نظام التشغيل العام |

**التوثيق الأساسي النسخة 12 (روابط قابلة للفتح):**

- https://laravel.com/docs/12.x — الفهرس الرسمي.
- https://laravel.com/docs/12.x/routing — Routing.
- https://laravel.com/docs/12.x/controllers — Controllers.
- https://laravel.com/docs/12.x/validation — Validation.
- https://laravel.com/docs/12.x/eloquent — Eloquent.
- https://laravel.com/docs/12.x/eloquent-relationships — Relations.
- https://laravel.com/docs/12.x/authorization — Policies.
- https://laravel.com/docs/12.x/authentication — Authentication.
- https://laravel.com/docs/12.x/testing — Tests.
- https://laravel.com/docs/12.x/queues — Queues.
- https://laravel.com/docs/12.x/sanctum — Sanctum.
- https://laravel.com/docs/12.x/deployment — Deployment.
- https://laravel.com/docs/12.x/releases — متطلبات الإصدارات والدعم.

**طريقة التوسع:** إذا موضوع يحتاج تفاصيل API جديدة، نستخدم مرجع النسخة 12 قبل إعطاء أمر؛ لا نفترض أن كل Tutorial قديم يلائم مشروعك. راجع `CURRICULUM.md` لخريطة التدرج، و`OUR-LEARNING-HISTORY.md` لتفصيل ما درسناه فعلاً.

---
**نهاية المرجع الأساسي؛ يبدأ التطبيق العملي من `progress.md` وليس من علامة نهاية الكتاب.**
