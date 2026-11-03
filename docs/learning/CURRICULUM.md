# المنهج الشامل — PHP + MySQL + Laravel 12 (مسار إتقان لا مجرد قراءة)

**إصدار:** 2.0.0 | **تاريخ:** 2026-10-31 | **مشروع التطبيق:** Student Management System

## كيف تقرأ الحالات؟
- **✅ مطبق أو تم مراجعته عملياً:** لا يعني الاحتراف النهائي.
- **📘 تمت دراسته وتحتاج ممارسة:** المفهوم موجود، لكن دليل الاستقلالية غير كافٍ.
- **🟡 درس جارٍ:** غير مغلق حتى ننجح في اختبار المفهوم.
- **⬜ خطة مستقبلية:** وجود شرحه في `MASTER-REFERENCE.md` لا يغيّر حالته إلى «مُنجز».

## خارطة التعلم

| رقم | الفصل من المرجع | المتطلب | الحالة وفق سجلنا | دليل الإتقان المطلوب |
|---|---|---|---|---|
| 01 | HTTP والويب | لا شيء | ✅ | شرح Request/Response/403 |
| 02 | PHP الأساسية | لا شيء | ✅ | Functions وLoops بدون نسخ |
| 03 | PHP OOP | 02 | ⬜ | Class/Interface/Trait من الصفر |
| 04 | Composer وGit | 02 | 📘 | تثبيت Dependency وCommit آمن |
| 05 | SQL وPDO | 02 | ✅ | Prepared Statements + CRUD |
| 06 | البيئة Laravel 12 | 04-05 | ✅ | تشغيل مشروع/DB/Artisan |
| 07 | البنية وLifecycle | 01 و06 | ✅ | تتبع طلب كامل |
| 08 | Routing | 07 | ✅ | Resource/Binding/Names |
| 09 | Middleware | 08 | ✅ | auth vs verified vs Policy |
| 10 | Controllers وRequest | 08 | ✅ | edit/update, view/redirect |
| 11 | Blade | 10 | ✅ | Layout/slot/CSRF/error |
| 12 | Validation وForm Request | 10 | ✅/⬜ | update unique وFormRequest بعده |
| 13 | Sessions وCSRF | 01 و11 | 📘 | تفسير حماية Forms |
| 14 | Migrations | 05 | ✅ | Schema وrollback على اختبار |
| 15 | Query Builder / Transaction | 14 | 📘/⬜ | SQL equivalent وDB::transaction |
| 16 | Eloquent CRUD/Scope | 14 | ✅/⬜ | scope وcasts بعده |
| 17 | Relationships | 16 | ✅/⬜ | أربع علاقات + Polymorphic بعده |
| 18 | Eager Loading | 17 | ✅/📘 | قياس N+1 قبل/بعد |
| 19 | File Storage | 12 | ✅ | upload/replace/remove آمن |
| 20 | Authentication | 09 | ✅ | guest/auth/ownership |
| 21 | Policies/Gates | 20 | 🟡 | `before` + Matrix + Test |
| 22 | Security review | 21 | 📘/⬜ | مطابقة كل Routes للـ Policy |
| 23 | Error Handling | 07 | ✅/⬜ | تشخيص نوع خطأ وتسجيله |
| 24 | Container/DI | 03 | ⬜ | حقن Interface وتبديل Implementation |
| 25 | Providers/Facades | 24 | ⬜ | خدمة مسجلة في Container |
| 26 | Collections | 16 | ⬜ | map/filter vs SQL where |
| 27 | Cache/Rate Limit | 09 و16 | ⬜ | إبطال Cache عند تغيير البيانات |
| 28 | Events/Listeners | 24 | ⬜ | Event + Listener مع اختبار |
| 29 | Queue/Jobs | 28 | ⬜ | Queue Worker وفشل وإعادة محاولة |
| 30 | Scheduler/Commands | 29 | ⬜ | Command مع موعد |
| 31 | Mail/Notifications | 29 | ⬜ | إشعار Fake في Test |
| 32 | HTTP Client | 10 | ⬜ | Http Fake / Timeout / Error |
| 33 | REST API/Resources | 08 و12 | ⬜ | JSON CRUD مع Status Codes |
| 34 | Sanctum | 20 و33 | ⬜ | Authentication + Policy بAPI |
| 35 | Tests | 21 | ⬜ | Feature Tests للحظر والإذن |
| 36 | Factories/Seeders | 14 و35 | ⬜ | بيانات اختبار معزولة |
| 37 | Frontend/Vite | 11 | ✅/⬜ | HTML + Assets + UI |
| 38 | Localization/Timezones | 11 | ⬜ | lang keys + dates |
| 39 | Deployment | 35 | ⬜ | خطة نشر + Backup + rollback |
| 40 | Architecture | 24 و35 | ⬜ | فصل منطق معقد عند الحاجة |
| 41 | Advanced Ecosystem | 35 و39 | ⬜ | اختيار أداة حسب حاجة حقيقية |
| 42 | مشروع التخرج | 21 و35 | ✅/⬜ | مشروع محمي ومختبر |
| 43 | فروقات الكود | المراحل الماضية | 📘 | 10 أمثلة وتفسير الفرق |
| 44 | منهج الاختبار | لا شيء | ✅ | تطبيق معيار الإتقان |
| 45 | مصطلحات ومصادر | لا شيء | مرجع | استخدام عند الحاجة |

## تقسيم المراحل للتنفيذ

### المرحلة A — تثبيت الأساس (الذي درسناه)
PHP وSQL وMVC وRoutes وBlade وEloquent. **الإنجاز المطلوب:** تبني CRUD طالب بسيط بدون اعتماد كامل على نسخ كود جاهز.

### المرحلة B — الملكية والصلاحيات (الحالية)
`Auth::id`, `Policy`, `Gate`, `authorize`, `@can`, `before`, `viewAny/view/update/delete`. **الإنجاز المطلوب:** كل الأدوار تحصل على نتائج صحيحة حتى بالرابط المباشر.

### المرحلة C — الاختبارات والصيانة
Form Request، Feature Testing، Factories، Database transactions، Performance وLogging. **الإنجاز المطلوب:** Tests تلقائية تثبت قواعد البيانات والصلاحيات.

### المرحلة D — API
Route API، JSON، Resources، Sanctum، Validation Errors، Pagination. **الإنجاز المطلوب:** API مستقلة مبنية على نفس قواعد الملكية.

### المرحلة E — المشاريع الاحترافية
Container/Services، Jobs/Queues، Events، Cache، Scheduling، نشر ومراقبة. **الإنجاز المطلوب:** ميزة واقعية مكتملة من التصميم إلى التوثيق والاختبار والنشر التجريبي.

## اختبار الإتقان بعد كل درس — قواعد ثابتة

- 2 سؤال مفهوم + سبب.
- 2 سؤال تتبع كود وتوقع نتيجة.
- 2 حالة تطبيق واقعية من مشروع الطلاب.
- 2 اكتشاف خطأ أو مشكلة حماية.
- 2 سؤال تمييز بين مفاهيم متشابهة.
- 2 Edge Cases أصعب، بمجموع 12 سؤال عند الدروس الكبيرة.
- تنفيذ تجربة على نسخة تطوير/اختبار، وبعدها نسجل الخطأ إذا ظهر.
- **لا نمنح ✅ بناء على قراءة المرجع فقط**؛ نحتاج شرح من المستخدم + تطبيق + اختبار.

## نقطة التوقف الحالية

`Policy::before()`، وخصوصاً الجمع بين `is_admin` و`is_blocked`، وملاحظة أن الـ Method المطابقة للـ Ability يجب أن تكون موجودة حتى يعمل `Policy::before()`، وتغطية الصفحة نفسها وطلبات الإرسال. ارجع إلى `progress.md` لنقاط الإغلاق الدقيقة. لا تغير نسبة تقييمك السابق بأثر رجعي.

## يومية الدرس — قالب قابل للنسخ

```markdown
### Session: YYYY-MM-DD — L-XX
- المفهوم:
- شنو فهمت بطريقتي:
- الكود الذي كتبته بنفسي:
- توقع النتيجة / النتيجة الفعلية:
- نتيجة الأسئلة: /12
- الخطأ الذي صححناه:
- نقطة لم أتقنها:
- الحالة: 🟡 / ✅
- المرجع المرتبط: MASTER-REFERENCE.md#chxx
```
