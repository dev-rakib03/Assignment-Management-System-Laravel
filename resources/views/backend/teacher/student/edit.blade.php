@extends('backend.teacher.layouts.app')
@section('title','Edit Student')
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Add Student
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('student.update',$user->id) }}">
            @method('PUT')
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name ?? "" }}" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email ?? "" }}" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} ({{ __('common.optional') }})</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('common.role') }}</label>

                <div class="col-md-6">
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="student" {{ $user->role=='student'? 'selected': '' }}>Student</option>
                        <option value="teacher" {{ $user->role=='teacher'? 'selected': '' }}>Teacher</option>
                    </select>

                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">
                        {{ __('common.update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')

@endsection
