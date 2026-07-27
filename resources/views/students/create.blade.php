<!DOCTYPE html>
<html>

<head>

    <title>Add Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>Add New Student</h2>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                Back to Students
            </a>

        </div>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="text-danger mt-1">

                    {{ $message }}

                </div>
            @enderror
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}">
            </div>
            @error('email')
                <div class="text-danger mt-1">

                    {{ $message }}

                </div>
            @enderror

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age"
                    name="age" value="{{ old('age') }}">
            </div>
            @error('age')
                <div class="text-danger mt-1">

                    {{ $message }}

                </div>
            @enderror
            <div class="mb-3">

                <label for="stage" class="form-label ">
                    Stage
                </label>

                <select class="form-select @error('stage') is-invalid @enderror" id="stage" name="stage">

                    <option value="">Choose Stage</option>

                    <option value="First">First</option>

                    <option value="Second">Second</option>

                    <option value="Third">Third</option>

                    <option value="Fourth">Fourth</option>

                </select>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control  id="image" name="image" value="{{ old('image') }}">
                </div>

            </div>
            @error('stage')
                <div class="text-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-success">
                Save Student
            </button>


        </form>

    </div>

</body>

</html>
