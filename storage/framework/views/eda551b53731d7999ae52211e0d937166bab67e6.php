<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/dashboard/dist/assets/css/plugins/plugins.bundle.css">
<link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/session.v2.min.css">
<link rel="stylesheet" href="/dashboard/dist/assets/css/custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_content'); ?>
<div class="section-left">
    <div class="section-left-content">
        <h1 class="text-36 font-weight-light text-white">Don't have an account?</h1>
        <p class="mb-24 text-small">Stop wasting time and money. Enjoy banking!</p>
        <a href="https://Ea-Administrator.com/register" type="button" class="btn btn-raised btn-raised-warning">Sign
            Up</a>
    </div>
</div>
<div class="form-holder signin-2 px-xxl">
    <div data-perfect-scrollbar='' data-suppress-scroll-x='true'>
        <div class="d-flex flex-column align-items-center mt-lg mb-xxl">
            <a href="https://Ea-Administrator.com/"><img class="card-img-top signup" src="/dashboard/dist/assets/images/logo.svg" style="height: 100px" alt="Bank Logo"></a>

            <span class="mb-md text-muted mb-lg d-block">Sign in to your account</span>
            <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <form class="" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="input-group with-icon input-light mb-xl">
                <div class="input-group-prepend">
                    <i class="input-group-text material-icons">perm_identity</i>
                </div>
                <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
                                                                        $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                                                        if ($__bag->has($__errorArgs[0])) :
                                                                            if (isset($message)) {
                                                                                $__messageOriginal = $message;
                                                                            }
                                                                            $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                                                                                                                        if (isset($__messageOriginal)) {
                                                                                                                                            $message = $__messageOriginal;
                                                                                                                                        }
                                                                                                                                    endif;
                                                                                                                                    unset($__errorArgs, $__bag); ?>" placeholder="Email Address" value="<?php echo e(old('email')); ?>" aria-label="email" required autocomplete="email" autofocus aria-describedby="basic-addon1">
                <?php $__errorArgs = ['email'];
                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                if ($__bag->has($__errorArgs[0])) :
                    if (isset($message)) {
                        $__messageOriginal = $message;
                    }
                    $message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
                    if (isset($__messageOriginal)) {
                        $message = $__messageOriginal;
                    }
                endif;
                unset($__errorArgs, $__bag); ?>
            </div>
            <div class="input-group with-icon input-light mb-xl">
                <div class="input-group-prepend">
                    <i class="input-group-text material-icons">lock</i>
                </div>
                <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
                                                                            $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                                                                            if ($__bag->has($__errorArgs[0])) :
                                                                                if (isset($message)) {
                                                                                    $__messageOriginal = $message;
                                                                                }
                                                                                $message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
                                                                                                                                            if (isset($__messageOriginal)) {
                                                                                                                                                $message = $__messageOriginal;
                                                                                                                                            }
                                                                                                                                        endif;
                                                                                                                                        unset($__errorArgs, $__bag); ?>" placeholder="Password" value="<?php echo e(old('password')); ?>" aria-label="Password" aria-describedby="basic-addon1" required autocomplete="current-password">

                <?php $__errorArgs = ['password'];
                $__bag = $errors->getBag($__errorArgs[1] ?? 'default');
                if ($__bag->has($__errorArgs[0])) :
                    if (isset($message)) {
                        $__messageOriginal = $message;
                    }
                    $message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
                    if (isset($__messageOriginal)) {
                        $message = $__messageOriginal;
                    }
                endif;
                unset($__errorArgs, $__bag); ?>

            </div>
            <div class="mb-md custom-control custom-checkbox checkbox-primary mb-xl">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                <label class="custom-control-label" for="customCheck2">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-raised btn-raised-primary btn-block">Sign In</button>
            <div class="border-bottom mt-xxl mb-lg"></div>
            <div class="text-center">
                <p>
                    <?php if (Route::has('password.request')) : ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>
                    <?php endif; ?>
                </p>
            </div>
            <div class="border-bottom mt-xxl mb-lg"></div>
            <div class="d-flex-column justify-content-center">
                <div class="text-center">
                    <p class="text-muted m-0">All rights reserved &copy; <?php echo e(\Carbon\Carbon::now()->year); ?> Ea-Administrator
                        Bank
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/auth/login.blade.php ENDPATH**/ ?>