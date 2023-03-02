
<?php $__currentLoopData = $zip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(url('storage/zipArchives/' . $item->name . '.zip')); ?>" download><?php echo e($item->name); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/zip.blade.php ENDPATH**/ ?>