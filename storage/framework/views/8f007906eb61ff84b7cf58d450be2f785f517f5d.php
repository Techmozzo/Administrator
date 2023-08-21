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
                                                   45</div>
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
                                            <a href="#">
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

            

            

            <div class="col-lg-12 mb-md">
                <div class="card-header">
                    <h2 class="p-1 m-0 text-16 font-weight-semi">Mini Account Statement</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/audit-confirmation/admin/resources/views/user/home.blade.php ENDPATH**/ ?>