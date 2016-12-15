<?php
/**
 * @package WordPress
 */

/*
* NB:WE CAN ADD ALL OTHER SETTINGS WE MIGHT MEED TO ADD TO FTSF HERE
* 
*/
add_action( 'admin_menu', 'ftsf_add_admin_menu' );
add_action( 'admin_init', 'ftsf_settings_init' );

if( !function_exists('ftst_add_admin_menu') ): 
    function ftsf_add_admin_menu() { 
        add_theme_page('FTSF Settings', 'FTSF Settings', 'administrator', 'admin/ftsfsettings.php', 'ftsf_settings_page');
    }
endif;

if( !function_exists('ftsf_settings_init') ): 
    function ftsf_settings_init() {
        //wp_enqueue_style('ftsf_plugin_style', plugins_url( '/css/style.css', __FILE__ ), false, '1.0', 'all');
        wp_localize_script('settings', 'settings_vars', 
            array(  
                'amenities_placeholder' => __('Add new', 'ftsf'),
                'admin_url' => get_admin_url(),
                'text' => __('Text', 'ftsf'),
                'numeric' => __('Numeric', 'ftsf'),
                'date' => __('Date', 'ftsf'),
                'no' => __('No', 'ftsf'),
                'yes' => __('Yes', 'ftsf'),
                'delete' => __('Delete', 'ftsf')
            )
        );
        register_setting( 'ftsf_contact_settings', 'ftsf_contact_settings' );
    }
endif;

//--------------Contact Settings----------------//

if( !function_exists('ftsf_admin_contact') ): 
    function ftsf_admin_contact() {
        add_settings_section( 'ftsf_contact_section', __( 'Contact', 'ftsf' ), 'ftsf_contact_section_callback', 'ftsf_contact_settings' );
        add_settings_field( 'ftsf_company_name_field',  __( 'Company Name', 'ftsf' ), 'ftsf_company_name_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_name_field',  __( 'Phone', 'ftsf' ), 'ftsf_contact_name_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_email_field',  __( 'E-mail', 'ftsf' ), 'ftsf_contact_email_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_mobile_field',  __( 'Mobile', 'ftsf' ), 'ftsf_contact_mobile_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_skype_field',  __( 'Skype', 'ftsf' ), 'ftsf_contact_skype_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_address_field',  __( 'Address', 'ftsf' ), 'ftsf_contact_address_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_facebook_field',  __( 'Facebook Link', 'ftsf' ), 'ftsf_contact_facebook_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_twitter_field',  __( 'Twitter Link', 'ftsf' ), 'ftsf_contact_twitter_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_google_field',  __( 'Google+ Link', 'ftsf' ), 'ftsf_contact_google_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
        add_settings_field( 'ftsf_contact_linkedin_field',  __( 'LinkedIn Link', 'ftsf' ), 'ftsf_contact_linkedin_field_render', 'ftsf_contact_settings', 'ftsf_contact_section' );
    }
endif;

if( !function_exists('ftsf_contact_section_callback') ): 
    function ftsf_contact_section_callback() { 
        echo '';
    }
endif;

if( !function_exists('ftsf_company_name_field_render') ): 
    function ftsf_company_name_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field1_enable]" name="ftsf_contact_settings[ftsf_field1_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field1_enable']) && $enabled['ftsf_field1_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;


        ?>
        <input id="ftsf_contact_settings[ftsf_company_name_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_company_name_field]" value="<?php if(isset($options['ftsf_company_name_field'])) { echo esc_attr($options['ftsf_company_name_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_name_field_render') ): 
    function ftsf_contact_name_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field2_enable]" name="ftsf_contact_settings[ftsf_field2_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field2_enable']) && $enabled['ftsf_field2_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_name_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_name_field]" value="<?php if(isset($options['ftsf_contact_name_field'])) { echo esc_attr($options['ftsf_contact_name_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_email_field_render') ): 
    function ftsf_contact_email_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field3_enable]" name="ftsf_contact_settings[ftsf_field3_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field3_enable']) && $enabled['ftsf_field3_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_email_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_email_field]" value="<?php if(isset($options['ftsf_contact_email_field'])) { echo esc_attr($options['ftsf_contact_email_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_mobile_field_render') ): 
    function ftsf_contact_mobile_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field4_enable]" name="ftsf_contact_settings[ftsf_field4_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field4_enable']) && $enabled['ftsf_field4_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_mobile_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_mobile_field]" value="<?php if(isset($options['ftsf_contact_mobile_field'])) { echo esc_attr($options['ftsf_contact_mobile_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_skype_field_render') ): 
    function ftsf_contact_skype_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field5_enable]" name="ftsf_contact_settings[ftsf_field5_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field5_enable']) && $enabled['ftsf_field5_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_skype_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_skype_field]" value="<?php if(isset($options['ftsf_contact_skype_field'])) { echo esc_attr($options['ftsf_contact_skype_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_address_field_render') ): 
    function ftsf_contact_address_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field6_enable]" name="ftsf_contact_settings[ftsf_field6_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field6_enable']) && $enabled['ftsf_field6_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <textarea cols='40' rows='5' name="ftsf_contact_settings[ftsf_contact_address_field]"><?php if(isset($options['ftsf_contact_address_field'])) { echo esc_html($options['ftsf_contact_address_field']); } ?></textarea>
        <?php
    }
endif;

if( !function_exists('ftsf_contact_facebook_field_render') ): 
    function ftsf_contact_facebook_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field7_enable]" name="ftsf_contact_settings[ftsf_field7_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field7_enable']) && $enabled['ftsf_field7_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_facebook_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_facebook_field]" value="<?php if(isset($options['ftsf_contact_facebook_field'])) { echo esc_attr($options['ftsf_contact_facebook_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_twitter_field_render') ): 
    function ftsf_contact_twitter_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field8_enable]" name="ftsf_contact_settings[ftsf_field8_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field8_enable']) && $enabled['ftsf_field8_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_twitter_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_twitter_field]" value="<?php if(isset($options['ftsf_contact_twitter_field'])) { echo esc_attr($options['ftsf_contact_twitter_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_google_field_render') ): 
    function ftsf_contact_google_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field9_enable]" name="ftsf_contact_settings[ftsf_field9_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field9_enable']) && $enabled['ftsf_field9_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_google_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_google_field]" value="<?php if(isset($options['ftsf_contact_google_field'])) { echo esc_attr($options['ftsf_contact_google_field']); } ?>" />
        <?php
    }
endif;

if( !function_exists('ftsf_contact_linkedin_field_render') ): 
    function ftsf_contact_linkedin_field_render() {
        $options = get_option( 'ftsf_contact_settings' );

        $enabled = get_option( 'ftsf_contact_settings' );
        $values = array(__('disabled', 'ftsf'), __('enabled', 'ftsf'));
        $value_select = '<select id="ftsf_contact_settings[ftsf_field0_enable]" name="ftsf_contact_settings[ftsf_field0_enable]">';

        foreach($values as $value) {
            $value_select .= '<option value="' . esc_attr($value) . '"';
            if(isset($enabled['ftsf_field0_enable']) && $enabled['ftsf_field0_enable'] == $value) {
                $value_select .= 'selected="selected"';
            }
            $value_select .= '>' . esc_html($value) . '</option>';
        }
        $value_select .= '</select>';

        print $value_select;

        ?>
        <input id="ftsf_contact_settings[ftsf_contact_linkedin_field]" type="text" size="40" name="ftsf_contact_settings[ftsf_contact_linkedin_field]" value="<?php if(isset($options['ftsf_contact_linkedin_field'])) { echo esc_attr($options['ftsf_contact_linkedin_field']); } ?>" />
        <?php
    }
endif;


//------------------------------------------//


if( !function_exists('ftsf_settings_page') ): 
    function ftsf_settings_page() { 
        $allowed_html = array();
        $active_tab = isset( $_GET[ 'tab' ] ) ? wp_kses( $_GET[ 'tab' ],$allowed_html ) : 'contact';
        $tab = 'ftsf_contact_settings';

        switch ($active_tab) {
            case "contact":
                ftsf_admin_contact();
                $tab = 'ftsf_contact_settings';
                break;           
        }
        ?>

        <div class="ftsf-wrapper">
            <div class="ftsf-leftSide">
                <div class="ftsf-logo"><span class="fa fa-home"></span> FTSF Settings</div>
                <ul class="ftsf-tabs">
                    <li class="<?php echo $active_tab == 'contact' ? 'ftsf-tab-active' : '' ?>">
                        <a href="themes.php?page=admin/ftsfsettings.php/#contact">
                            <span class="icon-envelope ftsf-tab-icon"></span><span class="ftsf-tab-link"><?php esc_html_e('Contact','ftsf') ?></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ftsf-content">
                <form action='options.php' method='post'>
                    <?php
                    wp_nonce_field( 'update-options' );
                    settings_fields( $tab );
                    do_settings_sections( $tab );
                    submit_button();
                    ?>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>

        <?php
    }
endif;

?>