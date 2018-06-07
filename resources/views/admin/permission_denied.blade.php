@extends('layouts.backend')

@section('content')
<!-- Main content -->
<section class="content">

    <div class="error-page">
        <h2 class="headline text-red">Lỗi</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i> Không có quyền truy cập</h3>

            <p>
                Bạn không có quyền truy cập vào chức năng này.<br>
                Vui lòng liên hệ với quản trị viên
            </p>
            <a href="{{ url('/admin') }}">
                <i class="fa fa-reply" aria-hidden="true"></i>
                Quay lại trang quản trị
            </a>

        </div>
    </div>
    <!-- /.error-page -->

</section>
<!-- /.content -->
@endsection
