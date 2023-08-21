<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
<!-- Start:: content (Your custom content)-->
<div class="container mt-lg">
    <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <?php if ($user->accounts->count() > 0) : ?>
            <?php $__currentLoopData = $user->accounts;
            $__env->addLoop($__currentLoopData);
            foreach ($__currentLoopData as $account) : $__env->incrementLoopIndices();
                $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 mb-md">
                            <div class="row">
                                <div class="col-lg-12 mb-md">
                                    <div class="card bg-default h-100">
                                        <div class="card-body d-flex align-items-center">
                                            <div class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                                <div>
                                                    <p class="m-0"><?php echo e($account->number); ?> <span class="badge <?php echo e($account->is_active ? 'badge-success' : 'badge-danger'); ?>"><?php echo e($account->is_active ? 'Active' : 'Inactive'); ?></span>
                                                    </p>
                                                    <div class="card-title m-0">
                                                        <?php echo e($account->currency->name . ' ' . $account->type->name . ' Account'); ?>

                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <button type="button" class="btn btn-opacity btn-danger btn-sm my-sm mr-sm delete-item" data-id="<?php echo e($hashIds->encode($user->id)); ?>" data-account=<?php echo e($account->id); ?>>DELETE
                                                        </button>
                                                    </div>
                                                </div>
                                                <div> Bal.
                                                    <strong><?php echo e($account->currency->symbol); ?><?php echo number_format($account->balance, 2); ?></strong>
                                                    <br> Book Bal.
                                                    <strong><?php echo e($account->currency->symbol); ?><?php echo number_format($account->book_balance, 2); ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            $__env->popLoop();
            $loop = $__env->getLastLoop(); ?>
        <?php else : ?>
            <div class="text-danger"> No account.</div>
        <?php endif; ?>
    </div>
</div>
<!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.js"></script>
<script src="/dashboard/dist/assets/js/custom.js"></script>
<script>
    $('document').ready(function() {
        $('.delete-item').on('click', function() {
            var userId = $(this).attr('data-id');
            var accountId = $(this).attr('data-account');
            var url = '/admin/users/' + userId + '/accounts/' + accountId + '/delete';
            confirmAction(url);
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/accounts/index.blade.php ENDPATH**/ ?>