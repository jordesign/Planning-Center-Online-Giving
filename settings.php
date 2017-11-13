<?php

//Options Screen to load PCO Church Subdomain & Button Text
class pcoOptions {
	private $pco_options_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'pco_options_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'pco_options_page_init' ) );
	}

	public function pco_options_add_plugin_page() {
		add_options_page(
			'Planning Center Online Giving Options', // page_title
			'Planning Center Online Giving', // menu_title
			'manage_options', // capability
			'pco-giving-options', // menu_slug
			array( $this, 'pco_options_create_admin_page' ) // function
		);
	}

	public function pco_options_create_admin_page() {
		$this->pco_options_options = get_option( 'pco_options_option_name' ); ?>

		<div class="wrap">
			<h2>PCO Giving Options</h2>

			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'pco_options_option_group' );
					do_settings_sections( 'pco-options-admin' );
					submit_button();
				?>
			</form>

			<h2>Usage</h2>
			<p>The 'give' button can be inserted into your page content (or a text widget) using the shortcode <code>[pco-giving]</code>. <br>The default settings from this page will be used, but can be overidden in the format <code>[pco-giving button="Donate Now" subdomain="firstballard" class="button"]</code></p>.

			<h3>Shortcode Attributes</h3>
			<p><strong><code>button</code></strong> <br>
				This replaces the string of text displayed within the button.
			</p>
			<p><strong><code>subdomain</code></strong> <br>
				This is the subdomain associated with your 'Planning Center Online' account.
			</p>
			<p><strong><code>class</code></strong> <br>
				This can be used to add CSS classes your theme might use for button or link styling.
			</p>
		</div>
	<?php }

	public function pco_options_page_init() { 
		register_setting(
			'pco_options_option_group', // option_group
			'pco_options_option_name', // option_name
			array( $this, 'pco_options_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'pco_options_setting_section', // id
			'Settings', // title
			array( $this, 'pco_options_section_info' ), // callback
			'pco-options-admin' // page
		);

		add_settings_field(
			'pco_church_id_0', // id
			'PCO Church Subdomain', // title
			array( $this, 'pco_church_id_0_callback' ), // callback
			'pco-options-admin', // page
			'pco_options_setting_section' // section
		);

		add_settings_field(
			'default_button_text_1', // id
			'Default Button Text', // title
			array( $this, 'default_button_text_1_callback' ), // callback
			'pco-options-admin', // page
			'pco_options_setting_section' // section
		);
		add_settings_field(
			'styling_class_2', // id
			'CSS class for styling', // title
			array( $this, 'styling_class_2_callback' ), // callback
			'pco-options-admin', // page
			'pco_options_setting_section' // section
		);
	}

	public function pco_options_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['pco_church_id_0'] ) ) {
			$sanitary_values['pco_church_id_0'] = sanitize_text_field( $input['pco_church_id_0'] );
		}

		if ( isset( $input['default_button_text_1'] ) ) {
			$sanitary_values['default_button_text_1'] = sanitize_text_field( $input['default_button_text_1'] );
		}

		if ( isset( $input['styling_class_2'] ) ) {
			$sanitary_values['styling_class_2'] = sanitize_text_field( $input['styling_class_2'] );
		}

		return $sanitary_values;
	}

	public function pco_options_section_info() {
		
	}

	public function pco_church_id_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="pco_options_option_name[pco_church_id_0]" id="pco_church_id_0" value="%s">
			<p>This is the string in your giving URL. <code>[yourchurchsubdomain].churchcenteronline.com</code> </p>',
			isset( $this->pco_options_options['pco_church_id_0'] ) ? esc_attr( $this->pco_options_options['pco_church_id_0']) : ''
		);
	}

	public function default_button_text_1_callback() {
		printf(
			'<input class="regular-text" type="text" name="pco_options_option_name[default_button_text_1]" id="default_button_text_1" value="%s">',
			isset( $this->pco_options_options['default_button_text_1'] ) ? esc_attr( $this->pco_options_options['default_button_text_1']) : ''
		);
	}

	public function styling_class_2_callback() {
		printf(
			'<input class="regular-text" type="text" name="pco_options_option_name[styling_class_2]" id="styling_class_2" value="%s">
			<p>If your theme has a specific CSS class for styling buttons - you can add it here.</p>',
			isset( $this->pco_options_options['styling_class_2'] ) ? esc_attr( $this->pco_options_options['styling_class_2']) : ''
		);
	}

}
if ( is_admin() )
	$pco_options = new pcoOptions();