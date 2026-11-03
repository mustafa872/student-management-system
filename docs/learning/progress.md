# 📈 سجل التقدم الدراسي — PHP / Laravel

**آخر تحديث:** 2026-10-31 | **الإصدار:** 1.0.0  
**المشروع الجاري:** Student Management System — Laravel 12  
**نقطة الاستئناف:** `StudentPolicy::before()` → `true/false/null` → أولوية شرط `blocked` و`admin`.

## نظام الحالات

- **✅ مُنجز عملياً:** يوجد كود أو تشغيل أو إجابات اختبار تثبت المهارة الأساسية، وليس معناه الاحتراف الكامل.
- **📘 دُرس:** شرحنا المفهوم أو تدربنا عليه لكن نحتاج مراجعة إضافية.
- **🟡 جاري:** في وسط الشرح أو المراجعة ولم يُعتمد بعد.
- **⏳ لاحقاً:** غير منجز.

لا نعتمد الموضوع إلا إذا تقدر تشرح: **ما هو؟ لماذا؟ كيف ينفذ؟ ما نتيجة الكود؟ كيف تختبره؟** بالإضافة إلى حل تمرين قصير مستقل.

## 1) مرحلة PHP

| المهارة | الحالة | الدليل/ملاحظة |
|---|---|---|
| المتغيرات وأنواع البيانات و`echo` و`var_dump` | ✅ | أول تدريبات تموز 2026 |
| المقارنات `==` و`===` والشروط | ✅ | تكررت بالـ Policies |
| Loops وArrays و`foreach` | ✅ | عرض بيانات |
| Functions وParameters و`return` | 📘 | مدروسة؛ يحتاج تثبيت كتابة دوال من الصفر |
| `$_GET`, `$_POST`, `$_SERVER` | ✅ | Forms في PHP |
| `isset()`, `empty()`, Validation | ✅ | إنشاء/تحرير مستخدم |
| Sessions وLogin/Logout في PHP | 📘 | مدروسة بالمشروع القديم |
| OOP عميق: inheritance / interfaces / traits | ⏳ | Trait لُمس في Laravel فقط |

## 2) مرحلة MySQL / PDO

| المهارة | الحالة | الدليل/ملاحظة |
|---|---|---|
| الاتصال MySQL عبر PDO | ✅ | `Connected Successfully` ومشروع User Management |
| `SELECT` / `fetch()` / `fetchAll()` | ✅ | استرجاع السجلات |
| `prepare()` و`execute()` | ✅ | SQL مع متغيرات |
| `INSERT/UPDATE/DELETE` وCRUD | ✅ | المشروع القديم |
| فهم Primary/Foreign/Unique Keys | 📘 | استخدمت عملياً؛ قيود DB تحتاج تعزيز |
| JOINs المتقدمة وTransactions | ⏳ | لم تثبت مراجعة شاملة |

## 3) مرحلة Laravel

| الدرس | الحالة | آخر دليل عملي |
|---|---|---|
| Composer وArtisan وبيئة Laravel 12 | ✅ | إنشاء وتشغيل المشروع |
| MVC وهيكل الملفات | ✅ | Model, Controller, Views |
| Routes/Resource Routes | ✅ | `Route::resource('students', ...)` |
| HTTP/Request وCSRF | ✅ | Forms |
| Blade و`old()`, `@error`, `@csrf` | ✅ | نماذج الطالب |
| `view()` مقابل `redirect()->route()` | ✅ | PRG بعد `store` |
| Validation وunique/in/nullable | ✅ | قواعد `store` و`update` |
| Migrations وModels و`$fillable` | ✅ | students + علاقات |
| Eloquent/CRUD | ✅ | StudentController |
| Pagination وQuery Builder Search | ✅/📘 | pagination مؤكد؛ تفاصيل Search تحتاج مطابقة الملف |
| File Upload, Public Disk, Image Cleanup | ✅ | `store`, `update`, `destroy` |
| علاقات Card/Book/User/Course | ✅ | أربع علاقات للـ Student |
| `with()`, `load()` وN+1 | ✅/📘 | استخدام `with('card')` و`load([...])` |
| `sync()` للدورات | ✅ | داخل `update()` |
| Authentication (`auth`, Login) | ✅ | مجموعة Routes محمية |
| `user_id` Ownership | ✅ | `Auth::id()` عند الإنشاء |
| Policy `update/delete` | ✅ | اختبار المالك وغير المالك |
| `$this->authorize()` + 403 | ✅ | حماية Controller |
| `@can` والفرق بين UI/Server | ✅ | مناقشة وتمارين |
| `Gate::forUser()->allows()` | ✅ | user 1 مقابل user 2 |
| Policy `viewAny/view/create` | ✅ | موثقة بالكود |
| `Policy::before()` (true/false/null) | 🟡 | الفكرة الأساسية فُهمت؛ نكمل أولوية admin/blocked |
| Tests الآلية Feature/Unit | ⏳ | بعد إغلاق محور الصلاحيات |
| Form Requests/Policies المتقدمة/Roles | ⏳ | حسب الخطة |
| REST APIs / Deployment | ⏳ | لاحقاً |

## 4) نتيجة مراجعة سابقة

- آخر تقييم رسمي متاح للصلاحيات: **20/24 (83.3%)**.
- نقاط التطوير: الأسئلة متعددة الاختيار، استقلال كل Ability، مخاطر `$request->all()` وMass Assignment، وفرق `Boolean false` وHTTP 403.
- هذه الدرجة لا تعني أن `before()` انتهى، ولا تغني عن التطبيق العملي.

## 5) قائمة تحقق الدرس الجاري — `Policy::before()`

- [x] تعريف `before()`.
- [x] `return true` = سماح فوري.
- [x] `return false` = رفض فوري.
- [x] `return null` = أكمل إلى `update/delete`؛ ليس سماحاً ولا رفضاً.
- [ ] شرح سبب اختلاف النتيجة عند تبديل ترتيب `is_blocked` و`is_admin` إذا اجتمعا.
- [ ] حل 6 أسئلة متنوعة بدون إظهار الحلول أولاً.
- [ ] بناء أو تحليل سيناريو من المشروع دون نسخ الحل الكامل.
- [ ] التأكد هل حقلا `is_admin/is_blocked` موجودان فعلاً أم مثالان.
- [ ] اختبار على مستوى Server عند اعتماد القاعدة.

**لا ننتقل** إلى درس جديد قبل إغلاق هذا المفهوم.

## 6) الدرس القادم وفق الجاهزية

1. ثلاث حالات `before()` في جدول مستخدم/صلاحية/نتيجة.
2. حالة المستخدم `admin` و`blocked` بنفس الوقت.
3. كود صغير لترتيب الشرطين.
4. ستة أسئلة (فهم + تتبع + سيناريو + اكتشاف خطأ + تطبيق).
5. عند النجاح نحدّث الحالة إلى ✅ مع تاريخ الإغلاق.
6. بعده نقرر حماية `view/index` أو Feature Testing.

## 7) أسلوب التدريس

- شرح عراقي، المصطلحات التقنية بالإنجليزية ومعانيها بالعربية.
- تعريف المصطلح أولاً، ثم **Concept → Why → Code → Run/Test → Questions**.
- فرصة للمحاولة قبل الحل الكامل، وتصحيح خطأ واحد كل مرة.
- أسئلة متكررة وكود تتبع وسيناريوهات.
- آخر أسلوب اتفقنا عليه: **6 أسئلة مختلطة بكل موضوع**، ويمكن تقييم تجميعي عند نهاية محور بدل امتحان ضخم عند كل خطوة صغيرة.
- المرجع هو مصدر الحقيقة عند الانتقال لمحادثة جديدة.

## 8) محطات تاريخية

| التاريخ | الدليل |
|---|---|
| 2026-07-05 | PHP fundamentals وPDO |
| 2026-07-06 | User Management CRUD والانتقال إلى Laravel |
| 2026-07-09 | Migration + Student Model |
| 2026-07-15 | Resource Forms وValidation للـ Stage |
| 2026-07-20 | CRUD وImages |
| 2026-09-21 | `user_id` وPolicy الملكية |
| 2026-09-26 | Owner/non-owner و`authorize()` |
| 2026-10-24 → 30 | اختبارات Policies؛ تقييم 20/24 |
| 2026-10-31 | شرح `before()`؛ شرطا blocked/admin قيد الإغلاق |

## 9) سجل دخول الدرس الجديد

| التاريخ | الموضوع | التطبيق المستقل | نتيجة المراجعة | الحالة | الملفات المحدثة |
|---|---|---|---|---|---|
| — | — | — | — | — | — |
