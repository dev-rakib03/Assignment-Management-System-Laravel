@extends('backend.teacher.layouts.app')
@section('title','Add Class')
@section('css')

@endsection
@section('content')
<div class="card">
    <div class="card-header">
      Add Class
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('class.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="class_name" class="col-md-4 col-form-label text-md-end">{{ __('common.class') }}</label>

                <div class="col-md-6">
                    <input id="class_name" type="text" class="form-control @error('class_name') is-invalid @enderror" name="class_name" value="{{ old('class_name') }}" autocomplete="class_name" autofocus>

                    @error('class_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('common.subject') }}</label>
                <div class="col-md-6" id="subject-all">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <button type="button" class="btn btn-warning text-white" onclick="add_subject_input();">{{ __('common.addsubject') }}</button>
                </div>
            </div>


            <div class="row mb-0 text-center">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">
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
    function add_subject_input() {
        $('#subject-all').append('<div class="input-group">'
                            +'<input id="subject" type="subject" class="form-control mb-2" name="subject[]"  required  autocomplete="subject">'
                            +'<div class="input-group-append">'
                            +'<span class="btn btn-danger rounded-0 rounded-right" onclick="$(this).parent().parent().remove();">X</span>'
                            +'</div>'
                            +'</div>');
    }
    add_subject_input();
</script>
@endsection
