<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Name: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group<?php echo e($errors->has('label') ? ' has-error' : ''); ?>">
    <?php echo Form::label('label', 'Label: ', ['class' => 'col-md-2 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('label', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('label', '<p class="help-block">:message</p>'); ?>

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