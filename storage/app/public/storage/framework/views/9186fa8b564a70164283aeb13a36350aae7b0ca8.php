<table style="border: 1px solid black">

    <thead>
      <tr>
        <th scope="col">Serial no</th>
        <th scope="col">Name</th>

      </tr>
    </thead>


    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <tr>
            <th scope="row" class="text-center"><?php echo e($loop->iteration); ?></th>
            <td><?php echo e($category->name); ?></td>

          </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </tbody>
  </table>
<?php /**PATH F:\Web\show-app\resources\views/admin/category/category_pdf.blade.php ENDPATH**/ ?>