<?php $__env->startSection('page_title'); ?>
<?php echo e(config('app.name', '')); ?> - Permission
<?php $__env->stopSection(); ?>


<?php $__env->startSection('breadcrumb'); ?>
<li class="active">Permissions</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Permissions</h3>
            </div>
            <div class="box-body">
                <?php if(\Auth::user()->can('permissions_create') || \Auth::user()->hasRole('administrator')): ?>
                <a href="<?php echo e(url('/admin/permissions/create')); ?>" class="btn btn-success btn-sm" title="Thêm mới Permission">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>
                <?php else: ?>
                <div style="display: inline-block; padding: 6px 12px;">&nbsp;</div>
                <?php endif; ?>

                <?php echo Form::open(['method' => 'GET', 'url' => '/admin/permissions', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Từ khóa..." value="<?php echo e(request('search')); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" title="Tìm kiếm">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <?php echo Form::close(); ?>


                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <?php if(\Auth::user()->can('permissions_delete') || \Auth::user()->hasRole('administrator')): ?>
                                <th width="50">
                                    <input type="checkbox" class="iCheckAll iCheck" 
                                        icheck 
                                        ng-model="_selecteManag.selectAllFlag"
                                        ng-click="toggleAll(_selecteManag)"
                                    >
                                </th>
                                <?php endif; ?>
                                <th>Name</th><th>Label</th>
                                <th width="200">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php if(\Auth::user()->can('permissions_delete') || \Auth::user()->hasRole('administrator')): ?>
                                <td width="50">
                                    <input type="checkbox" class="iCheck iCheckItem" value="<?php echo e($item->id); ?>" 
                                        icheck 
                                        ng-model="_selecteManag.selected[<?php echo e($item->id); ?>]"
                                        ng-click="toggleOne(_selecteManag)"
                                        ng-init="_selecteManag.selected[<?php echo e($item->id); ?>] = false"
                                    >
                                </td>
                                <?php endif; ?>
                                <td><a href="<?php echo e(url('/admin/permissions', $item->id)); ?>"><?php echo e($item->name); ?></a></td><td><?php echo e($item->label); ?></td>
                                <td width="150">
                                    <a href="<?php echo e(url('/admin/permissions/' . $item->id)); ?>" title="View Permission"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <?php if(\Auth::user()->can('permissions_edit') || \Auth::user()->hasRole('administrator')): ?>
                                    <a href="<?php echo e(url('/admin/permissions/' . $item->id . '/edit')); ?>" title="Edit Permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->can('permissions_delete') || \Auth::user()->hasRole('administrator')): ?>
                                    <?php echo Form::open([
                                        'id' => 'frmDelete_'. $item->id,
                                        'method'=>'DELETE',
                                        'url' => ['/admin/permissions', $item->id],
                                        'style' => 'display:inline'
                                    ]); ?>

                                    <button type="submit" class="btn btn-danger btn-xs" title="Xóa" onclick="return d2tConfirmDelete(function(){
                                                $('#frmDelete_<?php echo e($item->id); ?>').submit();
                                            });">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                    </button>
                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="box-footer clearfix">
                <?php if(\Auth::user()->can('permissions_delete') || \Auth::user()->hasRole('administrator')): ?>
                <div class="pull-left">
                    <?php echo Form::open([
                        'id' => 'frmDeleteBatch',
                        'method'=>'POST',
                        'url' => ['/admin/permissions/batch-remove'],
                        'style' => 'display:inline'
                    ]); ?>

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
                    <?php echo Form::close(); ?>

                </div>
                <?php echo $permissions->appends(['search' => Request::get('search')])->render(); ?>

            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>