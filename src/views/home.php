<?php
?>
<div class="container">
    <form action="" method="post" id="homeForm">
        <label for="amount">Amount</label>
        <input type="number" id="amount" name="amount" class="<?=$formModel->validate->hasError('amount')?'is-error':''?>" value="<?=$formModel->amount?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('amount')?$formModel->validate->getFirstError('amount'):''?>
        </div>
        <label for="buyer">Buyer</label>
        <input type="text" id="buyer" name="buyer" class="<?=$formModel->validate->hasError('buyer')?'is-error':''?>" value="<?=$formModel->buyer?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('buyer')?$formModel->validate->getFirstError('buyer'):''?>
        </div>
        <label for="receipt_id">Receipt ID</label>
        <input type="text" id="receipt_id" name="receipt_id" class="<?=$formModel->validate->hasError('receipt_id')?'is-error':''?>" value="<?=$formModel->receipt_id?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('receipt_id')?$formModel->validate->getFirstError('receipt_id'):''?>
        </div>
        <label for="items">Items</label>
        <select type="text" id="items" name="items" class="<?=$formModel->validate->hasError('items')?'is-error':''?>" multiple>
            <option value="">Select Items</option>
            <option value="itemA">Item A</option>
            <option value="itemB">Item B</option>
            <option value="itemC">Item C</option>
            <option value="itemD">Item D</option>
            <option value="itemE">Item E</option>
        </select>
        <div class="error-message">
            <?=$formModel->validate->hasError('items')?$formModel->validate->getFirstError('items'):''?>
        </div>
        <label for="buyer_email">Buyer Email</label>
        <input type="email" id="buyer_email" name="buyer_email" class="<?=$formModel->validate->hasError('buyer_email')?'is-error':''?>" value="<?=$formModel->buyer_email?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('buyer_email')?$formModel->validate->getFirstError('buyer_email'):''?>
        </div>
        <label for="note">Note</label>
        <textarea type="text" id="note" name="note" class="<?=$formModel->validate->hasError('note')?'is-error':''?>"><?=$formModel->note?></textarea>
        <div class="error-message">
            <?=$formModel->validate->hasError('note')?$formModel->validate->getFirstError('note'):''?>
        </div>
        <label for="city">City</label>
        <input type="text" id="city" name="city" class="<?=$formModel->validate->hasError('city')?'is-error':''?>" value="<?=$formModel->city?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('city')?$formModel->validate->getFirstError('city'):''?>
        </div>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="<?=$formModel->validate->hasError('phone')?'is-error':''?>" value="<?=$formModel->phone?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('phone')?$formModel->validate->getFirstError('phone'):''?>
        </div>
        <label for="entry_by">Entry By</label>
        <input type="number" id="entry_by" name="entry_by" class="<?=$formModel->validate->hasError('entry_by')?'is-error':''?>" value="<?=$formModel->entry_by?>">
        <div class="error-message">
            <?=$formModel->validate->hasError('entry_by')?$formModel->validate->getFirstError('entry_by'):''?>
        </div>
        <center><input type="submit" id="submit" name="submit" value="submit"></center>
    </form>
</div>

