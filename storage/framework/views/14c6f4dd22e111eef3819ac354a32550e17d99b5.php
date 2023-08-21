<?php $__env->startSection('css'); ?>
     <!--<link rel="stylesheet" href="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.css" />-->
     <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Create Transaction for <?php echo e($customer->name()); ?></h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">
                        <?php echo $__env->make('layouts.user_balance_display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center col-md-8 offset-md-2">
                            <form action="<?php echo e(route('admin.transactions')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <select class="form-select" name="account_id" id="account_id"
                                                style="width:100%;">
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($account->id); ?>"
                                                        <?php echo e(old('account_id') == $account->id ? 'selected' : ''); ?>

                                                        data-id=<?php echo e($account->currency->symbol); ?><?php echo number_format($account->balance, 2); ?> data-shorthand=<?php echo e($account->currency->shorthand); ?>>
                                                        <?php echo e($account->number); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <select class="form-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type"
                                                id="type" required>
                                                <option selected disabled>Select Transaction Type *</option>
                                                <option value='credit' <?php echo e(old('type') == 'credit' ? 'selected' : ''); ?>>
                                                    Credit
                                                </option>
                                                <option value='debit' <?php echo e(old('type') == 'debit' ? 'selected' : ''); ?>>
                                                    Debit
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['type'];
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

                                    <div class="col-md-12 mb-sm show_transaction">
                                        <div class="input-group  input-light mb-3">
                                            <select class="form-select <?php $__errorArgs = ['show_transaction'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="show_transaction" id="show_transaction" required>
                                                <option selected disabled>Show Transaction in History *</option>
                                                <option value='NO'
                                                    <?php echo e(old('show_transaction') == 'NO' ? 'selected' : ''); ?>>
                                                    Hide
                                                </option>
                                                <option value='YES'
                                                    <?php echo e(old('show_transaction') == 'YES' ? 'selected' : ''); ?>>
                                                    Show
                                                </option>
                                            </select>
                                            <?php $__errorArgs = ['show_transaction'];
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
                                            <input type="text"
                                                class="form-control amount <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Enter Amount *" name="amount" value="<?php echo e(old('amount')); ?>"
                                                required>
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
                                        <div class="input-group  input-light mb-3">
                                            <input type="datetime-local"
                                                class="form-control <?php $__errorArgs = ['created_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="created_at" name="created_at" value="<?php echo e(old('created_at')); ?>"
                                                required />
                                            <?php $__errorArgs = ['created_at'];
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
                                            <textarea name="narration" id="summernote" class="form-control <?php $__errorArgs = ['narration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php echo e(old('narration')); ?></textarea>
                                            <?php $__errorArgs = ['narration'];
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

                                    <input type="hidden" name="customer_id" value="<?php echo e($hashIds->encode($customer->id)); ?>">

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
<?php $__env->startSection('script'); ?>
<!--<script src="/dashboard/dist/assets/vendors/summernote/summernote-lite.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            window.amount = new AutoNumeric.multiple('.amount', {
                decimalPlaces: 2,
                unformatOnSubmit: true,
                modifyValueOnWheel: false,
            });

            $('select[name=account_id]').change(function() {
                $('.balance-div .account').html($(this).find(':selected').attr('data-id'))
            })

            $("#summernote").summernote({
                height: 120
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/transactions/create.blade.php ENDPATH**/ ?>