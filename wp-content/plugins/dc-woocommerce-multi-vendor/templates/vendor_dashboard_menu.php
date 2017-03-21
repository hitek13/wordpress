<?php
/**
 * The template for displaying single product page vendor tab 
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/vendor_dashboard_menu.php
 *
 * @author 		WC Marketplace
 * @package 	dc-product-vendor/Templates
 * @version   2.3.0
 */
global $WCMp;
$pages = get_option('wcmp_pages_settings_name');
$vendor = get_wcmp_vendor(get_current_user_id());
$notice_data = get_option('wcmp_notices_settings_name');
$notice_to_be_display = '';
if (!isset($selected_item))
    $selected_item = '';
if (!$vendor->image)
    $vendor->image = $WCMp->plugin_url . 'assets/images/WP-stdavatar.png';
$wcmp_payment_settings_name = get_option('wcmp_payment_settings_name');
$_vendor_give_shipping = get_user_meta(get_current_user_id(), '_vendor_give_shipping', true);
$wcmp_capabilities_settings_name = get_option('wcmp_capabilities_settings_name');
$_vendor_submit_coupon = get_user_meta(get_current_user_id(), '_vendor_submit_coupon', true);
$policies_settings = get_option('wcmp_general_policies_settings_name');
$customer_support_details_settings = get_option('wcmp_general_customer_support_details_settings_name');
$is_policy_show_in_menu = 0;
$is_university_show_in_menu = 0;
if ((isset($policies_settings['is_policy_on']) && (isset($policies_settings['is_cancellation_on']) || isset($policies_settings['is_refund_on']) || isset($policies_settings['is_shipping_on'])) && (isset($wcmp_capabilities_settings_name['can_vendor_edit_cancellation_policy']) || isset($wcmp_capabilities_settings_name['can_vendor_edit_refund_policy']) || isset($wcmp_capabilities_settings_name['can_vendor_edit_shipping_policy']) )) || (isset($customer_support_details_settings['is_customer_support_details']) && isset($wcmp_capabilities_settings_name['can_vendor_add_customer_support_details']) )) {
    $is_policy_show_in_menu = 1;
}
$general_settings = get_option('wcmp_general_settings_name');
if (isset($general_settings['is_university_on'])) {
    $is_university_show_in_menu = 1;
}
$active_plugins = (array) get_option('active_plugins', array());
if (in_array('wcmp-vendor_shop_seo/wcmp_vendor_shop_seo.php', $active_plugins)) {
    $seo_active = true;
}
?>
<div class="wcmp_side_menu">
    <div class="wcmp_top_logo_div"> <img src="<?php echo $vendor->image; ?>" alt="vendordavatar">
        <h3><?php $shop_name = get_user_meta(get_current_user_id(), '_vendor_page_title', true);
if (!empty($shop_name)) {
    echo $shop_name;
} else {
    _e('Shop Name', $WCMp->text_domain);
} ?></h3>
        <ul>
            <li><a target="_blank" href="<?php echo apply_filters('wcmp_vendor_shop_permalink', $vendor->permalink); ?>"><?php _e('Shop', $WCMp->text_domain); ?></a> </li>
<?php $is_show_wcmp_anouncement = apply_filters('wcmp_show_vendor_announcements', true); ?>
<?php if ($is_show_wcmp_anouncement) { ?>
                <li><a target="_self" href="<?php echo isset($pages['vendor_announcements']) ? get_permalink($pages['vendor_announcements']) : ''; ?>"><?php _e('Announcements', $WCMp->text_domain); ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="wcmp_main_menu">
        <ul>
            <li class="ic_shop"><a target="_blank" href="<?php echo $vendor->permalink; ?>" data-menu_item="Vendor_shop" ><i class="icon_stand ic10"> </i> <span class="writtings"><?php _e('Shop', $WCMp->text_domain); ?></span></a></li>
            <li class="ic_announment"><a  target="_self"  href="<?php echo isset($pages['vendor_announcements']) ? get_permalink($pages['vendor_announcements']) : ''; ?>" data-menu_item="vendor_announcements" ><i class="icon_stand ic9"> </i> <span class="writtings"><?php _e('Announcements', $WCMp->text_domain); ?></span></a></li>
            <li><a <?php if ($selected_item == "dashboard") {
                        echo 'class="active"';
                    } ?> data-menu_item="dashboard" href="<?php echo isset($pages['vendor_dashboard']) ? get_permalink($pages['vendor_dashboard']) : ''; ?>" data-menu_item="dashboard" ><i class="icon_stand ic1"> </i> <span class="writtings"><?php _e('Dashboard', $WCMp->text_domain); ?></span></a></li>
                    <?php $show_store_settion = apply_filters('is_wcmp_show_store_settings', true); ?>
                    <?php if ($show_store_settion) { ?>
                <li class="hasmenu"><a <?php if (in_array($selected_item, apply_filters('wcmp_store_settings_sub_menu_options', array('shop_front', 'policies', 'billing', 'shipping')))) {
                        echo 'class="active"';
                    } ?> href="#"><i class="icon_stand ic2"> </i> <span class="writtings"><?php _e('Store Settings', $WCMp->text_domain); ?></span></a>
                    <ul class="submenu" <?php if (!in_array($selected_item, apply_filters('wcmp_store_settings_sub_menu_options', array('shop_front', 'policies', 'billing', 'shipping')))) { ?> style="display:none;"<?php } ?>>
                        <li><a href="<?php echo isset($pages['shop_settings']) ? get_permalink($pages['shop_settings']) : ''; ?>" <?php if ($selected_item == "shop_front") {
                        echo 'class="selected_menu"';
                    } ?> data-menu_item="shop_front"><?php _e('- Shop front', $WCMp->text_domain); ?></a></li>
                <?php if ($is_policy_show_in_menu == 1) { ?>
                            <li><a href="<?php echo isset($pages['vendor_policies']) ? get_permalink($pages['vendor_policies']) : ''; ?>" <?php if ($selected_item == "policies") {
                echo 'class="selected_menu"';
            } ?> data-menu_item="policies"><?php _e('- Policies', $WCMp->text_domain); ?></a></li>
                <?php } ?>
                        <li><a href="<?php echo isset($pages['vendor_billing']) ? get_permalink($pages['vendor_billing']) : ''; ?>" <?php if ($selected_item == "billing") {
                echo 'class="selected_menu"';
            } ?> data-menu_item="billing"><?php _e('- Billing', $WCMp->text_domain); ?></a></li>
                        <?php $is_show_shipping_tab = apply_filters('is_wcmp_show_shipping_tab', true); ?>
                        <?php if (isset($wcmp_payment_settings_name['give_shipping']) && get_option('woocommerce_calc_shipping') != 'no') {
                            if (empty($_vendor_give_shipping) && $is_show_shipping_tab) { ?>
                                <li><a href="<?php echo isset($pages['vendor_shipping']) ? get_permalink($pages['vendor_shipping']) : ''; ?>" <?php if ($selected_item == "shipping") {
                                    echo 'class="selected_menu"';
                                } ?> data-menu_item="shipping"><?php _e('- Shipping', $WCMp->text_domain); ?></a></li>
                    <?php }
                } ?>
                <?php do_action('wcmp_store_settings_sub_menu', $selected_item); ?>
                    </ul>
                </li>
                <?php } ?>
                    <?php $is_show_product_tab = apply_filters('is_wcmp_show_product_tab', true); ?>
                    <?php if ($WCMp->vendor_caps->vendor_capabilities_settings('is_submit_product') && get_user_meta($vendor->id, '_vendor_submit_product', true) && $is_show_product_tab) { ?>
                <li class="hasmenu"><a <?php if (in_array($selected_item, array('product_manager', 'add_product_manager', 'pending_product_manager'))) {
                        echo 'class="active"';
                    } ?>  data-menu_item="product_manager" href="<?php if (class_exists('WCMp_Frontend_Product_Manager')) {
                echo apply_filters('wcmp_vendor_submit_product_tab_link', '#');
            } else {
                echo apply_filters('wcmp_vendor_submit_product', admin_url('edit.php?post_type=product'));
            } ?>"><span class="icon_stand ic3 shop_url"> </span> <span class="writtings"><?php _e('Product Manager', $WCMp->text_domain); ?></span></a>
                <?php do_action('after_product_manager', $vendor, $selected_item); ?>
                </li>
            <?php } ?>
                    <?php $is_show_promote_tab = apply_filters('is_wcmp_show_promote_tab', true); ?>
                    <?php if (((isset($seo_active) && $seo_active == true) || (isset($wcmp_capabilities_settings_name['is_submit_coupon']) && !empty($_vendor_submit_coupon))) && $is_show_promote_tab) { ?>		
                <li class="hasmenu"><a href="#"><span class="icon_stand ic4"> </span> <span class="writtings"><?php _e('Promote', $WCMp->text_domain); ?></span></a>
                    <ul class="submenu" <?php if ($selected_item != "coupon") { ?> style="display:none;" <?php } ?>>
                        <?php if (isset($wcmp_capabilities_settings_name['is_submit_coupon']) && !empty($_vendor_submit_coupon)) { ?>
                            <li><a <?php if ($selected_item == "add_coupon") {
                        echo 'class="selected_menu"';
                    } ?> data-menu_item="add_coupon" target="_blank" href="<?php echo apply_filters('wcmp_vendor_submit_coupon', admin_url('post-new.php?post_type=shop_coupon')); ?>"><?php _e('- Add Coupon', $WCMp->text_domain); ?></a></li>
                            <li><a <?php if ($selected_item == "coupon") {
                        echo 'class="selected_menu"';
                    } ?> data-menu_item="coupon" href="<?php echo apply_filters('wcmp_vendor_coupons', admin_url('edit.php?post_type=shop_coupon')); ?>"><?php _e('- Coupons', $WCMp->text_domain); ?></a></li>
                <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <?php $is_show_report_tab = apply_filters('is_wcmp_show_report_tab', true); ?>
            <?php if ($is_show_report_tab) { ?>
                <li class="hasmenu"><a <?php if ($selected_item == "vendor_report") {
                echo 'class="active"';
            } ?> href="#"><span class="icon_stand ic5"> </span> <span class="writtings"><?php _e('Stats/Reports', $WCMp->text_domain); ?></span></a>
                    <ul class="submenu" <?php if ($selected_item != "vendor_report") { ?> style="display:none;" <?php } ?>>
                        <li><a <?php if ($selected_item == "vendor_report") {
                echo 'class="selected_menu"';
            } ?> data-menu_item="overview" href="<?php echo isset($pages['vendor_report']) ? get_permalink($pages['vendor_report']) : ''; ?>"><?php _e('- Overview', $WCMp->text_domain); ?></a></li>
                <?php do_action('after_vendor_report', $vendor, $selected_item); ?>
                    </ul>
                </li>
            <?php } ?>
            <?php $is_show_order_tab = apply_filters('is_wcmp_show_order_tab', true); ?>
            <?php if ($is_show_order_tab) { ?>
                <li><a <?php if ($selected_item == "orders") {
                echo 'class="active"';
            } ?> data-menu_item="orders" href="<?php echo isset($pages['view_order']) ? get_permalink($pages['view_order']) : ''; ?>"><span class="icon_stand ic6"> </span> <span class="writtings"><?php _e('Orders', $WCMp->text_domain); ?></span></a></li>
            <?php } ?>
            <?php $is_show_payment_tab = apply_filters('is_wcmp_show_payment_tab', true); ?>
                <?php if ($is_show_payment_tab) { ?>
                <li class="hasmenu"><a <?php if (in_array($selected_item, array('widthdrawal', 'history'))) {
                        echo 'class="active"';
                    } ?> href="#"><span class="icon_stand ic7"> </span><span class="writtings"><?php _e('Payments', $WCMp->text_domain); ?></span></a>
                    <ul class="submenu" <?php if (!in_array($selected_item, array('widthdrawal', 'history'))) { ?> style="display:none;"<?php } ?>>
                        <?php if (isset($WCMp->vendor_caps->payment_cap['wcmp_disbursal_mode_vendor']) && $WCMp->vendor_caps->payment_cap['wcmp_disbursal_mode_vendor'] == 'Enable') { ?>
                            <li><a <?php if ($selected_item == "widthdrawal") {
                        echo 'class="selected_menu"';
                    } ?> data-menu_item="widthdrawal" href="<?php echo isset($pages['vendor_widthdrawals']) ? get_permalink($pages['vendor_widthdrawals']) : ''; ?>"><?php _e('- Withdrawal', $WCMp->text_domain); ?></a></li>
                    <?php } ?>
                        <li><a <?php if ($selected_item == "history") {
                        echo 'class="selected_menu"';
                    } ?> data-menu_item="history" href="<?php echo isset($pages['vendor_transaction_detail']) ? get_permalink($pages['vendor_transaction_detail']) : ''; ?>"><?php _e('- History', $WCMp->text_domain); ?></a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if ($is_university_show_in_menu == 1) { ?>
                            <li><a <?php if ($selected_item == "university") {
                    echo 'class="active"';
                } ?> data-menu_item="uiversity" href="<?php echo isset($pages['vendor_university']) ? get_permalink($pages['vendor_university']) : ''; ?>"><span class="icon_stand ic8"> </span> <span class="writtings"><?php _e('University', $WCMp->text_domain); ?></span></a></li>
            <?php } ?>
            <!-- Vendor Extra Menu -->
            <?php
            $extra_menu = array();
            $default_menu_args = array('label' => '',
                'is_parent' => true,
                'parent_slug' => '',
                'has_child' => false,
                'child_menu' => array(),
                'menu_link' => '',
                'can_manage' => 'Enable',
                'menu_icon' => ''
            );
            $extra_menu = apply_filters('wcmp_vendor_dashboard_extra_menu', $extra_menu, $default_menu_args);

            if (is_array($extra_menu) && count($extra_menu) == 0)
                $extra_menu['default'] = $default_menu_args;

            if (!empty($extra_menu)) :
                foreach ($extra_menu as $key => $menu) :
                    if ($key != 'default' && $menu['can_manage']== 'Enable') :
                        $hassubmenu = '';
                        if ($menu['has_child'] == true && count($menu['child_menu']) != 0 && is_array($menu['child_menu']))
                            $hassubmenu = 'class="hasmenu"';
                        ?>
                                    <li <?php echo $hassubmenu; ?>><a class="wcmp_vendor_dash_menu <?php if (array_key_exists($selected_item, $menu['child_menu'])) {
                            echo 'active';
                        } ?>" data-menu_item="<?php echo $key; ?>" href="<?php if (!empty($hassubmenu)) echo '#';
                        else echo $menu['menu_link']; ?>"><span class="<?php if (!empty($menu['menu_icon'])) echo $menu['menu_icon'];
                        else echo 'icon_stand ic1'; ?>"> </span> <span class="writtings"><?php echo $menu['label']; ?></span></a>
                        <?php if ($menu['has_child'] == true && count($menu['child_menu']) != 0 && is_array($menu['child_menu'])) : ?>
                                            <ul class="submenu" <?php if (!array_key_exists($selected_item, $menu['child_menu'])) { ?> style="display:none;" <?php } ?>>
                            <?php
                            foreach ($menu['child_menu'] as $subkey => $submenu) :
                                if ($submenu['parent_slug'] == $key && $submenu['can_manage'] == 'Enable') :
                                    ?>
                                                        <li><span class="<?php if (!empty($submenu['menu_icon'])) echo $submenu['menu_icon'];
                                    else echo ''; ?>"> </span><a class="wcmp_vendor_dash_menu <?php if ($selected_item == $subkey) {
                                        echo 'selected_menu';
                                    } ?>" data-menu_item="<?php echo $key; ?>" href="<?php echo $submenu['menu_link']; ?>"><?php echo $submenu['label']; ?></a></li>
                                <?php endif; 
                            endforeach;
                            ?>
                                            </ul>
                        <?php endif; ?>
                                    </li>
                    <?php
                    endif;
                endforeach;
            endif;
            ?>
        </ul>
    </div>
</div>
<div class="popup-overlay"></div>
<div id="show_addons_msg" class="popup">
    <div class="popup-body"> 
        <span class="popup-exit"></span>    
        <div class="popup-content">
            <div class="" style="color: green;"></div>
            <div>This feature is not available for you. Please contact your admin. </div>
            <div class="clear"></div>
        </div>
    </div>
</div>