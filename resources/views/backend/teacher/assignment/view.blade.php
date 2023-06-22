@extends('backend.teacher.layouts.app')
@section('title',"View Assignment")
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <b>{{ $assignment->title }}</b>
    </div>
    <div class="card-body">

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.teacher') }} : </label>
                <div class="col-md-6">
                    <label>{{ $assignment->user->name }}</label>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.class') }} : </label>
                <div class="col-md-6">
                    <label>{{ $assignment->class }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.subject') }} : </label>
                <div class="col-md-6">
                    <label>{{ $assignment->subject }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.section') }} : </label>
                <div class="col-md-6">
                    <label>{{ $assignment->section }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.assigndate') }} : </label>
                <div class="col-md-6">
                    <label>{{ date('d M, Y', strtotime($assignment->created_at)) }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.lastdate') }} : </label>
                <div class="col-md-6">
                    <label>{{ date('d M, Y', strtotime($assignment->last_date)) }}</label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.lastdate') }} : </label>
                <div class="col-md-6">
                    <label class="p-2 text-white rounded {{ $assignment->status=='pending'? 'bg-warning':'' }}{{ $assignment->status=='active'? 'bg-success':'' }}{{ $assignment->status=='closed'? 'bg-danger':'' }}">
                        {{ $assignment->status }}
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.description') }} : </label>
                <div class="col-md-6">
                    <label>@php echo $assignment->description @endphp</label>
                </div>
            </div>
    </div>
</div>
@endsection
@section('script')

@endsection
