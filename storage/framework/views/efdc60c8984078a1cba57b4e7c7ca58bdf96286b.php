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
                <div class="card-header d-flex jusitify-space-between">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Banks </h2>
                    <div class="flex-grow-1"></div>
                    <div>
                        <a type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm"
                            href="<?php echo e(route('banks.create')); ?>" title="Add Bank">Add Bank</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mt-l mb-lg"></div>
                        
                        <?php if($banks->count() > 0): ?>
                            <table class="table nowrap" id="datatableScrollXY" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Bank Code</th>
                                        <th>Join Date</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($bank->name); ?></td>
                                            <td><?php echo e($bank->bank_code); ?></td>
                                            <td><?php echo e($bank->created_at->format('m-d-Y')); ?></td>
                                            <td><?php echo e($bank->phone); ?></td>
                                            <td>
                                                <?php if($bank->is_verified == 0): ?>
                                                    <span class="badge badge-warning">Unverified</span>
                                                <?php elseif($bank->is_verified == 1): ?>
                                                    <span class="badge badge-success">Verified</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('/banks/' . encrypt_helper($bank->id) . '/edit')); ?>"
                                                    title="Edit bank"><span class="material-icons">edit_note</span></a>
                                                &nbsp;
                                                <?php if($bank->is_verified): ?>
                                                    <a class="unverify-item text-warning"
                                                        data-id="<?php echo e(encrypt_helper($bank->id)); ?>"
                                                        data-message="Yes, unverify it!" href="#"
                                                        title="Unverify bank"><span
                                                            class="material-icons">unpublished</span></a>
                                                <?php else: ?>
                                                    <a class="verify-item text-success"
                                                        data-id="<?php echo e(encrypt_helper($bank->id)); ?>"
                                                        data-message="Yes, verify it!" href="#"
                                                        title="Verify bank"><span class="material-icons">task_alt</span></a>
                                                <?php endif; ?>
                                                &nbsp;
                                                <a class="delete-item text-danger" data-id="<?php echo e(encrypt_helper($bank->id)); ?>"
                                                    href="#" title="Delete bank"><span
                                                        class="material-icons">delete</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <div class="text-danger"> There is no bank.</div>
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
            $('table').on('click', '.verify-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var message = $(this).attr('data-message');
                var url = '/banks/' + itemId + '/verification'
                confirmAction(url, '.verify-item', message);
            });

            $('table').on('click', '.unverify-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var message = $(this).attr('data-message');
                var url = '/banks/' + itemId + '/verification'
                confirmAction(url, '.unverify-item', message);
            });

            $('table').on('click', '.delete-item', function(e) {
                e.preventDefault();
                var itemId = $(this).attr('data-id');
                var url = '/banks/' + itemId + '/delete'
                confirmAction(url, '.delete-item');
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/audit-confirmation/admin/resources/views/banks/index.blade.php ENDPATH**/ ?>