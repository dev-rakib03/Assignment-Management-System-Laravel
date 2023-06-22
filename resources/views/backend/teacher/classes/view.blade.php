@extends('backend.teacher.layouts.app')
@section('title',"View Class")
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Class Id : {{ $class->id }}
    </div>
    <div class="card-body">

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.class') }} : </label>
                <div class="col-md-6">
                    <label>{{ $class->class_name }}</label>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.subject') }} : </label>
                <div class="col-md-6">
                    @php
                        $subjects = json_decode($class->subjects);
                        if (!$subjects) {
                            $subjects = [];
                        }
                    @endphp
                    @foreach ($subjects as $key=>$subject)
                        <div>->{{ $subject }}</div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
@endsection
@section('script')

@endsection
