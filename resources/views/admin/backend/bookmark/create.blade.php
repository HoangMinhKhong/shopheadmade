@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - Permission
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/bookmark') }}">Permission</a></li>
<li class="active">Thêm mới</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm mới Permission</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/admin/bookmark') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
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

                {!! Form::open([
                    'url' => '/admin/bookmark', 
                    'class' => 'form-horizontal', 
                    'id' => 'frmSave', 
                    'enctype' => 'multipart/form-data' 
                ]) !!}

                @include ('admin.backend.bookmark.formNew')

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection