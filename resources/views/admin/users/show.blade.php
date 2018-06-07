@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - User
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/users') }}">User</a></li>
<li class="active">Xem chi tiết</li>
@endsection
@section('content') 
<div class="row" ng-controller="usersController">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User</h3>
            </div>
            <div class="box-body">

                <a href="{{ url('/admin/users') }}" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                @if(\Auth::user()->can('users_edit') || \Auth::user()->hasRole('administrator'))
                <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Sửa User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                @endif

                @if(\Auth::user()->can('users_delete') || \Auth::user()->hasRole('administrator'))
                {!! Form::open([
                    'id' => 'frmDelete_'. $user->id,
                    'method' => 'DELETE',
                    'url' => ['/admin/users', $user->id],
                    'style' => 'display:inline'
                ]) !!}
                <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                            $('#frmDelete_{{ $user->id }}').submit();
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
                                <th>ID.</th> <th>Name</th><th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td> <td> {{ $user->name }} </td><td> {{ $user->email }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

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
