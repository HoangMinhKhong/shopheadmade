<?php $__env->startSection('page_title'); ?>
<?php echo e(config('app.name', '')); ?> - Bookmark
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Bookmark</h3>
            </div>
            <div class="box-body">
                <a href="<?php echo e(url('/admin/permissions')); ?>" title="Quay lại danh sách"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách</button></a>
                <?php if(\Auth::user()->can('upermissions_edit') || \Auth::user()->hasRole('administrator')): ?>
                <a href="<?php echo e(url('/admin/bookmark/' . $bookmark->id . '/edit')); ?>" title="Sửa Permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                <?php endif; ?>
                <?php if(\Auth::user()->can('bookmark_delete') || \Auth::user()->hasRole('administrator')): ?>
                <?php echo Form::open([
                    'id' => 'frmDelete_'. $bookmark->id,
                    'method' => 'DELETE',
                    'url' => ['/admin/bookmark', $bookmark->id],
                    'style' => 'display:inline'
                ]); ?>

                <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                            $('#frmDelete_<?php echo e($bookmark->id); ?>').submit();
                        });">
                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                </button>
                <?php echo Form::close(); ?>

                <?php endif; ?>
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID.</th> 
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Giá bán</th>
                                <th>Giá nhập</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($bookmark->id); ?></td> 
                                <td> <?php echo e($bookmark->name); ?> </td>
                                <td>
                                    <img style="height: 100px;width: 100px" class="img" src="<?php echo e(asset('upload/image/'.$bookmark->image)); ?>" />
                                </td>    
                                <td><?php echo e($bookmark->price); ?></td>
                                <td><?php echo e($bookmark->retail_price); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>