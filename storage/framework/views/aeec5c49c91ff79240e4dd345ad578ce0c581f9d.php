<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Internal Bank Transfer</h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">
                        <?php echo $__env->make('layouts.user_balance_display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center">
                            <?php if($accounts->count() > 0): ?>
                                <form class="col-md-8" method="POST" action="<?php echo e(route('transfer.internal')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-12 mb-sm">
                                            <label class="control-label" for="account_id">Select Account</label>
                                            <div class="input-group  input-light mb-3">
                                                <select class="form-select" name="account_id" id="account_id"
                                                    style="width:100%;">
                                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($account->id); ?>" data-id=<?php echo e($account->currency->symbol); ?><?php echo number_format($account->balance, 2); ?> data-shorthand=<?php echo e($account->currency->shorthand); ?>><?php echo e($account->number); ?> - <?php echo e($account->currency->shorthand); ?></option>
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
                                            <label class="control-label" for="receiver_account_number">Beneficiary Account Number *</label>
                                            <div class="input-group  input-light mb-3">
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['receiver_account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="receiver_account_number" name="receiver_account_number"
                                                    value="<?php echo e(old('receiver_account_number')); ?>" required
                                                    autocomplete="receiver_account_number">
                                                <?php $__errorArgs = ['receiver_account_number'];
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
                                            <label class="control-label" for="receiver">Beneficiary Account Name *</label>
                                            <div class="input-group  input-light mb-3">
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['receiver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="receiver" name="receiver"
                                                    value="<?php echo e(old('receiver')); ?>" required autocomplete="receiver">
                                                <?php $__errorArgs = ['receiver'];
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
                                            <label class="control-label" for="amount">Amount *</label>
                                            <div class="input-group  input-light mb-3">
                                                <input type="text"
                                                    class="form-control amount <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="amount" name="amount" value="<?php echo e(old('amount')); ?>"
                                                    required autocomplete="amount">
                                                <?php $__errorArgs = ['amount'];
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
                                            <label class="control-label" for="remark">Remark (Optional)</label>
                                            <div class="input-group input-light mb-3">
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['remark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    id="remark" name="remark"
                                                    value="<?php echo e(old('remark')); ?>" autocomplete="remark">
                                                <?php $__errorArgs = ['remark'];
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
                                <div class="text-danger">You Don't have any active account.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        window.amount = new AutoNumeric.multiple('.amount', {
            decimalPlaces: 2,
            unformatOnSubmit: true,
            modifyValueOnWheel: false,
        });

        $('select[name=account_id]').change(function() {
            $('.balance-div .account').html($(this).find(':selected').attr('data-id'))
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/user/transfers/internal.blade.php ENDPATH**/ ?>