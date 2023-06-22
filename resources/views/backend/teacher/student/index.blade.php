@extends('backend.teacher.layouts.app')
@section('title','All Students')
@section('css')
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css'>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
      <a href="{{ route('student.create') }}" class="btn btn-primary">{{ __('common.add') }}</a>
    </div>
    <div class="card-body">
        <table id="user" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('common.id') }}</th>
                    <th>{{ __('common.name') }}</th>
                    <th>{{ __('common.email') }}</th>
                    <th>{{ __('common.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('student.show', $user->id) }}" class="btn btn-info text-white">{{ __('common.view') }}</a>
                            <a href="{{ route('student.edit', $user->id) }}" class="btn btn-warning text-white">{{ __('common.edit') }}</a>
                            <a href="{{ route('student.destroy', $user->id) }}" class="btn btn-danger" onclick="deletevalidateForm('detete-{{$user->id}}')">{{ __('common.delete') }}</a>
                            <form id="detete-{{ $user->id }}" action="{{ route('student.destroy', $user->id) }}" method="POST" class="d-none">
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
                    <th>{{ __('common.name') }}</th>
                    <th>{{ __('common.email') }}</th>
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
            $('#user').DataTable();
        });
    </script>
@endsection
