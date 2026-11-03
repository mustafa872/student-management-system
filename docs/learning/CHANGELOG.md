# سجل التغييرات

## 2.0.0 — 2026-10-31

- تغيّر `MASTER-REFERENCE.md` من ملخص دروس إلى موسوعة بـ **45 فصلاً** مع شرح وأمثلة وتجارب وأسئلة.
- أرشفة المرجع الأول كاملاً في `OUR-LEARNING-HISTORY.md` حفاظاً على ما تعلمناه سابقاً.
- إضافة `CURRICULUM.md` للفصل بين **شرح موضوع** و**إتقانه واقعياً**.
- إضافة `PRACTICE-LABS.md` بـ 10 مختبرات عملية.
- تدقيق نقطة Laravel 12 الدقيقة: Policy `before()` لا تعمل إذا لا توجد Ability method مطابقة.
- تحديث README لتعليمات تثبيت وفهرس الإصدار الجديد.
- الإبقاء على `progress.md`, `question-bank.md`, `error-log.md`, `session-log.md`, `quick-reference.md`، وقواعد التحديث دون فقدان تاريخ التعلم.

---

# 📋 CHANGELOG — سجل الإصدارات

اتّبعنا إصداراً مفهوماً `MAJOR.MINOR.PATCH`. التاريخ مرتبط بتاريخ إعداد الحزمة وليس بتاريخ كل درس سابق.

## [1.0.0] — 2026-10-31 — الإصدار المؤسس

### Added

- مرجع شامل `MASTER-REFERENCE.md` يغطي PHP وForms وPDO/MySQL وLaravel MVC/Routes/Blade/Validation/Migrations/Eloquent/Files/Relationships/Authentication/Policies.
- جرد موثق لنسخة الملفات المتاحة من مشروع Student Management System.
- شرح `Policy::before()` و`Gate::before()` و`true/false/null` مع حالة `admin+blocked` المفتوحة.
- `progress.md` بما أُنجز وما لا يزال قيد الدراسة.
- `error-log.md` للأخطاء التي واجهتنا تاريخياً والملاحظات الوقائية المنفصلة.
- `question-bank.md` بـ 38 سؤالاً أصلياً ومفتاح تصحيح، منها ستة للدرس الجاري.
- `quick-reference.md` للأوامر المهمة والمقارنات.
- `session-log.md` يجمع التسلسل التاريخي ويحتوي قالب جلسة جديدة.
- `UPDATE-PROTOCOL.md` يحدد قواعد تحديث المرجع بعد كل درس.

### Known limitations

- لا تتوفر نسخة حرفية لكل المحادثات من بداية الرحلة؛ بعض المراحل الأولى أعيد بناؤها من ملخصات.
- الأكواد المذكورة «مراجعة نصياً» قد تكون أقدم من الملفات المحلية الحالية.
- `is_admin` و`is_blocked` في الأمثلة التعليمية غير مثبت وجودهما في Schema.
- لا توجد مزامنة تلقائية من ChatGPT إلى `C:\xampp\...`؛ التحديث يتم بإصدار ملف جديد مع أحدث نسخة من الحزمة.

## قالب إصدار جديد

```text
## [X.Y.Z] — YYYY-MM-DD
### Learned
- ...
### Practiced / Verified
- ...
### Fixed
- ...
### Still open
- ...
### Files changed
- ...
```
