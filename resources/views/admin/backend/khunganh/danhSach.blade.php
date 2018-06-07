@extends('backend.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bookmark
                            <small>List</small>
                            <small>
                                <a href="admin/backend/bookmark/news">
                                <button class="btn-new">Thêm mới
                                </button></a>
                            </small>
                        </h1>
                    </div>
                    <div>
                        @if(session('Thongbao2'))
                        <div class="alert alert-success">
                            {{session('Thongbao2')}}
                        </div>
                    @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Tình trạng</th>
                                <th>Nguồn gốc</th>
                                <th>Số lượng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($bookmark as $val)
                            <tr class="odd gradeX" align="center">
                                <td>{{$val->id}}</td>
                                <td>{{$val->name}}</td>
                                <td>
                                    <?php if($val->status == 1)
                                    {
                                        echo "Còn hàng";
                                    }else {echo "Hết hàng";}
                                    ?>
                                </td>
                                <td>{{$val->source}}</td>
                                <td>{{$val->quantity}}</td>
                                <td class="center">
                                    <i class="fa fa-trash-o  fa-fw"></i>
                                    <a href="admin/backend/bookmark/xoa/{{$val->id}}">Xóa</a>
                                    <i class="fa fa-pencil fa-fw"></i> 
                                    <a href="admin/backend/bookmark/sua/{{$val->id}}">Sửa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
<style type="text/css">
.btn-new{
    margin-left: 655px;
    background-color: rgb(255, 255, 255)
}
</style>