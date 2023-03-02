<?php $__env->startSection('title'); ?>
    Авторизация
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="auth">
    <div class="auth__container container">
        <h1 class="auth__title">Вход в аккаунт</h1>
        <form class="auth__form" action="<?php echo e(route('login.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label for="email" class="auth__label">
                <span class="auth__text">Введите email: </span>
                <input type="email" class="auth__input" name="email"  placeholder="Email" value="<?php echo e(old('email')); ?>">
                <?php $__errorArgs = ['email'];
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
            <label for="password" class="auth__label">
                <span class="auth__text">Введите пароль: </span>
                <input type="password" class="auth__input" name="password" placeholder="Пароль" value="<?php echo e(old('password')); ?>">
                <?php $__errorArgs = ['password'];
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
            <button type="submit">Отправить</button>
            <label for="remember" class="auth__label" id="remember_label">
                <input type="checkbox" name="remember" id="remember">
                <span class="auth__text">Запонмить меня</span>
                <form action="<?php echo e(route('forget.index')); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="<?php echo e(route('forget.index')); ?>">Забыли пароль</a>
                </form>
            </label>

        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/service/login.blade.php ENDPATH**/ ?>