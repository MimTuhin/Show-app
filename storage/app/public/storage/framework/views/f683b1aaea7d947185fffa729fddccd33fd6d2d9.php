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




<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_create')): ?>
<a class="btn btn-sm btn-primary mb-3" href="<?php echo e(route('product.create')); ?>"> Add New Product </a>
<?php endif; ?>


<div class="d-flex justify-content-end">
    <a class="btn btn-sm btn-secondary m-1" href="<?php echo e(route('product.excel')); ?>" >Download Excel </a>
    <a class="btn btn-sm btn-success m-1" href="<?php echo e(route('product.pdf')); ?>"> PDF </a>

    <a class="btn btn-sm btn-warning m-1" href="<?php echo e(route('product.trashlist')); ?>"> Trash Bin </a>
</div>


<table class="table table-bordered" id="datatablesSimple">

    <thead class="table-dark">
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Colors</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>


    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>
            <th scope="row" class="text-center"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e($data->name); ?></td>
            <td><?php echo e($data->category->name ?? 'No Category'); ?></td>
            <td>
<?php $__currentLoopData = $data->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($color->title ?? ''); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
            <td><?php echo e($data->price); ?></td>


            <td>
                

<?php if(file_exists(storage_path().'/app/public/products'.$data->image) &&
(!is_null($data->image))): ?>


<img src="<?php echo e(asset('storage/products'.$data->image)); ?>" height="70">


<?php else: ?>
<img class="img-fluid w-100" src="<?php echo e(asset('img/images.png')); ?>" Style="height: 70px">

<?php endif; ?>

            </td>
            <td><?php echo e($data->stock); ?></td>

            <td>
                <button class="btn btn-sm btn-primary">Show</button>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_edit')): ?>
                <a class="btn btn-sm btn-secondery" href="<?php echo e(route('product.edit', $data->id)); ?>">Edit</a>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_delete')): ?>

                <form action="<?php echo e(route('product.destroy', $data->id)); ?>" method="POST"
                    style="display: inline">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>
                </form>

                <?php endif; ?>






            </td>
          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
  </table>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/product/index.blade.php ENDPATH**/ ?>