@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - Role
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/roles') }}">Role</a></li>
<li class="active">Thêm mới</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm mới Role</h3>
            </div>
            <div class="box-body">
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

                {!! Form::open(['url' => '/admin/roles', 'class' => 'form-horizontal', 'id' => 'frmSave']) !!}

                @include ('admin.roles.form')

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
