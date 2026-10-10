
<h2>{{ $student->name }}</h2>
<p>{{ $student->email }}</p>
<p>{{ $student->age }}</p>

<h3>البطاقة</h3>
@if($student->card)
    <p>{{ $student->card->card_number }}</p>
@else
    <p>لا توجد بطاقة</p>
@endif

<h3>الكتب</h3>
<ul>
    @forelse($student->books as $book)
        <li>{{ $book->title }} - {{ $book->author }}</li>
    @empty
        <li>لا توجد كتب</li>
    @endforelse
</ul>

<h3>الكورسات</h3>
<ul>
    @forelse($student->courses as $course)
        <li>{{ $course->name }}</li>
    @empty
        <li>لا توجد كورسات</li>
    @endforelse
</ul>

<h3>أُضيف بواسطة</h3>
<ul>
@if($student->user)
    <p>أُضيف بواسطة: {{ $student->user->name }}</p>
@endif
</ul>