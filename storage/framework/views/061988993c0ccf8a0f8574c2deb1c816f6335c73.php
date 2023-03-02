<?php $__env->startSection('content'); ?>
    <table class="table pt-5">
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Добавить</th>
            <th scope="col">Удалить</th>
            <th scope="col">Тип пользователя</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td>
                <form action="<?php echo e(route('users.user.edit', $user->id)); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-block btn-primary btn-sm">Редактировать</button>
                </form>
            </td>
            <td>
                <form action="<?php echo e(route('users.user.create')); ?>" method="GET">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-block btn-success btn-sm">Добавить</button>
                </form>
            </td>

            <td>
                <form action="<?php echo e(route('users.user.destroy', $user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-block btn-danger btn-sm">Удалить</button>
                </form>
            </td>
            <td>
                <li><?php echo e(\App\Enums\RoleEnum::from($user->role)->label()); ?></li>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/admin/users/index.blade.php ENDPATH**/ ?>