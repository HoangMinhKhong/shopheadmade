@extends('layouts.backend')

@section('page_title')
{{ config('app.name', '') }} - User
@endsection

@section('breadcrumb')
<li><a href="{{ url('/admin/users') }}">User</a></li>
@endsection
@section('content')
<div class="row" ng-controller="usersController">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">User</h3>
            </div>
            <div class="box-body">
                @if(\Auth::user()->can('users_create') || \Auth::user()->hasRole('administrator'))
                <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Thêm mới User">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>
                @else
                <div style="display: inline-block; padding: 6px 12px;">&nbsp;</div>
                @endif

                {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Từ khóa..." value="{{request('search')}}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" title="Tìm kiếm">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                {!! Form::close() !!}

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                @if(\Auth::user()->can('users_delete') || \Auth::user()->hasRole('administrator'))
                                <th width="50">
                                    <input type="checkbox" class="iCheckAll iCheck" 
                                        icheck 
                                        ng-model="_selecteManag.selectAllFlag"
                                        ng-click="toggleAll(_selecteManag)"
                                    >
                                </th>
                                @endif
                                <th>Name</th><th>Email</th>
                                <th width="200">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                @if(\Auth::user()->can('users_delete') || \Auth::user()->hasRole('administrator'))
                                <td width="50">
                                    <input type="checkbox" class="iCheck iCheckItem" value="{{ $item->id }}" 
                                        icheck 
                                        ng-model="_selecteManag.selected[{{ $item->id }}]"
                                        ng-click="toggleOne(_selecteManag)"
                                        ng-init="_selecteManag.selected[{{ $item->id }}] = false"
                                    >
                                </td>
                                @endif
                                <td><a href="{{ url('/admin/users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ url('/admin/users/' . $item->id) }}" title="View User"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    
                                    @if(\Auth::user()->can('users_edit') || \Auth::user()->hasRole('administrator'))
                                    <a href="{{ url('/admin/users/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    @endif

                                    @if(\Auth::user()->can('users_delete') || \Auth::user()->hasRole('administrator'))
                                    {!! Form::open([
                                        'id' => 'frmDelete_'. $item->id,
                                        'method' => 'DELETE',
                                        'url' => ['/admin/users', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                                                $('#frmDelete_{{ $item->id }}').submit();
                                            });">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                    </button>
                                    {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="box-footer clearfix">
                @if(\Auth::user()->can('users_delete') || \Auth::user()->hasRole('administrator'))
                <div class="pull-left">
                    {!! Form::open([
                        'id' => 'frmDeleteBatch',
                        'method'=>'POST',
                        'url' => ['/admin/users/batch-remove'],
                        'style' => 'display:inline'
                    ]) !!}
                    <input type="hidden" name="ids" class="batchInputHidden"/>
                    <button type="button" class="btn btn-danger" title="Xóa"
                        onclick="return d2tConfirmDelete(function(){
                            var itemChecked = [];
                            $('.iCheckItem').each(function() {
                                if ($(this).is(':checked')) {
                                    itemChecked.push($(this).val());
                                }
                            });

                            if (itemChecked.length > 0) {
                                var str = itemChecked.join(',');
                                $('.batchInputHidden').val(str);
                                $('#frmDeleteBatch').submit();
                            } else {
                                d2tAlert('Bạn cần phải chọn ít nhất một bản ghi');
                            }
                        });"
                    >
                        <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa đồng loạt
                    </button>
                    {!! Form::close() !!}
                </div>
                {!! $users->appends(['search' => Request::get('search')])->render() !!}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
app.controller('usersController', ['$scope', '$http', '$filter', function($scope, $http, $filter) {
    $scope.listData = {!! json_encode($users) !!};
}]);
</script>
@endsection