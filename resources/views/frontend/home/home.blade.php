@extends('frontend.layouts.app')
@section('title','Home')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
            <h1>Welcome to the Assignment Management System</h1>
            <p class="lead">Manage assignments, students, teachers, and generate reports effortlessly.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
        </div>
    </div>
</div>
@endsection
