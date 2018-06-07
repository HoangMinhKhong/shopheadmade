@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - User
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/users') }}">User</a></li>
<li class="active">Chỉnh sửa</li>
@endsection
@section('content')
<div class="row" ng-controller="usersController">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa User</h3>
            </div>
            <div class="box-body">
                <a href="{{ url('/admin/users') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
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

                {!! Form::model($user, [
                    'method' => 'PATCH',
                    'url' => ['/admin/users', $user->id],
                    'class' => 'form-horizontal',
                    'id' => 'frmSave'
                    ]) !!}

                @include ('admin.users.form', ['submitButtonText' => 'Update'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
app.controller('usersController', ['$scope', '$http', '$filter', function($scope, $http, $filter) {
    $scope.objData = {!! json_encode($user) !!};
}]);
</script>
@endsection
