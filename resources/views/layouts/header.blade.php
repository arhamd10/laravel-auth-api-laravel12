<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<!-- Header -->
<div class="header">Student Management System</div>

<!-- Navbar -->
<div class="navbar">
    <a href="{{ route('students.index') }}">Student</a>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>