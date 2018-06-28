<?php
if (!class_exists('rp_donation')) {

    class rp_donation {

        private static $plugin_url;
        private static $plugin_dir;
        private static $plugin_title = "Donation/Tip";
        private static $plugin_slug = "rpdo-setting";
        private static $rpdo_option_key = "rpdo-setting";
        private $rpdo_settings;
        private static $donation_session = "rp_donation_session";

        public function __construct()
        {

            global $rpdo_plugin_dir, $rpdo_plugin_url;
            /* plugin url and directory variable */
            self::$plugin_dir = $rpdo_plugin_dir;
            self::$plugin_url = $rpdo_plugin_url;


            /* load donation  setting */
            $this->rpdo_settings = get_option(self::$rpdo_option_key);

            /* register admin menu for donation */
            add_action("admin_menu", array($this, "admin_menu"));
            add_action("admin_init", array($this, "admin_init"));
            add_action("woocommerce_thankyou", array($this, "woocommerce_thankyou"));
            add_action("admin_enqueue_scripts", array($this, "admin_enqueue_scripts"), 10);
            
            if ($this->get_setting("enable") == 1) {
                $this->init();
            }
        }

        public function woocommerce_thankyou()
        {
            global $woocommerce;
            $woocommerce->session->set(self::$donation_session);
        }
        
        public function wp_enqueue_scripts(){
            if(is_cart() || is_checkout()){
                wp_enqueue_script('rpdo-script', self::$plugin_url . "assets/js/rpdo-script.js", array('jquery'), false, true);
            }
            
        }

        /* init function */

        public function init()
        {

            if ($this->get_setting("enable") != 1) {
                return;
            }

            add_action("wp_head", array($this, "wp_head"));
            add_action("wp_enqueue_scripts", array($this, "wp_enqueue_scripts"), 10);
            add_action( 'wp_ajax_rpdo_donation', array($this, "update_donation") );
            add_action( 'wp_ajax_nopriv_rpdo_donation', array($this, "update_donation") );

            /* hook for add field on cart and checkout */
            if ($this->get_setting("display_donation") == 3 || $this->get_setting("display_donation") == 2) {
                $position = ($this->get_setting("cart_position"))? : "woocommerce_cart_contents";
                add_action($position, array($this, "add_donation_field"));
            }
            if ($this->get_setting("display_donation") == 1 || $this->get_setting("display_donation") == 2) {
                $position = ($this->get_setting("checkout_position"))? : "woocommerce_before_checkout_form";
                add_action($position, array(&$this, 'add_donation_field_checkout'));
            }



            /* hook for add donation fee */
            add_action("wp_loaded", array($this, "update_donation"));
            add_action('woocommerce_cart_calculate_fees', array(&$this, 'donation_to_cart'));
        }

        public function admin_enqueue_scripts()
        {
            wp_enqueue_script('rpdo-admin-script', self::$plugin_url . "assets/js/admin.js", array('jquery'), false, true);
        }

        /* function for add donation to cart */

        public function donation_to_cart()
        {
            global $woocommerce;
            $donation_amount = $this->get_donation_amount();
            if ($donation_amount && is_numeric($donation_amount) && $donation_amount > 0):
                $taxable = $this->get_setting('taxable') ? true : false;
                $woocommerce->cart->add_fee(__($this->get_setting('title'), 'rpdo'), $donation_amount, $taxable);
            endif;
        }

        /* add donation */

        public function update_donation()
        {
            if (isset($_POST["amount"]) && is_numeric($_POST["amount"])) {
                $amount = $_POST["amount"];
                $this->set_donation_amount($amount);
            }
        }

        /* set donation amount to woo sesssion */

        public function set_donation_amount($amount)
        {
            global $woocommerce;
            $woocommerce->session->set(self::$donation_session, $amount);
        }

        /* get donation amount from woo session */

        public function get_donation_amount()
        {
            global $woocommerce;
            $amount = $woocommerce->session->get(self::$donation_session);
            if ($amount && is_numeric($amount)) {
                return $amount;
            }
            return "0";
        }

        /* function for add donation field on checkout page */

        public function add_donation_field_checkout()
        {

            if (!is_checkout())
                return;

            if ($this->get_setting("enable") != 1)
                return;

            if ($this->get_setting('display_donation') && ($this->get_setting('display_donation') == 1 || $this->get_setting("display_donation") == 2)):
                $amount = 0;
                if ($this->get_donation_amount() > 0) {
                    $amount = $this->get_donation_amount();
                } else {
                    $amount = $this->get_setting('default_amt');
                }
                include_once self::$plugin_dir . 'view/donation-form.php';
            endif;
        }

        /* function for add donation field on cart page */

        public function add_donation_field()
        {
            if (!is_cart())
                return;

            if ($this->get_setting("enable") != 1)
                return;


            if ($this->get_setting('display_donation') && ($this->get_setting('display_donation') == 3 || $this->get_setting("display_donation") == 2)):
                $amount = 0;

                if ($this->get_donation_amount() > 0) {
                    $amount = $this->get_donation_amount();
                } else {
                    $amount = $this->get_setting('default_amt');
                }
                include_once self::$plugin_dir . 'view/donation-form.php';

            endif;
        }

        public function wp_head()
        {
            if (is_checkout() || is_cart()):
                ?>
                <script>
                    var rpdo_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
                </script>
                <style type="text/css">
                    .text-donation{
                        max-width: 200px;
                        display: inline-block !important;
                        min-height:28px;
                        line-height: 28px;
                        margin-right: 10px;
                    }
                    .rp-donation-block p.message{margin-bottom: 10px;}
                    .checkout_donation{display: block;width:100%;}
                    .rpdo-error{display: none;color:red;font-size: 12px;margin-top: 5px;}
                    .rpdo_loader{display: none;height: 16px;width: 16px;}
                </style>

                <?php
            endif;
        }

        public function admin_init()
        {
            wp_enqueue_style('rpdo-admin', self::$plugin_url . "assets/css/admin.css");
        }

        public function admin_menu()
        {
            $wc_page = 'woocommerce';
            add_submenu_page($wc_page, self::$plugin_title, self::$plugin_title, "install_plugins", self::$plugin_slug, array($this, "setting_donation"));
        }

        public function setting_donation()
        {
            /* save donation setting */
            if (isset($_POST[self::$plugin_slug])) {
                $this->saveSetting();
            }

            /* include admin   setting file */
            include_once self::$plugin_dir . "view/setting.php";
        }

        public function saveSetting()
        {
            $arrayRemove = array(self::$plugin_slug, "btn-rpdo-submit");
            $saveData = array();
            foreach ($_POST as $key => $value):
                if (in_array($key, $arrayRemove))
                    continue;
                $saveData[$key] = $value;
            endforeach;
            $this->rpdo_settings = $saveData;
            update_option(self::$rpdo_option_key, $saveData);
        }

        public function get_setting($key)
        {

            if (!$key || $key == "")
                return;

            if (!isset($this->rpdo_settings[$key]))
                return;

            return $this->rpdo_settings[$key];
        }

    }

}

/* load plugin if woocommerce plugin is activated */
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    /* load Donation plugin code */
    new rp_donation();
}