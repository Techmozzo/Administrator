<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 mb-md">
                        <div class="row">
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Welcome,</p>
                                                <div class="card-title m-0">
                                                    <?php echo e($user->name()); ?></div>
                                            </div>

                                            <?php switch(auth()->user()):
                                                case (auth()->user()->verified == 1): ?>
                                                    <i class="material-icons text-success">account_circle</i>
                                                <?php break; ?>

                                                <?php case (auth()->user()->verified == 0): ?>
                                                    <i class="material-icons text-warning">account_circle</i>
                                                <?php break; ?>

                                                <?php case (auth()->user()->verified == 2): ?>
                                                    <i class="material-icons text-danger">account_circle</i>
                                                <?php break; ?>

                                                <?php default: ?>
                                                    <i class="material-icons">account_circle</i>
                                            <?php endswitch; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0">Num. of Accounts</p>
                                                <div class="card-title m-0">
                                                    <?php echo e($user->accounts->count()); ?></div>
                                            </div>
                                            <i class="material-icons">manage_accounts</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-default h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div
                                            class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <a href="<?php echo e(route('account.transaction-history')); ?>">
                                                <p class="m-0">View</p>
                                                <div class="card-title m-0">
                                                    Transaction History
                                                </div>
                                            </a>
                                            <i class="material-icons">history</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($user->accounts->count() > 0): ?>
                <?php $__currentLoopData = $user->accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 mb-md">
                                <div class="row">
                                    <div class="col-lg-12 mb-md">
                                        <div class="card bg-default h-100">
                                            <div class="card-body d-flex align-items-center">
                                                <div
                                                    class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                                    <div>
                                                        <p class="m-0"><?php echo e($account->number); ?> <span
                                                            class="badge <?php echo e($account->is_active ? 'badge-success' : 'badge-danger'); ?>"><?php echo e($account->is_active ? 'Active' : 'Inactive'); ?></span></p>
                                                        <div class="card-title m-0">
                                                            <?php echo e($account->currency->name .' '. $account->type->name .' Account'); ?></div>
                                                    </div>
                                                    <div> Bal. <strong><?php echo e($account->currency->symbol); ?><?php echo number_format($account->balance, 2); ?></strong> <br > Book Bal. <strong><?php echo e($account->currency->symbol); ?><?php echo number_format($account->book_balance, 2); ?></strong> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-danger"> You don't have an account.</div>
            <?php endif; ?>

            

            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Mini Account Statement</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php if($user->transactions->count() > 0): ?>
                            <table class="table nowrap" id="datatableScrollXY" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Transaction Date</th>
                                        <th>Account</th>
                                        <th>Narrative</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1; ?>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td data-sort="YYYYMMDD"><?php echo e($transaction->created_at->format('m-d-Y')); ?></td>
                                            <td><?php echo e($transaction->account->number); ?></td>
                                            <td><?php echo $transaction->narrative; ?></td>
                                            <td class="text-success"><?php echo e($transaction->entry == 'credit' ?  number_format($transaction->amount, 2) : ''); ?></td>
                                            <td class="text-danger"><?php echo e($transaction->entry == 'debit' ?  number_format($transaction->amount, 2) : ''); ?></td>
                                            <td>
                                                <?php if($transaction->status == 0): ?>
                                                    <span class="badge badge-warning">Pending</span>
                                                <?php elseif($transaction->status == 1): ?>
                                                    <span class="badge badge-success">Completed</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Failed</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="text-danger"> You don't have any Transaction.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->

    

    <div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="loginModal">Account Security Hint</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mb-sm d-flex justify-content-center">
                                <i class="material-icons nav-icon text-64">lock</i>
                            </div>
                            <div class="col-md-10 offset-md-1 mb-sm mt-lg">
                                <strong>Please do not share the following with anyone : </strong>
                                <ul>
                                    <li class="pt-sm">Internet and Mobile banking login details, password, or secret
                                        question and answer.</li>
                                    <li class="pt-sm">Debit/Prepaid card numbers and pin.</li>
                                    <li class="pt-sm">One time OTP or secured passcode.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/dashboard/dist/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/dist/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/dist/assets/js/pages/datatables/scrollDatatable.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            if (!sessionStorage.getItem('shown-modal')) {
                $('#securityModal').modal('show');
                sessionStorage.setItem('shown-modal', 'true');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/user/home.blade.php ENDPATH**/ ?>