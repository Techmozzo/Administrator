<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">New Cheque Book Request</h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">

                        <div>
                            <p>You have initiated cheque book request, kindly complete the form below to
                                complete this request.</p>
                        </div>

                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center">
                            <?php if($accounts->count() > 0): ?>
                                <form class="col-md-8" method="POST" action="<?php echo e(route('cheque.request')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12 mb-sm">
                                            <div class="input-group  input-light mb-3">
                                                <select class="form-select <?php $__errorArgs = ['account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="account_id" id="account_id" style="width:100%;">
                                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($account->id); ?>"><?php echo e($account->number); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php $__errorArgs = ['account_id'];
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
                                                <select class="form-select <?php $__errorArgs = ['size'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="size" style="width:100%;">
                                                    <option selected disabled>Select Cheque Book Size *</option>
                                                    <option value="25" <?php echo e(old('size') == '25' ? 'selected' : ''); ?>>
                                                        25</option>
                                                    <option value="50" <?php echo e(old('size') == '50' ? 'selected' : ''); ?>>
                                                        50</option>
                                                    <option value="100" <?php echo e(old('size') == '100' ? 'selected' : ''); ?>>
                                                        100</option>
                                                </select>
                                                <?php $__errorArgs = ['size'];
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
                                                <select class="form-select <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="reason" style="width:100%;">
                                                    <option selected disabled>Reason for New Cheque *</option>
                                                    <option value="new" <?php echo e(old('reason') == 'new' ? 'selected' : ''); ?>>
                                                        New</option>
                                                    <option value="damaged"
                                                        <?php echo e(old('reason') == 'damaged' ? 'selected' : ''); ?>>
                                                        Damaged</option>
                                                    <option value="lost" <?php echo e(old('reason') == 'lost' ? 'selected' : ''); ?>>
                                                        Lost</option>
                                                    <option value="expired"
                                                        <?php echo e(old('reason') == 'expired' ? 'selected' : ''); ?>>
                                                        Expired</option>
                                                    <option value="stolen"
                                                        <?php echo e(old('reason') == 'stolen' ? 'selected' : ''); ?>>
                                                        Stolen</option>
                                                    <option value="others"
                                                        <?php echo e(old('reason') == 'others' ? 'selected' : ''); ?>>
                                                        Others</option>
                                                </select>
                                                <?php $__errorArgs = ['reason'];
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
                                                <input type="password"
                                                    class="form-control <?php $__errorArgs = ['secret_answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="Secret Answer *" name="secret_answer"
                                                    value="<?php echo e(old('secret_answer')); ?>" required>
                                                <?php $__errorArgs = ['secret_answer'];
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
                                    </div>

                                    <button type="submit"
                                        class="btn btn-raised btn-raised-primary btn-block">Submit</button>
                                    <div class="border-bottom mt-xxl mb-lg"></div>

                                </form>
                            <?php else: ?>
                                <div class="center text-danger">You Don't have any current account.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/user/cheques/request.blade.php ENDPATH**/ ?>