<?php $__env->startSection('content'); ?>

<div class="container">
    <br>
    <br>

<?php if(session('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Well Done!</strong> <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<?php if(session('errors')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Well Done!</strong> <?php echo e(session('errors')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<h6 class="text-center"> Product List </h6>




<a class="btn btn-sm btn-primary mb-3" href="<?php echo e(route('product.index')); ?>"> Back </a>




<table class="table table-bordered">

    <thead>
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>


    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <tr>
            <th scope="row" class="text-center"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->image); ?></td>
            <td><?php echo e($product->stock); ?></td>

            <td>
                <a class="btn btn-sm btn-primary" href="<?php echo e(route('product.restore', $product->id)); ?>">Restore</a>


<form action="<?php echo e(route('product.forcedelete', $product->id)); ?>"  method="POST"
    style="display: inline">

    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger"> Force Delete</button>
</form>




            </td>
          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
  </table>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/product/trashlist.blade.php ENDPATH**/ ?>