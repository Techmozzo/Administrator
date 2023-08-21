<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
    <!-- Start:: content (Your custom content)-->
    <div class="container mt-lg">
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Transaction History</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mt-l mb-lg"></div>
                        
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
                                            <td><?php echo e($transaction->created_at->format('d-M-Y')); ?></td>
                                            <td><?php echo e($transaction->account->number); ?></td>
                                            <td><?php echo $transaction->narrative; ?></td>
                                            <td class="text-success" ><?php echo e($transaction->entry == 'credit' ? number_format($transaction->amount, 2) : ''); ?></td>
                                            <td class="text-danger" ><?php echo e($transaction->entry == 'debit' ? number_format($transaction->amount, 2 ) : ''); ?></td>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/dashboard/dist/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dashboard/dist/assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/dashboard/dist/assets/js/pages/datatables/scrollDatatable.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/user/accounts/transaction_history.blade.php ENDPATH**/ ?>