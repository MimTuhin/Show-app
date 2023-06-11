<?php $__env->startSection('content'); ?>

<div class="container">
    <br>
    <br>
<h6 class="text-center"> Product List </h6>

<button class="btn btn-sm btn-primary mb-3"> Add New Product </button>
<button class="btn btn-sm btn-secondery mb-3"> PDF </button>
<button class="btn btn-sm btn-success mb-3"> Excel </button>
<button class="btn btn-sm btn-warning mb-3"> Trash Bin </button>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">serial no</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">image</th>
            <th scope="col">stock</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <th scope="row"><?php echo e($loop->iteration); ?></th>
    <td><?php echo e($product->name); ?></td>
    <td><?php echo e($product->price); ?></td>
    <td><?php echo e($product->image); ?></td>
    <td><?php echo e($product->stock); ?></td>
<td>
    <button class="btn btn-sm btn-primary"> Show </button>
    <button class="btn btn-sm btn-secondary"> Edite </button>
    <button class="btn btn-sm btn-danger"> Delete </button>
</td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>
      </table>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/index.blade.php ENDPATH**/ ?>