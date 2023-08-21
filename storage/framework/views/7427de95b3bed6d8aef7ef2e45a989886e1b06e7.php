<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <link rel="icon" href="/dashboard/dist/assets/images/favicon2.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400|Roboto:300,400,500,700,900|Material+Icons"
        rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/dist/assets/css/pages/session/error.min.css">
    <link rel="stylesheet" href="/dashboard/dist/assets/css/main.bundle.min.css">
</head>

<body>
    <div class="page-wrap height-100">
        <div class="app-error">
            <div class="fix d-flex align-items-center">
                <i class="material-icons text-danger mr-md">error</i>
                <div class="error-text">
                    <h1 class="error-title font-weight-bold">401</h1>
                    <div class="error-subtitle">Unauthorized Verify Your Account</div>
                </div>
            </div>
            <div class="error-action d-flex justify-content-around mt-xxl">
                <a href="<?php echo e(route('home')); ?>" type="button" class="btn btn-opacity btn-primary btn-sm mr-0"> Back to
                    Dashboard </a>
                <a href="<?php echo e(route('help-center')); ?>" type="button" class="btn btn-opacity btn-danger btn-sm"> Report
                    the problem</a>
            </div>
        </div>
    </div>
</body>
<?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/layouts/401.blade.php ENDPATH**/ ?>