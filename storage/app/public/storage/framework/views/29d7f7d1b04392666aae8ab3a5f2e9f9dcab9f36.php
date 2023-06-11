<?php $__env->startSection('content'); ?>
<br>

<div class="container">

    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done!</strong> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>


<div class="card">
<div class="card-header"> User Profile </div>
<div class="card-body">

<h6> User Information</h6>
Name: <?php echo e(auth()->user()->name); ?>


<h6 class="mt-3">Profile Information</h6>

<form action="<?php echo e(route('user.profile_update')); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<label> Name</label>
<input
type="text"
name="name"
value="<?php echo e(auth()->user()->name ?? ''); ?>"
class="form-control"

/>

<label> Father Name</label>
<input
type="text"
name="father_name"
value="<?php echo e($userProfile->father_name ?? ''); ?>"
class="form-control"

/>







<button type="submit" class="mt-4 btn btn-sm btn-primary">Update Profile</button>
</form>


</div>


</div>




</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>