<?php $__env->startSection('title'); ?>
    Регистрация
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="register">
        <div class="register__container container">
            <h1 class="register__title">Форма регистрации</h1>
            <form class="register__form" action="<?php echo e(route("register.store")); ?>" method="post">
                <?php echo csrf_field(); ?>
                <label for="name" class="register__label">
                    <span class="register__text">Введите имя: </span>
                    <input value="<?php echo e(old('name')); ?>" type="text" class="register__input" name="name" placeholder="Имя">
                    <?php $__errorArgs = ['name'];
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

                <label for="email" class="register__label">
                    <span class="register__text">Введите email: </span>
                    <input value="<?php echo e(old('email')); ?>" type="email" class="register__input" name="email"  placeholder="Email">
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

                <label for="password" class="register__label">
                    <span class="register__text">Введите пароль: </span>
                    <input value="<?php echo e(old('password')); ?>" type="password" class="register__input" name="password" placeholder="Пароль">
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
                <label for="password_confirmation" class="register__label">
                    <span class="register__text">Подтвердите пароль: </span>
                    <input value="<?php echo e(old('password_confirmation')); ?>" type="password" class="register__input" name="password_confirmation" placeholder="Повторите пароль">
                </label>
                <button class="register__button" type="submit">Отправить</button>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/service/register.blade.php ENDPATH**/ ?>