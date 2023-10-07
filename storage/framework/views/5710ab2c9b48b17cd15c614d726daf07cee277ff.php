<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p style="margin-bottom:0; padding-left:10px;"><?php echo e($message); ?></p>
    </div>
<?php elseif(Session::has('error')): ?>
    <div class="alert alert-danger" style="padding: 5px;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p  style="margin-bottom:0; padding-left:10px;"><?php echo e(Session::get('error')); ?></p>
    </div>
<?php endif; ?>

<div class="ajax-success-response alert alert-success" style="padding: 5px; display: none;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p style="margin-bottom:0; padding-left:10px;"></p>
</div>

<div class="ajax-failed-response alert alert-danger" style="padding: 5px; display: none;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <p style="margin-bottom:0; padding-left:10px;"></p>
</div>

<?php /**PATH /Users/chukwuemekainya/Sites/Techmozzo/audit-confirmation/admin/resources/views/layouts/message.blade.php ENDPATH**/ ?>