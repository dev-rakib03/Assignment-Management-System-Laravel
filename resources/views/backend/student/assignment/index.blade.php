@extends('backend.student.layouts.app')
@section('title','All Assignment')
@section('css')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <a href="{{ route('assignment.create') }}" class="btn btn-primary">{{ __('common.add') }}</a>
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
                    <th>{{ __('common.status') }}</th>
                    <th>{{ __('common.assigndate') }}</th>
                    <th>{{ __('common.lastdate') }}</th>
                    <th>{{ __('common.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $key=>$assignment)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $assignment->user->name }}</td>
                        <td>{{ $assignment->class }}</td>
                        <td>{{ $assignment->subject }}</td>
                        <td>{{ $assignment->section }}</td>
                        <td>{{ $assignment->title }}</td>
                        <td class="text-center">
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
                        </td>
                        <td>{{ date('d M, Y', strtotime($assignment->created_at)) }}</td>
                        <td>{{ date('d M, Y', strtotime($assignment->last_date)) }}</td>
                        <td>
                            @if ($status!='completed')
                                <a href="{{ route('student.assignment.show', $assignment->id) }}" class="btn btn-success">{{ __('common.submitnow') }}</a>
                            @else
                                <a href="{{ route('student.assignment.show', $assignment->id) }}" class="btn btn-info text-white">{{ __('common.view') }}</a>
                            @endif
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
                    <th>{{ __('common.status') }}</th>
                    <th>{{ __('common.assigndate') }}</th>
                    <th>{{ __('common.lastdate') }}</th>
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
