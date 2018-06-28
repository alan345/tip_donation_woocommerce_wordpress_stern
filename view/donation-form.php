<div class="rp-donation-block checkout_donation" >
    <p class="message"><strong><?php echo $this->get_setting('message'); ?></strong></p>
    <div>
      <input type="button" value="$5" class="button donate-btn-5" name="donate-btn-5">
      <input type="button" value="$10" class="button donate-btn-10" name="donate-btn-10">
      <input type="button" value="$20" class="button donate-btn-20" name="donate-btn-20">
      <input type="button" value="$30" class="button donate-btn-30" name="donate-btn-30">
    </div>
    <div class="input text">
        <input type="number" value="<?php echo $amount; ?>" class="input-text text-donation donation-amount" name="donation-amount" id="donation-amount">
        <?php if($this->get_setting('enable_remove')==1 && $this->get_donation_amount()>0): ?>
            <input type="button" value="<?php echo $this->get_setting('remove_lable'); ?>" class="button donate-remove" name="donate-remove">
        <?php endif; ?>
            <span class="rpdo_loader"><img src="<?php echo self::$plugin_url."assets/images/loader.gif"; ?>" alt="" /></span>
    </div>
    <input hidden type="button" value="<?php echo $this->get_setting('btn_lable'); ?>" class="button donate-btn" name="donate-btn">
    <div class="rpdo-error"></div>
</div>
