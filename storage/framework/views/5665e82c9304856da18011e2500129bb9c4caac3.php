<?php $__env->startSection('title'); ?>
    Главная
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="hero">
        <div class="container hero__container">
            <h1 class="hero__title">Онлайн конвертер <span>изображений</span></h1>
            <form class="hero__form" action="<?php echo e(route('service.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <label class="hero__label" for="image">
                    <span class="hero__text">Добавьте изображение</span>
                    <input class="hero__input" type='file' multiple name="image[]" id="image">
                    <span class="choose">Выберите файл</span>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </label>
                <label class="hero__label" for="width">
                    <span class="hero__text">Введите ширину изображения</span>
                    <input class="hero__input value="<?php echo e(old('width')); ?>" type="text" name="width" placeholder="Ширина">
                    <?php $__errorArgs = ['width'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </label>
                <label class="hero__label" for="width">
                    <span class="hero__text">Введите высоту изображения</span>
                    <input class="hero__input value="<?php echo e(old('height')); ?>" type="text" name="height" placeholder="Высота">
                    <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </label>
                <label class="hero__label" for="extension">
                    <span class="hero__text">Введите формат изображения</span>
                    <select class="hero__select" name="extension">
                        <option value="0" disabled selected>Выберите изображение</option>
                        <option value="jpg">jpg</option>
                        <option value="png">png</option>
                        <option value="jpeg">jpeg</option>
                    </select>
                </label>
                <button class="hero__button" type="submit">Отправить</button>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/service/index.blade.php ENDPATH**/ ?>