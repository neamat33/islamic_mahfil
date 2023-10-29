<?php $__env->startSection('page-title','Create Member'); ?>
<?php $__env->startSection('content'); ?>
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        
        <form action="<?php echo e(route('speakers.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row clearfix g-3">


            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5>Add Speaker</h5>
                        <a href="<?php echo e(route('speakers.index')); ?>" class="btn btn-info text-white"><i class="fa fa-plus"></i> Speakers List</a>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-4">
                                        <label class="form-label">Name </label><label class="text-danger"> *</label>
                                        <input type="text" name="name" class="form-control" required="" value="<?php echo e(old('name')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('name') ? $errors->first('name') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Title </label><label class="text-danger"> *</label>
                                        <input type="text" name="name" class="form-control" required="" value="<?php echo e(old('name')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('name') ? $errors->first('name') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Mobile No.</label><label class="text-danger"> *</label>
                                        <input type="number" name="phone" class="form-control" required="" value="<?php echo e(old('phone')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('phone') ? $errors->first('phone') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact Person Mobile No.</label>
                                        <input type="number" name="phone" class="form-control" required="" value="<?php echo e(old('phone')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('phone') ? $errors->first('phone') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email </label>
                                        <input type="email"  name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('email') ? $errors->first('email') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Contact Person Email </label>
                                        <input type="email"  name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('email') ? $errors->first('email') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Date Of Birth </label>
                                        <input type="date"  name="dob" class="form-control" value="<?php echo e(old('dob')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('dob') ? $errors->first('dob') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label"> NID </label>
                                        <input type="number"  name="nid" class="form-control" value="<?php echo e(old('nid')); ?>">
                                        <span class="text-danger"><?php echo e($errors->has('nid') ? $errors->first('nid') : ''); ?></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Division</label><label class="text-danger"> *</label>
                                        <select class="form-select" name="division_id" id="division_id" aria-label="Default select example" required>
                                            <option selected="">Select Division..</option>
                                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($division->id); ?>"><?php echo e($division->name.' ( '.$division->bn_name.' )'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Districts</label><label class="text-danger"> *</label>
                                        <select class="form-select" name="district_id" id="district_id" aria-label="Default select example" required>
                                            <option selected="">Select District..</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Upazila</label><label class="text-danger"> *</label>
                                        <select class="form-select" name="thana_id" id="upazila_id" aria-label="Default select example" required>
                                            <option selected="">Select Upazila..</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Unions</label><label class="text-danger"> *</label>
                                        <select class="form-select" name="union_id" id="union_id" aria-label="Default select example" required>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Address Details</label>
                                        <textarea class="form-control" name="address"></textarea>
                                        <span class="text-danger"><?php echo e($errors->has('address') ? $errors->first('address') : ''); ?></span>
                                    </div>
                                </div>
                                <div style="float: right">
                                    <button type="submit" id="prs-submit" class="btn btn-primary mt-4">Save Information</button>
                                </div>
                            </div>  
                        </div>  
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        </form>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Jquery Page Js -->
<script>
    $(document).ready(function() {
      $("#upazila_id").select2();
      $("#union_id").select2();
      $("#designation_id").select2();
      $("#member_designation_id").select2();
    });
    $(function(){

        $("#division_id").on("change", function() {
            let division_id = $(this).val();
            $.ajax({
                url: "<?php echo e(url('admin/get-district')); ?>",
                type: "GET",
                data: {
                    "division_id": division_id,
                },
                success: function(res) {
                    $("#district_id").html(res);
                }
            });
        });
        $("#district_id").on("change", function() {
            let district_id = $(this).val();
            $.ajax({
                url: "<?php echo e(url('admin/get-upazila')); ?>",
                type: "GET",
                data: {
                    "district_id": district_id,
                },
                success: function(res) {
                    $("#upazila_id").html(res);
                }
            });
        });
        $("#upazila_id").on("change", function() {
            let upazila_id = $(this).val();
            $.ajax({
                url: "<?php echo e(url('admin/get-unions')); ?>",
                type: "GET",
                data: {
                    "upazila_id": upazila_id,
                },
                success: function(res) {
                    $("#union_id").html(res);
                }
            });
        });
    });
</script>
<script src="<?php echo e(asset('admin')); ?>/js/template.js"></script>
<script>
    $(function(){
        $("#product_id").select2();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PHP8.2\islamicmahfil\resources\views/admin/member/create.blade.php ENDPATH**/ ?>