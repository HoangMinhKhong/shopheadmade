@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - Role
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/roles') }}">Role</a></li>
<li class="active">Chỉnh sửa</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa Role</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/admin/roles') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                <br />
                <br />

                @if ($errors->any())
                    <div class="callout callout-danger">
                        <h4><i class="icon fa fa-ban"></i> Lỗi nhập dữ liệu!</h4>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {!! Form::model($role, [
                    'method' => 'PATCH',
                    'url' => ['/admin/roles', $role->id],
                    'class' => 'form-horizontal',
                    'id' => 'frmSave'
                ]) !!}

                @include ('admin.roles.form', ['submitButtonText' => 'Update'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
