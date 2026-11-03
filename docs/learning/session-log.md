# 🗓️ سجل جلسات تعلّمنا

**إصدار السجل:** 1.0.0 — مستخلص من ملخصات سابقة وملفات مشروع، وليس نسخاً حرفياً لكل محادثة.

## سجل ما قبل إنشاء المرجع

### 2026-07-05 — تأسيس PHP

- نقطة الانطلاق: دراسة PHP سابقة لم تترك شعوراً بإتقان الأساسيات، ورغبة في الوصول إلى Laravel باحتراف.
- راجعنا Variables وData Types و`echo` و`var_dump`، ثم شروطاً ومصفوفات ودوال بالتدرج.
- **مبدأ تربوي اتفقنا عليه:** لا ننسخ الحل قبل ما نفهمه ونجرّب بأنفسنا.
- **المصدر المتاح:** ملخصات محادثات قديمة.

### 2026-07-06 — PHP + PDO + CRUD

- تعاملنا مع `$_GET`, `$_POST`, `$_SERVER`, `isset`, `empty`, `foreach`, Sessions.
- مشروع User Management System على XAMPP.
- PDO: الاتصال عبر `$pdo`, `SELECT`, `fetch`, `fetchAll`, `prepare`, `execute`، ثم CRUD.
- خطآن مهمان: رابط Apache Not Found، وترتيب `if/else` عند POST.
- انتقلنا تدريجياً لفكرة MVC وLaravel.

### 2026-07-08 إلى 2026-07-15 — Laravel الأولى

- Routes وControllers وBlade و`Request` وCSRF.
- Forms مع `@error` و`old()` وValidation.
- إنشاء Model/Migration Student، Eloquent، `$fillable`.
- Resource Controller: `index/create/store` ثم التدرج نحو باقي CRUD.
- `stage`: القيم `First, Second, Third, Fourth`.
- فهم `return view()` مقابل `redirect()->route()`.

### نحو 2026-07-20 — CRUD والتخزين

- عمليات CRUD لطلاب النظام، Pagination وبحث، رفع الصور بـ Public Storage.
- فهم أن حذف الطالب من DB لا يحذف الصورة من Storage تلقائياً.
- بناء الواجهة وعرض السجلات.

### أيلول 2026 — العلاقات وملكية السجلات

- Student مع Card `hasOne`, Book `hasMany`, Course `belongsToMany`, User `belongsTo`.
- Eager Loading وAdded By و`user_id`.
- بدأ بناء `StudentPolicy` بحيث `update/delete` يسمحان للمالك فقط.
- اختبار الفرق بين الطالب الذي يملك `user_id` وآخر قديم له `user_id=null`.

### 2026-09-26 وما بعدها — فرض الصلاحية

- إضافة `$this->authorize('update', $student)` إلى `edit/update`، ثم `delete` داخل `destroy`.
- تعلمنا Trait `AuthorizesRequests` وتصحيح خطأ Syntax في Controller.
- استخدمنا Tinker/`Gate::forUser` لفحص مالك وغير مالك.
- شاهدنا رفض 403 وتأكدنا أنه حماية مقصودة.

### 2026-10-24 إلى 2026-10-30 — مراجعات معمّقة لـ Authorization

- `@can` لا يحمي Direct URL وحده؛ `allows` Boolean؛ `authorize` يفرض الفحص.
- تمييز `update()` في Controller عن `update()` في Policy.
- الاستقلال بين `viewAny`, `view`, `create`, `update`, `delete`.
- اختبار متقدم سجّل **20/24**، مع نقاط مراجعة حول Mass Assignment والأسئلة متعددة الإجابات.
- راجعنا كود StudentController وبقية Models/Policy أواخر أكتوبر؛ كانت DB تظهر `mysql` بتاريخ 30-10.

### 2026-10-31 — المرجع ومراجعة `before()`

- ناقشنا `Policy::before()` وقرارات `true`, `false`, `null`.
- شرح المستخدم أن `null` يسمح باستكمال فحص `update/delete`، وهي نقطة فهم مهمة.
- الحالة المفتوحة: **ترتيب فحص `is_admin` و`is_blocked`** عندما المستخدم يحمل الصفتين؛ هذه ليست حالة مثبتة ضمن Schema الحالي.
- تم تجهيز حزمة توثيق مرجعية قابلة للتحديث داخل المشروع **ولم نعتبر الدرس مغلقاً دون اختبار**.

---

## قالب كل جلسة لاحقة

### YYYY-MM-DD — اسم الدرس

- **حالة البداية:** ما الذي كان مفهوماً وما الذي كان عالقاً؟
- **تعريف المصطلحات الجديدة:** ...
- **ما تعلمناه:** ...
- **التطبيق الذي نفّذه المتعلّم:** أسماء ملفات ووصف الفعل وليس أسراراً.
- **اختبار السلوك:** الأمر/النتيجة المتوقعة/النتيجة الفعلية.
- **المراجعة:** 6 أسئلة مختلطة؛ النتيجة ونقاط الضعف.
- **الأخطاء إن وجدت:** رابط إلى `ERR-XXX`.
- **قرار الإغلاق:** ✅ أُتقن / 🟡 يستمر / 📘 مراجعة.
- **نقطة الاستئناف:** ...
- **الملفات المحدّثة:** `MASTER-REFERENCE.md`, `progress.md`, ...
