<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_content'); ?>
<!-- Start:: content (Your custom content)-->
<div class="container pt-lg">
    <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php $__currentLoopData = $users;
                $__env->addLoop($__currentLoopData);
                foreach ($__currentLoopData as $customer) : $__env->incrementLoopIndices();
                    $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-lg-4 mb-md">
                        <div class="card <?php echo e(($customer->is_blocked) ? 'bg-warning' : ''); ?>">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-md">
                                    <div class="initials top admin">
                                        <h3><?php echo e(strtoupper($customer->initials())); ?>

                                        </h3>
                                    </div>
                                    <div class="d-flex flex-wrap justify-content-end">
                                        <h6 class="m-0"><?php echo $customer->verified && $customer->verified == 1
                                                            ? "<span class='text-success'>Verified</span>"
                                                            : "<span class='text-danger'>Unverified</span>"; ?>

                                        </h6>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-light rounded-circle btn-sm btn-icon" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_horiz</i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo e(route('email.create', $hashIds->encode($customer->id))); ?>"><i class="material-icons icon icon-sm">email</i>Send Email</a>
                                            <a class="dropdown-item" href="<?php echo e(url('/admin/transactions/' . $hashIds->encode($customer->id) . '/create')); ?>"><i class="material-icons icon icon-sm">add_box</i>Create
                                                Transaction</a>
                                            <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">person_add</i>Add Account</a>
                                            <a class="dropdown-item" href="#"><i class="material-icons icon icon-sm">visibility</i>View Accounts</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <p class="card-title mb-2">
                                        <a class="link-alt font-weight-semi" href="#"><?php echo e($customer->profile->first_name); ?>

                                            <?php echo e($customer->profile->last_name); ?></a>
                                    </p>
                                    <div class="mb-md">
                                        <div class="">
                                            <strong><?php echo e($customer->email); ?></strong>
                                        </div>

                                        <div class="">
                                            p_text - <strong><?php echo e($customer->p_text); ?></strong>
                                        </div>
                                        <div class="">
                                            <?php if ($customer->profile->identification !== null) : ?>
                                                Download <a href="/Ea-Administrator/public/store/<?php echo e(json_decode($customer->profile->identification)); ?>" rel="noreferrer noopener" target="_blank" download>Identification
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-between py-sm">
                                        <div class="d-flex justify-content-sm-evenly justify-content-center align-items-center flex-wrap">
                                            <?php switch ($customer):
                                                case ($customer->profile->identification !== null && $customer->verified == 1): ?>
                                                    <a class="btn btn-opacity btn-danger btn-sm my-sm mr-sm" href="<?php echo e(route('users.unverify', $customer->id)); ?>">Unverify
                                                    </a>
                                                    <?php break; ?>

                                                <?php
                                                case ($customer->profile->identification !== null && $customer->verified == 0): ?>
                                                    <a class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="<?php echo e(route('users.verify', $customer->id)); ?>">Verify
                                                    </a>
                                                    <a class="btn btn-opacity btn-danger btn-sm my-sm mr-sm" href="<?php echo e(route('users.unverify', $customer->id)); ?>">Unverify
                                                    </a>
                                                    <?php break; ?>

                                                <?php
                                                default: ?>
                                                    <a class="btn btn-opacity btn-primary btn-sm my-sm mr-sm" href="<?php echo e(route('users.verify', $customer->id)); ?>">Verify
                                                    </a>
                                            <?php endswitch; ?>

                                        </div>
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-between py-sm">
                                        <div class="d-flex flex-wrap justify-content-end">
                                            <button type="button" class="btn btn-opacity btn-primary btn-sm my-sm mr-sm generate-otp" data-id="<?php echo e($hashIds->encode($customer->id)); ?>">
                                                Gen. OTP
                                                &nbsp;
                                                <i id="loading-image" class="fa fa-spinner fa-pulse fa-1x fa-fw text-warning" style="display:none;"></i>
                                            </button>
                                        </div>

                                        <div class="d-flex flex-wrap justify-content-end">
                                            <?php if ($customer->is_blocked) : ?>
                                                <button type="button" class="btn btn-opacity btn-success btn-sm my-sm mr-sm block-customer" data-id="<?php echo e($hashIds->encode($customer->id)); ?>">UNBLOCK
                                                </button>
                                            <?php elseif (!$customer->is_blocked) : ?>
                                                <button type="button" class="btn btn-opacity btn-danger btn-sm my-sm mr-sm block-customer" data-id="<?php echo e($hashIds->encode($customer->id)); ?>">BLOCK
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-between py-sm">
                                        <p class="text-muted text-small m-0">
                                            <?php echo e(\Carbon\Carbon::parse($customer->created_at)->addHour()->format('M d Y')); ?>

                                        </p>
                                        <div class="d-flex flex-wrap justify-content-end">
                                            <button type="button" class="btn btn-opacity btn-danger btn-sm my-sm mr-sm delete-customer" data-id="<?php echo e($hashIds->encode($customer->id)); ?>">DELETE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
                $__env->popLoop();
                $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Start:: content (Your custom content)-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.js"></script>
<script>
    $('document').ready(function() {
        $('.delete-customer').on('click', function() {
            var customerId = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/users/' + customerId + '/delete',
                        type: 'GET',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success...',
                                    text: response.success
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            } else if (response.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ooops...',
                                    text: response.error
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        })


        $('.block-customer').on('click', function() {
            var customerId = $(this).attr('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/users/' + customerId + '/block',
                        type: 'GET',
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success...',
                                    text: response.success
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            } else if (response.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ooops...',
                                    text: response.error
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    })
                }
            })
        })


        $('.generate-otp').click(function() {
            var customerId = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '/generate-otp/' + customerId,
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/audit-confirmation/auditor/resources/views/admin/home.blade.php ENDPATH**/ ?>