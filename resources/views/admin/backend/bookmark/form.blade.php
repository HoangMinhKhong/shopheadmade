<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Tên: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Tên: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- <div class="ckeditor form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('content', 'Nội dung: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="ckeditor col-md-6">
       {!! Form::textarea('content', null, ['class' => 'form-control input-md ckeditor', 'placeholder' => 'Nhập nội dung', 'id' => 'content-md']) !!}
        {!! $errors->first('content', '<p class="ckeditor help-block">:message</p>') !!}
    </div>
</div> -->
<!-- <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Giá mua vào: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'giá bán lẻ: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('retail_price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Nguồn gốc: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('source', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Số lượng: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Chọn tệp đính kèm: ', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-6">
    <img style="height: 100px;width: 100px" class="img" src="{{ asset('upload/image/'.$bookmark->image) }}" />
        {!! Form::file('files[]', ['class' => 'form-control', 'multiple' => 'true', 'id' => 'file']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->
<div class="form-group">
    <div class="col-md-offset-2 col-md-4">
    
    	<button type="submit" class="btn btn-success" title="Lưu" onclick="return d2tConfirmSave(function(){
                    $('#frmSave').submit();});">
    		<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu
    	</button>
    </div>
</div>