@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - Permission
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Permission</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/admin/permissions') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                @if(\Auth::user()->can('upermissions_edit') || \Auth::user()->hasRole('administrator'))
                <a href="{{ url('/admin/permissions/' . $permission->id . '/edit') }}" title="Sửa Permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                @endif
                @if(\Auth::user()->can('permissions_delete') || \Auth::user()->hasRole('administrator'))
                {!! Form::open([
                    'id' => 'frmDelete_'. $permission->id,
                    'method' => 'DELETE',
                    'url' => ['/admin/permissions', $permission->id],
                    'style' => 'display:inline'
                ]) !!}
                <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                            $('#frmDelete_{{ $permission->id }}').submit();
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
                                <td>{{ $permission->id }}</td> <td> {{ $permission->name }} </td><td> {{ $permission->label }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection