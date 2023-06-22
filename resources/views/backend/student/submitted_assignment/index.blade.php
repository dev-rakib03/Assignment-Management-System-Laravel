@extends('backend.student.layouts.app')
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
                    <th>{{ __('common.teacher') }}</th>
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
                        <td>{{ $assignment->teacher_name }}</td>
                        <td>{{ $assignment->class }}</td>
                        <td>{{ $assignment->subject }}</td>
                        <td>{{ $assignment->section }}</td>
                        <td>{{ $assignment->title }}</td>
                        <td>{{ date('d M, Y', strtotime($assignment->created_at)) }}</td>
                        <td>{{  $assignment->marks?round($assignment->marks,2):'pending' }}</td>
                        <td>
                            <a href="{{ url('/') }}{{ $assignment->file_link }}" target="_blank" class="btn btn-info text-white">{{ __('common.view') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.teacher') }}</th>
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
