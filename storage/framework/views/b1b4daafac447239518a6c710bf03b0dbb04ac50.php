<?php
$transfer = Session::get('transfer');
?>


<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Confirm Transfer</h2>
                </div>
                <div class="card">
                    <div class="mt-l mb-lg"></div>
                    <div class="card-body">

                        <div>
                            <p>You have initiated a transfer request of <?php echo $transfer->account->currency->symbol; ?><?php echo number_format($transfer->amount, 2); ?> to be transferred
                                from <?php echo e($transfer->account->number); ?> to <?php echo e($transfer->receiver); ?>.</p>
                            <p>Kindly complete the form below to complete this request.</p>
                            <p> Click the link to generate secured OTP for your transaction;
                                <a class="btn btn-link btn-primary generate-otp" href="#">
                                    <?php echo e(__('Generate OTP')); ?>

                                </a>
                                &nbsp;
                                <i id="loading-image" class="fa fa-spinner fa-pulse fa-1x fa-fw text-primary" style="display:none;"></i>
                            </p>
                        </div>

                        <div class="mt-l mb-lg"></div>
                        <div class="d-flex justify-content-center">
                            <form class="col-md-8" method="POST" action="<?php echo e(route('transfer.confirm')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">

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

                                    <div class="col-md-12 mb-sm">
                                        <div class="input-group  input-light mb-3">
                                            <input type="text" class="form-control <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                placeholder="Token *" name="otp" value="<?php echo e(old('otp')); ?>" required
                                                autocomplete="otp">
                                            <?php $__errorArgs = ['otp'];
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

                                <button type="submit" class="btn btn-raised btn-raised-primary btn-block">Submit</button>
                                <div class="border-bottom mt-xxl mb-lg"></div>

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
    <script>
        $(document).ready(function() {
            $('.generate-otp').click(function() {
                $.ajax({
                    type: 'GET',
                    url: '/generate-otp',
                    beforeSend: function() {
                        $("#loading-image").show();
                    },
                    success: function(response) {
                        if (response.success) {
                            $('.ajax-success-response').html(response.message).show();
                            $('html, body').animate({
                                scrollTop: $('.ajax-success-response').offset().top
                            }, 'slow');
                        } else {
                            $('.ajax-failed-response').html(response.message).show();
                            $('html, body').animate({
                                scrollTop: $('.ajax-failed-response').offset().top
                            }, 'slow');
                        }
                        $("#loading-image").hide();
                    },
                    error: function(xhr, status, error) {
                        $('.ajax-failed-response').html(xhr.statusText).show();
                        $('html, body').animate({
                            scrollTop: $('.ajax-failed-response').offset().top
                        }, 'slow');
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/user/transfers/confirm.blade.php ENDPATH**/ ?>