<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Add Account for <?php echo e($customer->name()); ?></h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">
                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center col-md-8 offset-md-2">
                            <form action="<?php echo e(route('admin.accounts.create', $hashIds->encode($customer->id))); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <select name="account_type"
                                                class="form-select <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                                <option selected disabled>Account Type *</option>
                                                <?php $__currentLoopData = $accountTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($type->id); ?>"
                                                        <?php echo e($type->id == old('account_type') ? 'selected' : ''); ?>>
                                                        <?php echo e($type->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['account_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <select name="currency"
                                                class="form-select <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                                <option selected disabled>Select Currency *</option>
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($currency->id); ?>"
                                                        <?php echo e($currency->id == old('currency') ? 'selected' : ''); ?>>
                                                        <?php echo e($currency->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group input-light mb-3 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>

                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/accounts/create.blade.php ENDPATH**/ ?>