@extends('layouts.app')
@section('content')

<h1> Welcome {{Auth::user()->name }}!</h1>
<p> This is your Main Dashboard </p>
@endsection