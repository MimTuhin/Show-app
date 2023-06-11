<?php $__env->startSection('content'); ?>



<div class="container">

<br>
<a class="btn btn-primary btn-sm" href="<?php echo e(route('category.index')); ?>"> List </a>
<div class="card-body">

    Category:
    Name:<?php echo e($category->name); ?>

<br>

Products List:

<?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<li><?php echo e($product->name); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/category/products.blade.php ENDPATH**/ ?>