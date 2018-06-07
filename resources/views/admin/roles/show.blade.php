@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - Role
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/roles') }}">Role</a></li>
<li class="active">Xem chi tiết</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Role</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/admin/roles') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                @if(\Auth::user()->can('roles_edit') || \Auth::user()->hasRole('administrator'))
                <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}" title="Sửa Role"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                @endif
                @if(\Auth::user()->can('roles_delete') || \Auth::user()->hasRole('administrator'))
                {!! Form::open([
                    'id' => 'frmDelete_'. $role->id,
                    'method' => 'DELETE',
                    'url' => ['/admin/roles', $role->id],
                    'style' => 'display:inline'
                ]) !!}
                <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                            $('#frmDelete_{{ $role->id }}').submit();
                        });">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                </button>
                {!! Form::close() !!}
                @endif
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID.</th> <th>Name</th><th>Label</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->label }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
