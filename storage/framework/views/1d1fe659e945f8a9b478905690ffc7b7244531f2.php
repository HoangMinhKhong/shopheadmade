<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Tên: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('label', 'Tên: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('label', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('label', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<!-- <div class="ckeditor form-group<?php echo e($errors->has('label') ? ' has-error' : ''); ?>">
    <?php echo Form::label('content', 'Nội dung: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="ckeditor col-md-6">
       <?php echo Form::textarea('content', null, ['class' => 'form-control input-md ckeditor', 'placeholder' => 'Nhập nội dung', 'id' => 'content-md']); ?>

        <?php echo $errors->first('content', '<p class="ckeditor help-block">:message</p>'); ?>

    </div>
</div> -->
<!-- <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('label', 'Giá mua vào: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('label', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'giá bán lẻ: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('retail_price', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Nguồn gốc: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('source', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Số lượng: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('quantity', null, ['class' => 'form-control', 'required' => 'required','placeholder' => 'Nhập tiêu tên']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Chọn tệp đính kèm: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
    <img style="height: 100px;width: 100px" class="img" src="<?php echo e(asset('upload/image/'.$bookmark->image)); ?>" />
        <?php echo Form::file('files[]', ['class' => 'form-control', 'multiple' => 'true', 'id' => 'file']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

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