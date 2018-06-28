<div class="clear"></div>
<div class="postbox rpdocontainer" id="dashboard_right_now" >
    <h3 class="hndle"><?php echo __('Donation/Tip Settings', 'rpdo') ?></h3>
    <div class="inside">
        <div class="main">
            <form method="post" action="" name="<?php echo self::$plugin_slug; ?>">
                <input type="hidden" name="<?php echo self::$plugin_slug; ?>" value="1"/>
                <table class="rp_table" >
                    <tr>
                        <td  width="20%" class="label"><?php echo __('Enable?', 'rpdo') ?></td>
                        <td>
                            <input type="checkbox" name="enable" <?php echo ($this->get_setting("enable")) ? "checked=checked" : ""; ?> value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Display Donation Fields on', 'rpdo') ?></td>
                        <td>
                            <select name="display_donation" class="display_donation">
                                <option value="3" <?php echo $this->get_setting("display_donation")==3?"selected=selected":""; ?> ><?php echo __("Only Cart Page", 'rpdo'); ?></option>
                                <option value="1" <?php echo $this->get_setting("display_donation")==1?"selected=selected":""; ?> ><?php echo __("Only Checkout Page", 'rpdo'); ?></option>
                                <option value="2" <?php echo $this->get_setting("display_donation")==2?"selected=selected":""; ?> ><?php echo __("Both(Cart And Checkout)", 'rpdo'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr class="cartposition" style="display: none;">
                        <td class="label"><?php echo __('Position On Cart Page?', 'rpdo') ?></td>
                        <td>
                            <select name="cart_position">
                                <option value="woocommerce_before_cart_table" <?php echo $this->get_setting("cart_position")=='woocommerce_before_cart_table'?"selected=selected":""; ?> ><?php echo __("Before Cart Table", 'rpdo'); ?></option>
                                <option value="woocommerce_cart_coupon" <?php echo $this->get_setting("cart_position")=='woocommerce_cart_coupon'?"selected=selected":""; ?> ><?php echo __("After Cart Coupon", 'rpdo'); ?></option>
                                <option value="woocommerce_after_cart_contents" <?php echo $this->get_setting("cart_position")=='woocommerce_after_cart_contents'?"selected=selected":""; ?> ><?php echo __("After Cart Content", 'rpdo'); ?></option>
                                <option value="woocommerce_after_cart_table" <?php echo $this->get_setting("cart_position")=='woocommerce_after_cart_table'?"selected=selected":""; ?> ><?php echo __("After Cart Table", 'rpdo'); ?></option>
                                <option value="woocommerce_cart_collaterals" <?php echo $this->get_setting("cart_position")=='woocommerce_cart_collaterals'?"selected=selected":""; ?> ><?php echo __("Cart Collaterals", 'rpdo'); ?></option>
                                <option value="woocommerce_before_cart_totals" <?php echo $this->get_setting("cart_position")=='woocommerce_before_cart_totals'?"selected=selected":""; ?> ><?php echo __("Before Cart Total", 'rpdo'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr class="checkoutpostion" style="display: none;">
                        <td class="label"><?php echo __('Position On Checkout Page?', 'rpdo') ?></td>
                        <td>
                            <select name="checkout_position">
                                <option value="woocommerce_before_checkout_form" <?php echo $this->get_setting("checkout_position")=='woocommerce_before_checkout_form'?"selected=selected":""; ?> ><?php echo __("Before Checkout Form", 'rpdo'); ?></option>
                                <option value="woocommerce_checkout_before_customer_details" <?php echo $this->get_setting("checkout_position")=='woocommerce_checkout_before_customer_details'?"selected=selected":""; ?> ><?php echo __("Before Customer Detail", 'rpdo'); ?></option>
                                <option value="woocommerce_before_checkout_billing_form" <?php echo $this->get_setting("checkout_position")=='woocommerce_before_checkout_billing_form'?"selected=selected":""; ?> ><?php echo __("Before Billing Detail", 'rpdo'); ?></option>
                                <option value="woocommerce_after_checkout_billing_form" <?php echo $this->get_setting("checkout_position")=='woocommerce_after_checkout_billing_form'?"selected=selected":""; ?> ><?php echo __("After Billing Detail", 'rpdo'); ?></option>
                                <option value="woocommerce_before_checkout_shipping_form" <?php echo $this->get_setting("checkout_position")=='woocommerce_before_checkout_shipping_form'?"selected=selected":""; ?> ><?php echo __("Before Shiiping Detail", 'rpdo'); ?></option>
                                <option value="woocommerce_before_order_notes" <?php echo $this->get_setting("checkout_position")=='woocommerce_before_order_notes'?"selected=selected":""; ?> ><?php echo __("Before Order Notes", 'rpdo'); ?></option>
                                <option value="woocommerce_after_order_notes" <?php echo $this->get_setting("checkout_position")=='woocommerce_after_order_notes'?"selected=selected":""; ?> ><?php echo __("After Order Notes", 'rpdo'); ?></option>
                                <option value="woocommerce_checkout_before_order_review" <?php echo $this->get_setting("checkout_position")=='woocommerce_checkout_before_order_review'?"selected=selected":""; ?> ><?php echo __("Before Order Review", 'rpdo'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Donation Button Lable', 'rpdo') ?></td>
                        <td>
                            <input type="text" name="btn_lable" value="<?php echo $this->get_setting('btn_lable') ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Display Remove Donation Button?', 'rpdo') ?></td>
                        <td>
                            <input type="checkbox" name="enable_remove" <?php echo ($this->get_setting("enable_remove")) ? "checked=checked" : ""; ?> value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Remove Donation Button Lable', 'rpdo') ?></td>
                        <td>
                            <input type="text" name="remove_lable" value="<?php echo $this->get_setting('remove_lable') ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Title', 'rpdo') ?></td>
                        <td>
                            <input type="text" name="title" value="<?php echo $this->get_setting('title') ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Donation/Tip Messsage', 'rpdo') ?></td>
                        <td>
                            <textarea name="message" rows="5" cols="25" ><?php echo $this->get_setting('message'); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Default Amount', 'rpdo') ?></td>
                        <td>
                            <?php echo get_woocommerce_currency_symbol() ?> <input type="text" name="default_amt" value="<?php echo $this->get_setting('default_amt') ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo __('Taxable?', 'rpdo') ?></td>
                        <td>
                            <input type="checkbox" name="taxable" <?php echo ($this->get_setting("taxable")) ? "checked=checked" : ""; ?> value="1" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" class="button button-primary" name="btn-rpdo-submit" value="<?php echo __("Save Settings", "rpdo") ?>" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
