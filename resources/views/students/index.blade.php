<!DOCTYPE html>
<html>

<head>

    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">

                {{ session('success') }}

            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1>
                Students List
            </h1>

            <a href="{{ route('students.create') }}" class="btn btn-primary">
                Add Student
            </a>

        </div>


        <table class="table table-bordered table-striped">

            <thead class="table-dark">

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Card Namber</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Stage</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>

            </thead>


            <tbody>

                @foreach ($students as $student)
                    <tr>

                        <td>{{ $student->id }}</td>

                        <td>{{ $student->name }}</td>

                        <td class="@if ($student->card) text-success @else text-danger @endif">
                            @if ($student->card)
                                🟢 {{ $student->card->card_number }}
                            @else
                                🔴 You Dont Have A Card Go Issue One - {{ $student->name }}
                            @endif
                        </td>

                        <td>{{ $student->email }}</td>

                        <td>{{ $student->age }}</td>

                        <td>{{ $student->stage }}</td>

                        <td>
                            <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image"
                                class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                        </td>

                        <td>{{ $student->created_at }}</td>

                        <td>{{ $student->updated_at }}</td>


                        <td>

                            <a href="#" class="btn btn-info btn-sm">
                                View
                            </a>

                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach


            </tbody>


        </table>
        {{ $students->links() }}

    </div>


</body>



</html>
