<?php $__env->startSection('content'); ?>

<div class="container">

    <a class="btn btn-primary btn-sm" href="<?php echo e(route('product.index')); ?>"> Back </a>

    

<form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">

    <?php echo csrf_field(); ?>

    <div class="mb-3">
<label>Category</label>
<select class="form-control" name="category_id">

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name ?? ''); ?></option>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</select>
    </div>





        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder ="PLZ Enter Product Name"
          value="<?php echo e(old('name')); ?>">

        </div>

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


                  <div class="mb-3">
                    <label>Colors</label> <br>
                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="checkbox" name="color_id[]" value="<?php echo e($color->id); ?>"/> <?php echo e($color->title); ?> <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </div>
                  
                  

                   --

                  <label>Upload Image</label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">

                  <div>
                    <button class="btn btn-sm btn-primary"> Save </button>
                  </div>

      </form>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/product/create.blade.php ENDPATH**/ ?>