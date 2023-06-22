@extends('backend.teacher.layouts.app')
@section('title','All Submitted Assignment')
@section('css')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ __('sidebar.submittedassignment') }}</h3>
    </div>
    <div class="card-body overflow-auto">
        <table id="assignment" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.student') }}</th>
                    <th>{{ __('common.class') }}</th>
                    <th>{{ __('common.subject') }}</th>
                    <th>{{ __('common.section') }}</th>
                    <th>{{ __('common.assignmenttitle') }}</th>
                    <th>{{ __('common.submitteddate') }}</th>
                    <th>{{ __('common.marks') }}</th>
                    <th>{{ __('common.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submittedassignments as $key=>$assignment)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $assignment->student_name }}</td>
                        <td>{{ $assignment->class }}</td>
                        <td>{{ $assignment->subject }}</td>
                        <td>{{ $assignment->section }}</td>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ date('d M, Y', strtotime($assignment->created_at)) }}</td>
                        <td  style="width: 190px;">
                            <form method="POST" action="{{ route('teacher.submitted.assignment.update',$assignment->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="input-group"  style="width: 190px;">
                                    <input oninput="this.value = this.value.replace(/[^0-9.]/g, '') .replace(/^(\d*\.?)|(\.\d*)$/g, '$1$2') .replace(/(\..*?)\..*/g, '$1') .replace(/(\.[0-9]{2})[0-9]+$/g, '$1');" id="marks" type="text" class="form-control @error('marks') is-invalid @enderror" placeholder="0.00" name="marks" value="{{ $assignment->marks ?? '' }}" autocomplete="marks">
                                    <button type="submit" class="btn btn-success">{{ __('save') }}</button>

                                    @error('marks')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </form>
                        </td>
                        <td>
                            <a href="{{ url('/') }}{{ $assignment->file_link }}" target="_blank" class="btn btn-info text-white">{{ __('common.view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.student') }}</th>
                    <th>{{ __('common.class') }}</th>
                    <th>{{ __('common.subject') }}</th>
                    <th>{{ __('common.section') }}</th>
                    <th>{{ __('common.assignmenttitle') }}</th>
                    <th>{{ __('common.submitteddate') }}</th>
                    <th>{{ __('common.marks') }}</th>
                    <th>{{ __('common.action') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
@section('script')
    <script src='https://code.jquery.com/jquery-3.3.1.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js'></script>
    <script src='{{ asset('/') }}backend/js/datatable_custom.js'></script>
@endsection
