<?php $__env->startSection('content'); ?>
<br>

<div class="container">

    <?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Well Done!</strong> <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

<div class="container">

    <table class="table table-bordered">
        <thead class="table-dark text-white">
            <tr>
                <th>Ser No</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Bio</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
<tbody>

    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <tr>
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($user->name ?? ''); ?></td>
        <td><?php echo e($user->role->name); ?></td>
        <td><?php echo e($user->email ?? ''); ?></td>
        <td><?php echo e($user->profile->father_name ?? ''); ?></td>
        <td><?php echo e($user->profile->mothar_name ?? ''); ?></td>
        <td><?php echo e($user->profile->bio ?? ''); ?></td>
        <td><?php echo e($user->profile->address?? ''); ?></td>
        <td>
         <a class="btn btn-sm btn-success">Update</a>
        </td>
    </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php endif; ?>




</tbody>

    </table>
</div>





</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Web\show-app\resources\views/admin/users/userlist.blade.php ENDPATH**/ ?>