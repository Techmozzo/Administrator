<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?></title>
    <link rel="icon" href="/dashboard/dist/assets/images/favicon2.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400|Roboto:300,400,500,700,900|Material+Icons"
        rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
    <link rel="stylesheet" href="/dashboard/dist/assets/css/main.bundle.min.css">
</head>

<body>

    <?php echo $__env->yieldContent('custom_content'); ?>
    <script src="/dashboard/dist/assets/js/vendors.bundle.min.js"></script>
    <script src="/dashboard/dist/assets/js/main.bundle.min.js"></script>
</body>

</html>
<?php /**PATH /Users/chukwuemekainya/Sites/audit-confirmation/auditor/resources/views/layouts/auth.blade.php ENDPATH**/ ?>