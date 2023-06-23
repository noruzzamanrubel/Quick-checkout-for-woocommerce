<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Qcfw_Checkout_Buy_Now_Setting {

	public static $plugin_name = QCFW_CHECKOUT_TEXT_DOMAIN;

    public function register_qcfw_checkout_buy_now_settings(){
        // add_action('admin_menu', array($this, 'qcwf_checkout_admin_menu'));
		// add_filter( 'woocommerce_settings_tabs_array', array( $this, 'qcwf_checkout_add_setting_tab' ), 50 );

		add_action( 'woocommerce_sections_' . QCFW_CHECKOUT_SLUG, array( $this, 'qcwf_checkout_add_buy_now_section' ) );
		add_action( 'woocommerce_settings_save_' . QCFW_CHECKOUT_SLUG, array( $this, 'qcwf_checkout_save_buy_now_settings' ) );
    }

	// /**
	//  * Add tab
	//  *
	//  * @param array $settings_tabs.
	//  */
	// public function qcwf_checkout_add_setting_tab( $settings_tabs ) {
	// 	$settings_tabs[ QCFW_CHECKOUT_SLUG ] = esc_html__( 'Quick Checkout', QCFW_CHECKOUT_TEXT_DOMAIN );
	// 	return $settings_tabs;
	// }

    // public function qcwf_checkout_admin_menu(){
	// 	add_submenu_page( 'woocommerce', esc_html__( 'Quick Checkout', QCFW_CHECKOUT_TEXT_DOMAIN ), esc_html__( 'Quick Checkout', QCFW_CHECKOUT_TEXT_DOMAIN ), 'manage_woocommerce', admin_url( 'admin.php?page=wc-settings&tab=' . sanitize_title( QCFW_CHECKOUT_SLUG ) ) );
    // }

	public function qcwf_checkout_buy_now_settings(){
		return array(
			array(
				'id'   => 'qcwf_checkout_buy_now_section_title',
				'name' => esc_html__( 'Product archive/shop page', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type' => 'title',
			),
			array(
				'id'   => 'qcwf_checkout_shop_buy_now_btn_switch',
				'name' => esc_html__( 'Buy now button switch', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Buy now button switch', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'select',
				'class'    => 'chosen_select',
				'options'  => array(
					'no'       => esc_html__( 'No', QCFW_CHECKOUT_TEXT_DOMAIN ),
					'yes'       => esc_html__( 'Yes', QCFW_CHECKOUT_TEXT_DOMAIN ),
				),
				'default'  => 'no',
			),
			array(
				'id'   => 'qcwf_checkout_shop_buy_now_btn_label',
				'name' => esc_html__( 'Buy now button label', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Buy now button label', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'text',
				'default'  => 'Buy Now',
			),
			array(
				'id'   => 'qcwf_checkout_shop_buy_now_btn_position',
				'name' => esc_html__( 'Buy now button position', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Buy now button position', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'select',
				'class'    => 'chosen_select',
				'options'  => array(
					'before_btn'       => esc_html__( 'Before add to cart button', QCFW_CHECKOUT_TEXT_DOMAIN ),
					'after_btn'       => esc_html__( 'After add to cart button', QCFW_CHECKOUT_TEXT_DOMAIN ),
				),
				'default'  => 'after_btn',
			),
			array(
				'id'       => 'qcwf_checkout_shop_buy_now_btn_redirect_url',
				'name'     => esc_html__( 'Redirect to cart or checkout page', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Redirect to cart or checkout page', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'select',
				'class'    => 'chosen_select',
				'options'  => array(
					'cart'       => esc_html__( 'Cart', QCFW_CHECKOUT_TEXT_DOMAIN ),
					'checkout' => esc_html__( 'Checkout', QCFW_CHECKOUT_TEXT_DOMAIN ),
				),
				'default'  => 'checkout',
			),
			array(
				'id'   => 'qcwf_checkout_shop_buy_now_btn_bg_color',
				'name' => esc_html__( 'Buy now button backguound color', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Buy now button backguound color', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'color',
				'default'  => '#ee6443',
			),
			array(
				'id'   => 'qcwf_checkout_shop_buy_now_btn_text_color',
				'name' => esc_html__( 'Buy now button text color', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'desc_tip' => esc_html__( 'Buy now button text color', QCFW_CHECKOUT_TEXT_DOMAIN ),
				'type'     => 'color',
				'default'  => '#ffffff',
			),
			array(
				'type' => 'sectionend',
			),
		);
	}


	public function qcwf_checkout_add_buy_now_section() {
		global $current_section;

		if ( 'buy-now' == $current_section ) {

			$settings = $this->qcwf_checkout_buy_now_settings();
			woocommerce_admin_fields( $settings );
		}
	}

	public function qcwf_checkout_save_buy_now_settings(){
		global $current_section;

		if ( 'buy-now' == $current_section ) {

			woocommerce_update_options( $this->qcwf_checkout_buy_now_settings() );
		}
	}
	
}