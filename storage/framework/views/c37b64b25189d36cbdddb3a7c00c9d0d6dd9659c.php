<?php if($accounts->count() > 0): ?>
    <div class="d-flex justify-content-center balance-div">
        <?php if(!empty(old('account_id'))): ?>
            <?php
            $acct = \App\Models\Account::find(old('account_id'));
            ?>
            <h4>Account Balance <?php echo e($acct->currency->symbol); ?><?php echo number_format($acct->balance, 2); ?></h4>
        <?php else: ?>
            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->first): ?>
                    <h4>Account Balance
                        <span class="account"><?php echo e($account->currency->symbol); ?><?php echo number_format($account->balance, 2); ?></span>
                    </h4>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php /**PATH /Users/chukwuemekainya/Sites/ibank/resources/views/layouts/user_balance_display.blade.php ENDPATH**/ ?>