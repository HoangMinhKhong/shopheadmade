<div class=" form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Tên: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class=" form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('content', 'Nội dung: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="ckeditor col-md-6">
     {!! Form::textarea('content', null, ['class' => 'form-control input-md ckeditor', 'placeholder' => 'Nhập nội dung', 'id' => 'content-md']) !!}
     {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
 </div>
</div>
<div class="form-group{{ $errors->has('price') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Giá mua vào: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('retail_price') ? ' has-error' : ''}}">
    {!! Form::label('retail_price', 'giá bán lẻ: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('retail_price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('source') ? ' has-error' : ''}}">
    {!! Form::label('source', 'Nguồn gốc: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('source', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('source', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('quantity') ? ' has-error' : ''}}">
    {!! Form::label('quantity', 'Số lượng: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('image') ? ' has-error' : ''}}">
    {!! Form::label('image', 'Chọn tệp đính kèm: ', ['class' => 'col-md-2 control-label', 'enctype' => 'multipart/form-data', 'name' => 'image']) !!}
    <div class="col-md-6">
    <img style="height: 100px;width: 100px" class="img" src="{{ asset('upload/image/'.$bookmark->image) }}" />
    {!! Form::file('files[]', ['class' => 'form-control', 'multiple' => 'true', 'id' => 'file', 'enctype' => 'multipart/form-data', 'name' => 'image']) !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div> 
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-md-4">

    	<button type="submit" class="btn btn-success" title="Lưu" onclick="return d2tConfirmSave(function(){
            $('#frmSave').submit();});">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu
        </button>
    </div>
</div>