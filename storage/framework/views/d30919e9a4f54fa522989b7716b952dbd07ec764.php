<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/session.v1.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
<div class="page-wrap slate">
    <div class="session-form-hold">
        <div class="card text-center">
            <div class="card-body">
                <?php if (session('status')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="https://Ea-Administrator.com/">
                        <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon1.png" alt="Card image cap">
                    </a>
                    <p class="text-muted mb-xxl">New password will be sent to your email address</p>
                    <div class="input-group  input-light mb-md">
                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
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
                                                                            unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email">

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
                    <button type="submit" class="btn btn-raised btn-raised-primary btn-block mb-md">Send Password
                        Reset Link</button>
                    <div class="d-flex justify-content-around">
                        <a href="https://ibank.Ea-Administrator.com/login" class="">Sign In</a>
                        <a href="https://Ea-Administrator.com/register">Create New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>