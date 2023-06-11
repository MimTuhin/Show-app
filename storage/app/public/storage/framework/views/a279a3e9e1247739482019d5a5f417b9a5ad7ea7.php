<?php $__env->startSection('content'); ?>

<div class="container">

<form action="<?php echo e(route('category.update', $data->id)); ?>" method="POST">

    <?php echo csrf_field(); ?>

        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          value="<?php echo e($data->name); ?>"
          placeholder ="PLZ Enter Product Name">

        </div>


<button class="btn btn-sm btn-primary"> Save </button>
      </form>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>