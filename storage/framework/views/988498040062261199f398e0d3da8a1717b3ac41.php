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
                <h2 class="p-1 m-0 text-16 font-weight-semi">Cheque Request</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="mt-l mb-lg"></div>

                    <?php if ($chequeRequests->count() > 0) : ?>
                        <table class="table nowrap" id="datatableScrollXY" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Request Date</th>
                                    <th>Account</th>
                                    <th>User</th>
                                    <th>Size</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $chequeRequests;
                                $__env->addLoop($__currentLoopData);
                                foreach ($__currentLoopData as $request) : $__env->incrementLoopIndices();
                                    $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($request->created_at->format('d-M-Y')); ?></td>
                                        <td><?php echo e($request->account->number); ?></td>
                                        <td><?php echo e($request->user->name()); ?></td>
                                        <td><?php echo e($request->size); ?></td>
                                        <td><?php echo e($request->reason); ?></td>
                                        <td>
                                            <?php if ($request->status == 0) : ?>
                                                <span class="badge badge-warning">Pending</span>
                                            <?php elseif ($request->status == 1) : ?>
                                                <span class="badge badge-success">Completed</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Failed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="<?php echo e(url('/admin/cheque-requests/' . $hashIds->encode($request->id))); ?>" title="Edit Request">Edit</a>
                                            &nbsp;
                                            <button type="button" class="btn btn-opacity btn-danger btn-sm my-sm mr-sm delete-item" data-id="<?php echo e($hashIds->encode($request->id)); ?>" title="Delete Request">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach;
                                $__env->popLoop();
                                $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="text-danger text-center">There is no cheque request</div>
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
        $('.delete-item').on('click', function() {
            var itemId = $(this).attr('data-id');
            var url = '/admin/cheque-requests/' + itemId + '/delete'
            confirmAction(url);
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/admin/cheques/request.blade.php ENDPATH**/ ?>