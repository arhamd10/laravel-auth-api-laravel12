@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Student</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Current Profile Image</label><br>
            @if ($student->image)
                <img src="{{ asset('upload' . $student->image) }}" width="100">
                <br>
                <input type="checkbox" name="remove_image" value="1"> Remove Image
            @endif
        </div>

        <div class="mb-3">
            <label>Upload New Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email ID</label>
            <input type="email" name="email_id" class="form-control" value="{{ $student->email_id }}" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $student->last_name }}" required>
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $student->username }}" required>
        </div>

        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" value="{{ $student->date_of_birth }}" required>
        </div>

        <div class="mb-3">
            <label>Standard</label>
            <input type="text" name="standard" class="form-control" value="{{ $student->standard }}" required>
        </div>

        <div class="mb-3">
            <label>Gender</label>
            <select name="gender" class="form-control" required>
                <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Entry Year</label>
            <select name="entry_year" class="form-control" required>
                <option value="">Select Year</option>
                @for ($year = date('Y'); $year >= 2000; $year--)
                    <option value="{{ $year }}" {{ $student->entry_year == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection