@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h2>Add Student</h2>
        
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

           
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="email_id" class="form-label">Email</label>
                <input type="email" name="email_id" id="email_id" class="form-control" value="{{ old('email_id') }}" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
            </div>
            <div class="mb-3">
                <label for="standard" class="form-label">Standard</label>
                <select name="standard" id="standard" class="form-control" required>
                <option value="" disabled selected>Select Standard</option>
                <option value="Nursery">Nursery</option>
                <option value="LKG">LKG</option>
                <option value="UKG">UKG</option>
                      @for($i = 1; $i <= 12; $i++)
                 <option value="{{ $i }}" {{ old('standard') == $i ? 'selected' : '' }}>Class {{ $i }}</option>
                     @endfor
                </select>
             </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="entry_year" class="form-label">Entry Year</label>
                <select name="entry_year" id="entry_year" class="form-control" required>
                    @for ($year = now()->year; $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
             
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>



            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
</div>
@endsection