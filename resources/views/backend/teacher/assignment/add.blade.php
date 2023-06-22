@extends('backend.teacher.layouts.app')
@section('title','Add Assignment')
@section('css')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Add Assignment
    </div>
    <div class="card-body">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form method="POST" action="{{ route('assignment.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('common.class') }} & {{ __('common.subject') }}</label>

                <div class="col-md-6">
                    <select id="class" class="form-control @error('class') is-invalid @enderror" name="class">
                        <option value="" selected disabled hidden>{{ __('common.select') }}</option>
                        @foreach ($classes as $class)
                            <optgroup label="{{ $class->class_name }}">
                                @php
                                    $subjects = json_decode($class->subjects);
                                @endphp
                                @foreach ($subjects as $key=>$subject)
                                    <option value="{{ json_encode([$class->class_name,$subject]) }}">{{ $subject }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @error('class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="section" class="col-md-4 col-form-label text-md-end">{{ __('common.section') }}</label>

                <div class="col-md-6">
                    <input id="section" type="text" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}" autocomplete="section">

                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('common.assignmenttitle') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title">

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('common.description') }}</label>

                <div class="col-md-6">
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description"></textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="last_date" class="col-md-4 col-form-label text-md-end">{{ __('common.lastdate') }}</label>

                <div class="col-md-6">
                    <input id="last_date" type="date" class="form-control @error('last_date') is-invalid @enderror" name="last_date" value="{{ old('last_date') }}" autocomplete="last_date">

                    @error('last_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="class" class="col-md-4 col-form-label text-md-end">{{ __('common.status') }}</label>

                <div class="col-md-6">
                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status">
                        <option value="" selected disabled hidden>{{ __('common.select') }}</option>
                        <option value="pending">{{ __('common.pending') }}</option>
                        <option value="active">{{ __('common.active') }}</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-2 text-center">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class=" btn btn-block mybtn btn-primary">
                        {{ __('common.add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('description');
</script>
@endsection
