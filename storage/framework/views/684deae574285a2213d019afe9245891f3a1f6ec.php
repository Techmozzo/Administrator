<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/dashboard/dist/assets/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.css" />
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

                    <?php if ($transactions->count() > 0) : ?>
                        <table class="table nowrap" id="datatableScrollXY" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Transaction Date</th>
                                    <th>Account</th>
                                    <th>Narrative</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $transactions;
                                $__env->addLoop($__currentLoopData);
                                foreach ($__currentLoopData as $transaction) : $__env->incrementLoopIndices();
                                    $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-sort="YYYYMMDD"><?php echo e($transaction->created_at->format('m-d-Y')); ?></td>
                                        <td><?php echo e($transaction->account->number); ?></td>
                                        <td><?php echo $transaction->narrative; ?></td>
                                        <td class="text-success"><?php echo e($transaction->entry == 'credit' ?  number_format($transaction->amount, 2) : ''); ?></td>
                                        <td class="text-danger"><?php echo e($transaction->entry == 'debit' ?  number_format($transaction->amount, 2) : ''); ?></td>
                                        <td>
                                            <?php if ($transaction->status == 0) : ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php elseif ($transaction->status == 1) : ?>
                                                <span class="badge badge-success">Completed</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Failed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="<?php echo e(url('/admin/transactions/' . $hashIds->encode($transaction->id))); ?>" title="Edit Transaction">Edit</a>
                                            &nbsp;
                                            <button type="button" class="btn btn-opacity btn-danger btn-sm my-sm mr-sm delete-item" data-id="<?php echo e($hashIds->encode($transaction->id)); ?>" title="Delete Transaction">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                $__env->popLoop();
                                $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="text-danger"> There is no Transaction.</div>
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
<script src="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.js"></script>
<script src="/dashboard/dist/assets/js/custom.js"></script>
<script>
    $('document').ready(function() {
        $('table').on('click', '.delete-item', function() {
            var itemId = $(this).attr('data-id');
            var url = '/admin/transactions/' + itemId + '/delete'
            confirmAction(url);
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/transactions/index.blade.php ENDPATH**/ ?>