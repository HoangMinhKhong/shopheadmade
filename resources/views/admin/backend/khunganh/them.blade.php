@extends('backend.layout.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Bookmark
					<small>Thêm</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}<br/>
					@endforeach
				</div>
				@endif
				@if(session('loi'))
				<div class="alert alert-success">
					{{session('loi')}}
				</div>
				@endif
				@if(session('bookmark'))
				<div class="alert alert-success">
					{{session('bookmark')}}
				</div>
				@endif
				<form action="admin/bookmark/news" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<div class="form-group">
						<label>Tên</label>
						<input class="form-control" name="name" placeholder="Nhập tên vào đây" />
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<textarea id="demo" name="content" class="form-control ckeditor" rows="3" name="txtContent"></textarea>
					</div>
					<div class="form-group">
						<label>Giá mua vào</label>
						<input class="form-control" name="price" placeholder="Nhập giá sản phẩm" />
					</div>
					<div class="form-group">
						<label>Giá bán lẻ</label>
						<input class="form-control" name="retail_price" placeholder="Nhập giá bán sản phẩm" />
					</div>
					<div class="form-group">
						<label>Nguồn gốc</label>
						<input class="form-control" name="source" placeholder="Nhập nguồn gốc sản phẩm" />
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<input type="file" name="Hinh" class="form-control">
					</div>
					<button type="submit" class="btn btn-default">Thêm</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection