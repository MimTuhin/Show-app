<table>
    <thead>
    <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>
        <th scope="col">Stock</th>

    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->image); ?></td>
            <td><?php echo e($product->stock); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH F:\Web\show-app\resources\views/admin/product/excel.blade.php ENDPATH**/ ?>