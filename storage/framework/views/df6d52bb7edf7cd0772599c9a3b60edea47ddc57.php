<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_content'); ?>

    </div>
    </div>
    <div class="container">
        <div class="row pt-l">
            <div class="col-md-12 text-center pt-l">
                <h1 class="mb-xl">Frequently Asked Questions</h1>
            </div>
        </div>
        <?php echo $__env->make('layouts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12 py-xl mb-lg">
                <div class="nav-pills-primary">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="accordion" id="accordion1">
                                <?php if($faqs->count() > 0): ?>
                                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header" id="heading<?php echo e($faq->id); ?>" data-toggle="collapse"
                                                data-target="#collapse<?php echo e($faq->id); ?>" aria-expanded="true"
                                                aria-controls="collapse<?php echo e($faq->id); ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link">
                                                        <?php echo e($faq->question); ?>

                                                    </button>
                                                </h5>
                                            </div>
                                            <div class="collapse <?php echo e($key == 0 ? 'show' : ''); ?>"
                                                id="collapse<?php echo e($faq->id); ?>"
                                                aria-labelledby="heading<?php echo e($faq->id); ?>" data-parent="#accordion1">
                                                <div class="card-body">
                                                    <?php echo $faq->answer; ?>

                                                </div>
                                                <div>
                                                    <hr>
                                                    <div class="d-flex justify-content-end">
                                                        <a class="btn btn-opacity btn-primary btn-sm my-sm mr-sm "
                                                            href="<?php echo e(route('faqs.edit', $faq->id)); ?>"
                                                            title="Edit">Edit</a>
                                                        <button type="button"
                                                            class="btn btn-opacity btn-danger btn-sm my-sm mr-sm delete-faq"
                                                            data-id="<?php echo e($faq->id); ?>">Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-12">
                                        <!-- pagination start-->
                                        <?php echo e($faqs->links('pagination::bootstrap-4')); ?>

                                        <!-- pagination end-->
                                    </div>
                                <?php else: ?>
                                    <div class="row pt-l">
                                        <div class="col-md-12 text-center pt-l">
                                            <h4 class="mb-xl">No Frequently Asked Questions Yet</h1>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start:: content (Your custom content)-->

    </div>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="/dashboard/dist/assets/vendors/sweetalert2/dist/sweetalert2.js"></script>
    <script>
        $('document').ready(function() {
            $('.delete-faq').on('click', function() {
                var faqId = $(this).attr('data-id');
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
                            url: '/faqs/' + faqId,
                            data: {
                                _token: "<?php echo e(csrf_token()); ?>",
                                id: faqId
                            },
                            type: 'DELETE',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success...',
                                        text: response.message
                                    })
                                } else if (response.error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Ooops...',
                                        text: response.message
                                    })
                                }
                                window.location = '/admin/faqs';
                            }
                        })
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/faqs/admin_index.blade.php ENDPATH**/ ?>