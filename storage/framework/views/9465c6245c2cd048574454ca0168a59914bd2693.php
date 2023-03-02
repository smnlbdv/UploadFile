<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<header class="header">
    <div class="header__container container">
        <div class="header__menu">
            <nav class="header__nav">
                <ul class="header__list">
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="header__item"><a href="<?php echo e(route('register.index')); ?>" class="header__link">Зарегстрироваться</a></li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="header__item"><a href="<?php echo e(route('login.index')); ?>" class="header__link">Войти в аккаунт</a></li>
                            <?php endif; ?>
                            <?php if(auth()->guard()->check()): ?>
                        <li class="header__item"><a href="<?php echo e(route('logout')); ?>" class="header__link">Выйти</a></li>
                            <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <?php if(\Illuminate\Support\Facades\Auth::user()->role === \App\Enums\RoleEnum::ADMIN->value): ?>
                                <li><a href="<?php echo e(route('admin.index')); ?>">Войти в админ панель</a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>
    <?php echo $__env->yieldContent('content'); ?>
</body>
</html>
<?php /**PATH D:\OSPANEL\OSPanel\domains\ImagesOperationsService\resources\views/layouts/main.blade.php ENDPATH**/ ?>