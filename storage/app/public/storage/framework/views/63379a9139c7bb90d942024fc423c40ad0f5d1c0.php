<?php $__env->startSection('content'); ?>
<br>
<br>

<div class="container">

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

    <div class="card">
        <div class="card-body">

            <a class="btn btn-primary btn-md mb-3" href="<?php echo e(route('category.create')); ?>" > Add New Category </a>

            <div class="d-flex justify-content-end">
                <a class="btn btn-sm btn-secondary m-1" href="<?php echo e(route('category.excel')); ?>">Download Excel </a>

                <a class="btn btn-sm btn-success m-1" href="<?php echo e(route('category.pdf')); ?>"> PDF </a>

                <a class="btn btn-sm btn-warning m-1" href="<?php echo e(route('category.trashlist')); ?>"> Trash Bin </a>
            </div>


<form class="d-flex" action="" method="GET">
    <input name="keyword" class="form-control" placeholder="Serach.."/>
    <button type="submit" class="btn btn-sm btn-primary">
        <i class="fa fa-search"></i>
        Search</button>
</form>


<table class="table table-bordered">

<thead>

<tr>
    <th>Serial no</th>
    <th>Category Name</th>
    <th>Actions</th>
</tr>

</thead>

<tbody>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
    <th scope="row" class="text-center"><?php echo e($loop->iteration); ?></th>
    <td><?php echo e($category->name); ?></td>
    <td>
        <a class="btn btn-sm btn-primary">Show</a>
        <a class="btn btn-sm btn-secondary" href="<?php echo e(route('category.edit', $category->id)); ?>">Edit</a>

        
        <form action="<?php echo e(route('category.destroy', $category->id)); ?>" method="POST"
            style="display: inline">

            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" onclick="return confirm('Are You Sure Want Delete')" class="btn btn-sm btn-danger">Delete</button>

<a href="<?php echo e(route('categories.products', $category->id)); ?>"> Products </a>


        </form>

    </td>

        </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




</tbody>

</table>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/category/index.blade.php ENDPATH**/ ?>