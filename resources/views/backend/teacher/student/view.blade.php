@extends('backend.teacher.layouts.app')
@section('title',"View Student")
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Student Id : {{ $user->id }}
    </div>
    <div class="card-body">

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('Name') }} : </label>
                <div class="col-md-6">
                    <label>{{ $user->name }}</label>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('Email Address') }} : </label>
                <div class="col-md-6">
                    <label>{{ $user->email }}</label>
                </div>
            </div>
    </div>
</div>
@endsection
@section('script')

@endsection
