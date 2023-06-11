<?php $__env->startSection('content'); ?>

<div class="container">
    <a class="btn btn-primary btn-sm" href="<?php echo e(route('product.index')); ?>"> Back </a>

<form action="<?php echo e(route('product.update', $data->id)); ?>" method="POST" enctype="multipart/form-data">

    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" name="category_id">

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($category->id == $data->category_id): ?>

            <option value="<?php echo e($category->id); ?>" selected><?php echo e($category->name ?? ''); ?></option>
            <?php else: ?>
            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name ?? ''); ?></option>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>




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


        <div class="mb-3">
            <label>Colors</label> <br>
            <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="checkbox" name="color_id[]" value="<?php echo e($color->id); ?>"  <?php echo e((in_array($color->id,
                $selectedColors))? "checked" : ""); ?>/> <?php echo e($color->title); ?> <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        
                  <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    >

                  </div>


                  <div>
                    <button class="btn btn-sm btn-primary"> Save </button>
                  </div>
      </form>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/product/edit.blade.php ENDPATH**/ ?>