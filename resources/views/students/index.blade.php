@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-container">
        <h2>Student List</h2>

            <!-- Search Form -->
    <form method="GET" action="{{ route('students.index') }}" class="mb-3">
        <input type="text" name="search" placeholder="Search Students" value="{{ request()->search }}">
        <button type="submit">Search</button>
    </form>

    <a href="{{route('students.create')}}" class="btn btn-primary"> Add Student </a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>DOB</th>
                    <th>Standard</th>
                    <th>Gender</th>
                    <th>Entry Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->student_id }}</td>
                    <td><img src="{{ asset('storage/' . $student->image) }}" width="50"></td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email_id }}</td>
                    <td>{{ $student->username }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->standard }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->entry_year }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div>
<!-- Pagination Links -->
{{ $students->links() }}
</div>
@endsection