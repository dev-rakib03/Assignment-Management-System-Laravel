@extends('backend.teacher.layouts.app')
@section('title','All Classes')
@section('css')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <a href="{{ route('class.create') }}" class="btn btn-primary">{{ __('common.add') }}</a>
    </div>
    <div class="card-body">
        <table id="class" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.id') }}</th>
                    <th>{{ __('common.class') }}</th>
                    <th>{{ __('common.subject') }}</th>
                    <th>{{ __('common.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $key=>$class)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $class->id }}</td>
                        <td>{{ $class->class_name }}</td>
                        <td>
                            @php
                                $subjects = json_decode($class->subjects);
                                if (!$subjects) {
                                    $subjects = [];
                                }
                            @endphp
                            @foreach ($subjects as $key=>$subject)
                                <div>->{{ $subject }}</div>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('class.show', $class->id) }}" class="btn btn-info text-white">{{ __('common.view') }}</a>
                            <a href="{{ route('class.edit', $class->id) }}" class="btn btn-warning text-white">{{ __('common.edit') }}</a>
                            <a href="{{ route('class.destroy', $class->id) }}" class="btn btn-danger" onclick="deletevalidateForm('detete-{{$class->id}}')">{{ __('common.delete') }}</a>
                            <form id="detete-{{ $class->id }}" action="{{ route('class.destroy', $class->id) }}" method="POST" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.id') }}</th>
                    <th>{{ __('common.class') }}</th>
                    <th>{{ __('common.subject') }}</th>
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
    <script src='{{ asset('/') }}backend/js/sweetalert.js'></script>
    <script id="rendered-js" >
        $(document).ready(function () {
            $('#class').DataTable();
        });
    </script>
@endsection
