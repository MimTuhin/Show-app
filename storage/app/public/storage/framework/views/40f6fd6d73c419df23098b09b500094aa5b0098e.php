<table>
    <thead>
    <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>


    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td><?php echo e($category->name); ?></td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH F:\Web\show-app\resources\views/admin/category/excel.blade.php ENDPATH**/ ?>