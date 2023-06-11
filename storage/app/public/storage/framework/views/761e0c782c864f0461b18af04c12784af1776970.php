<?php $__env->startSection('content'); ?>



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="<?php echo e(route('color.index')); ?>"> Back </a>
<div class="card-body">
    <form action="<?php echo e(route('color.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="name" class="form-label">Color Name</label>
            <input
            type="text"
            class="form-control"
            name="title"
            placeholder ="PLZ Enter Color Name"
            value="<?php echo e(old('name')); ?>">


          </div>

          Is Active
            <input
            type="checkbox"
            name="is_active"
            value="1"/>

          <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
<span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

<div>
    <button class="btn btn-sm btn-primary" type="submit"> Save </button>
</div>

              </form>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/colors/create.blade.php ENDPATH**/ ?>