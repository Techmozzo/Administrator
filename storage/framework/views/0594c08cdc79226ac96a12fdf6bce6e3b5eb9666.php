<?php $__env->startSection('custom_content'); ?>
    <div class="container my-lg d-flex flex-column">
        <div class="doc-section-title d-flex justify-content-center">
            <h2 class="doc-section-title">Send a mail to <?php echo e($user->name()); ?></h2>
        </div>
        <div class="doc-example d-flex justify-content-center">
            <div class="col-lg-8">
                <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="clearfix">&nbsp;</div>
                <form id="help-form" action="<?php echo e(route('email.send')); ?>" method="POST"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="help-form-group">
                        <input type="hidden" class="form-control" type="email" placeholder="To *"
                               name="to" required
                               value="<?php echo e($user->email); ?>"
                        >
                    </div>
                    <div class="help-form-group">
                        <input class="form-control" type="text" placeholder="Enter Message Subject *"
                               name="subject" required
                               value="<?php echo e(old('subject')); ?>">
                    </div>
                    <div class="help-form-group">
                                <textarea aria-required="true" required class="form-control" rows="10" cols="70%"
                                          name="message" aria-invalid="true" placeholder="Enter Message*"
                                          value="<?php echo e(old('message')); ?>"></textarea>
                    </div>
                    <p>Ask us a question and we'll write back to you promptly! Simply fill out the form
                        below and
                        click Send Email.</p>
                    <p>Thanks. Items marked with an asterisk (<span class="star">*</span>) are required
                        fields.</p>
                    <div class="help-form-group">
                        <input type="file" class="form-control" name="attachment">
                    </div>
                    <div class="help-form-bottom">
                        <div>
                            <input type="checkbox" name="copy">
                            <span>Send copy to yourself</span>
                        </div>
                        <div class="spacer"></div>
                        <div class="help-form-submit">
                            <button type="submit"
                                    class="form-control btn btn-opacity btn-primary btn-sm my-sm mr-sm">Send Email
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="card-footer">
            This mail will be sent immediately.
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/email/create.blade.php ENDPATH**/ ?>