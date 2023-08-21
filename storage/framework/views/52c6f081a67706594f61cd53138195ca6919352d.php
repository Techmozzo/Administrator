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
                <form method="POST" action="<?php echo e(route('password.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <a href="https://Ea-Administrator.com/">
                        <img class="card-img-top signup mb-md" src="/dashboard/dist/assets/images/favicon1.png" alt="Card image cap">
                    </a>
                    <p class="text-muted mb-xxl">Reset Password</p>
                    <?php echo csrf_field(); ?>

                    <input type="hidden" name="token" value="<?php echo e($token); ?>">

                    <div class="form-group row">
                        <div class="col-md-12">
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
                                                                                unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>" required autocomplete="email" autofocus placeholder="E-Mail Address">
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
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
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
                                                                                        unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Password">
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
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-raised btn-raised-primary btn-block mb-md">Reset
                        Password</button>

                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>