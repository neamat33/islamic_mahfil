<?php $__env->startSection('page-title','Member List'); ?>

<?php $__env->startSection('content'); ?>
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?php echo e(session('error')); ?>

                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5>Members List</h5>
                                <a href="<?php echo e(route('speakers.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Add Speaker</a>
                            </div>
                        </div>
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover table-bordered" style="width: 100%;">
                            <thead>
                                <tr class='table-secondary'>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Occupation</th>
                                    <th>Designation</th>
                                    <th>Addres</th>
                                    <th>Union</th>
                                    <th>Membership Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong><?php echo e(++$key); ?></strong></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->phone); ?></td>
                                    <td><?php echo e($item->occupation); ?></td>
                                    <td><?php echo e($item->designation); ?></td>
                                    <td><?php echo e($item->upazila); ?></td>
                                    <td><?php echo e($item->union); ?></td>
                                    <td><?php echo e(date('d-M-Y',strtotime($item->join_date))); ?></td>
                                    <td class="text-center">

                                        <form action="<?php echo e(route('speakers.destroy',encrypt($item->id))); ?>" method="Post">
                                            <a class="btn btn-sm btn-info text-white btnShow" href="" data-id="<?php echo e($item->id); ?>" data-bs-toggle="modal" data-bs-target="#ShowModal"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-sm btn-primary" href="<?php echo e(route('speakers.edit',encrypt($item->id))); ?>"><i class="fa fa-edit"></i></a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash text-white"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>

<div class="modal fade  mb-5" id="ShowModal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Designation</h5>
                    </div>
                    <form action="<?php echo e(route('designations.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div id="show_info" class="modal-body">
                            
                            
                        </div>

                        <div class="modal-footer">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Jquery Page Js -->
<script src="<?php echo e(asset('admin')); ?>/js/template.js"></script>
<script>
    $('#myDataTable')
    .addClass( 'nowrap' )
    .dataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
</script>

<script>
    $(function(){
        $(".btnShow").click(function(){
           let id = $(this).data('id');
           $.ajax({
               url:"<?php echo e(url('members/show')); ?>",
               type:'GET'
               data:{'id':id},
               success: function(res){
                   console.log(res)
               }
           })
        })
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP8.2\islamicmahfil\resources\views/admin/member/list.blade.php ENDPATH**/ ?>