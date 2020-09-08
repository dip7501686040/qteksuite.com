<?php

/**
 * Returns all the tags with classes and ids
 * that adapts primary colors.
 *
 * @return string The tags.
 */
function thrive_colors_tags( $type ) {


    // WordPress: Foregrounds
    $collection['primary_color'] = '.primary, a, .subway-login-form .subway-login-lost-password a, .subway-login-form .login-remember label, .widget a:hover, .tribe-events-list .type-tribe_events h2 a, .tribe-events-list .type-tribe_events h2 a:hover, .bboss_search_page .search_filters ul li.current a, .bboss_search_page .search_filters ul li.active a, .bboss_search_page .search_filters ul li a:hover, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce .star-rating span, .thrive-inline.woocommerce-page .star-rating, .thrive-inline.woocommerce .star-rating, .woocommerce .star-rating:before, #thrive-wisechat-support .wcControlsButtonsIncluded a.wcAddImageAttachment:before, .thrive-inline .wcContainer a.wcAddImageAttachment:before, #page-sidenav #page-sidebar-menu ul#secondary-menu-links .menu-item a:hover, #page-sidenav #page-sidebar-menu ul#secondary-menu-links .menu-item.current-menu-item a,';

    // Other Plugins: Foregrounds
    $collection['primary_color'] .= '.buddypress .pagination-links a.current, .buddypress .pagination-links span.current, .bp-user #item-body .profile ul.button-nav li.current a, .bp-user #item-body .profile ul.button-nav li a:hover, #item-header #object-actionables .generic-button#send-private-message a, #item-header #object-actionables .generic-button#post-mention a, .buddypress #subnav ul li.current a, .buddypress #subnav ul li a:hover, .buddypress .activity-type-tabs ul li.selected#activity-all a:before, .buddypress .activity-type-tabs ul li.selected#activity-groups a:before, .buddypress .activity-type-tabs ul li.selected#activity-mentions a:before, .buddypress .activity-type-tabs ul li.selected#activity-friends a:before, .buddypress .activity-type-tabs ul li.selected#activity-favorites a:before, .buddypress .activity-type-tabs ul li.selected#activity-notifications a:before, .buddypress .activity-type-tabs ul li.selected:before, .buddypress .activity-type-tabs ul li.selected a, .buddypress ul#activity-stream li .activity-meta a:hover, .buddypress ul#activity-stream li .activity-comments ul .acomment-context .acomment-options a:hover, .buddypress.directory.members .item-list-tabs ul li.selected a, .buddypress.directory.groups .item-list-tabs ul li.selected a, .buddypress ul#groups-list li .action a, .group-create #group-create-tabs ul li.current a, .thrive-inline #buddypress #bp-docs-all-docs li.current a, .thrive-inline #buddypress #bp-docs-all-docs li a:hover';

    // WordPress: Backgrounds
    $collection['primary_background'] = 'input[type=reset], input[type=button], input[type=submit], button, .more-link, .button, body.thrive-inline #wp-link-wrap.wp-core-ui form#wp-link .submitbox #wp-link-cancel button, body.thrive-inline #wp-link-wrap.wp-core-ui form#wp-link .submitbox #wp-link-submit, .gears-pricing-table .gears-pricing-table-btn .btn, .thrive-inline .products .product .add_to_cart_button, .thrive-inline.woocommerce-cart input.button, .thrive-inline.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .thrive-inline .woocommerce a.button, .woocommerce .widget_price_filter .price_slider_amount .button, a.button.wc-forward, a.button.checkout.wc-forward, .woocommerce a.added_to_cart, .woocommerce a.button.wc-backward, .woocommerce #respond input#submit, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button, .woocommerce div.product form.cart .button, .woocommerce .widget_price_filter .price_slider_amount .button:hover, a.button.wc-forward:hover, .woocommerce a.added_to_cart:hover, .woocommerce a.button.wc-backward:hover, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce div.product form.cart .button:hover, #doc-submit-options .action.safe, .ac-reply-cancel, body.thrive-inline a.delete-doc-button, .widget_bp_core_login_widget .bp-login-widget-register-link a, .buddypress #wp-link-wrap.wp-core-ui .submitbox .submitdelete, #item-buttons .generic-button a, .buddypress #wp-link-wrap.wp-core-ui .submitbox #wp-link-submit,';

    // Other Plugins Primary Background
    $collection['primary_background'] .= '.bg-primary-700, input[type=reset], input[type=button], input[type=submit], button, .more-link, .button, body.thrive-inline #wp-link-wrap.wp-core-ui form#wp-link .submitbox #wp-link-cancel button, body.thrive-inline #wp-link-wrap.wp-core-ui form#wp-link .submitbox #wp-link-submit, .gears-pricing-table .gears-pricing-table-btn .btn, .thrive-inline .products .product .add_to_cart_button, .thrive-inline.woocommerce-cart input.button, .thrive-inline.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .thrive-inline .woocommerce a.button, .woocommerce .widget_price_filter .price_slider_amount .button, a.button.wc-forward, a.button.checkout.wc-forward, .woocommerce a.added_to_cart, .woocommerce a.button.wc-backward, .woocommerce #respond input#submit, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button, .woocommerce div.product form.cart .button, .woocommerce .widget_price_filter .price_slider_amount .button:hover, a.button.wc-forward:hover, .woocommerce a.added_to_cart:hover, .woocommerce a.button.wc-backward:hover, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce div.product form.cart .button:hover, #doc-submit-options .action.safe, .ac-reply-cancel, body.thrive-inline a.delete-doc-button, .widget_bp_core_login_widget .bp-login-widget-register-link a, .buddypress #wp-link-wrap.wp-core-ui .submitbox .submitdelete, #item-buttons .generic-button a, .buddypress #wp-link-wrap.wp-core-ui .submitbox #wp-link-submit, #secondary .widget-title, .widget.home-widgets h3.widget-title, .thrive-inline div.product .onsale:before, .thrive-inline .widget.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range, .thrive-inline .widget.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle, #thrive-wisechat-support #thrive-wisechat-support-close-btn, .thrive-inline .wcContainer input[type="button"], .thrive-inline .wcContainer input[type="submit"], .thrive-inline .wcContainer input[type="button"]:hover, .thrive-inline .wcContainer input[type="button"]:focus, .thrive-inline .wcContainer input[type="button"]:active, .thrive-inline .wcContainer input[type="submit"]:hover, .thrive-inline .wcContainer input[type="submit"]:focus, .thrive-inline .wcContainer input[type="submit"]:active, #site-branding, #task_breaker-modal-heading, .users-nav.main-navs > ul .profile-nav-dropdown-btn, .groups-nav.main-navs > ul .profile-nav-dropdown-btn, .activity-update-form #whats-new-submit input#aw-whats-new-submit, .activity-update-form #whats-new-submit input#aw-whats-new-submit:hover, .subway-login-form .subway-login-form__actions, #thrive_footer_widget, .wp-polls .Buttons, body #admin-only-bcp-cover-photo-settings,';

    // BuddyPress
    $collection['primary_background'] .= '.bg-primary, .bp-navs ul li .count, .single-item.groups .buddypress-wrap .bp-navs li.selected a .count, .single-item.groups .buddypress-wrap .bp-navs li.current a .count, .single-item.groups .buddypress-wrap .bp-navs li a:hover a .count';

    // BuddyPress: Backgrounds
    $collection['secondary_background'] = '';

    // WordPress: Border Colors
    $collection['border_color'] = '';

    // BuddyPress: Border Colors
    $collection['border_color'] = '.buddypress #subnav ul li.selected.current a, .buddypress.directory.members .item-list-tabs ul li.selected a, .buddypress.directory.groups .item-list-tabs ul li.selected a, .thrive-inline #buddypress #bp-docs-all-docs li.current a, .thrive-inline #buddypress #bp-docs-all-docs li a:hover';

	return trim( $collection[ $type ] );

}