<?php $__env->startSection('page_title'); ?>
<?php echo e(config('app.name', '')); ?> - Bookmark
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li><a href="<?php echo e(url('/admin/backend/bookmark')); ?>">Bookmark</a></li>
<li class="active">Thêm mới</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Sửa Bookmark</h3>
            </div>
            <div class="box-body">
                <a href="<?php echo e(url('/admin/bookmark')); ?>" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                <br />
                <br />

                <?php if($errors->any()): ?>
                    <div class="callout callout-danger">
                        <h4><i class="icon fa fa-ban"></i> Lỗi nhập dữ liệu!</h4>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <?php echo Form::model($bookmark, [
                    'method' => 'PATCH',
                    'url' => ['/admin/bookmark', $bookmark->id],
                    'class' => 'form-horizontal',
                    'id' => 'frmSave'
                ]); ?>


                <?php echo $__env->make('admin.backend.bookmark.form', ['submitButtonText' => 'Update'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>