@extends('backend.student.layouts.app')
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
                    @php
                        if ($assignment->status=='active') {
                            $flag = false;
                            foreach ($submittedassignments as $submittedassignment){
                                if ($submittedassignment->student_id==Auth::user()->id && $submittedassignment->assignment_id==$assignment->id) {
                                    $flag = true;
                                    break;
                                }
                            }
                            if ($flag) {
                                $status='completed';
                            }
                            else {
                                if ($assignment->last_date<=date('Y-m-d')) {
                                    $status='overdue';
                                }
                                else {
                                    $status='pending';
                                }
                            }
                        }
                        //dd($assignment->submittedassignment);
                    @endphp
                    <label class="p-2 text-white rounded {{ $status=='pending'? 'bg-warning':'' }}{{ $status=='completed'? 'bg-success':'' }}{{ $status=='overdue'? 'bg-danger':'' }}">
                        {{ $status }}
                    </label>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 text-md-end fw-bold">{{ __('common.description') }} : </label>
                <div class="col-md-6">
                    <label>@php echo $assignment->description @endphp</label>
                </div>
            </div>
            @if ($status!='completed')

                        <form method="POST" action="{{ route('student.submitted.assignment.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="assignment_file" class="col-md-4 col-form-label text-md-end">{{ __('common.assignmentfile') }}</label>
                                <div class="col-md-6">
                                    <input type="hidden" readonly name="assignment_id" value="{{ $assignment->id }}">
                                    <input type="hidden" readonly name="teacher_id" value="{{ $assignment->user->id }}">
                                    <input id="assignment_file" type="file"
                                    accept="application/pdf"
                                    class="form-control @error('assignment_file') is-invalid @enderror"
                                    name="assignment_file">

                                    @error('assignment_file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="file" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-success">{{ __('common.submitnow') }}</button>
                                </div>
                            </div>
                        </form>

            @endif
    </div>
</div>
@endsection
@section('script')

@endsection
