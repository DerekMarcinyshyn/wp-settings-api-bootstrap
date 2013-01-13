<?php
/**
 * Plugin Name: WP Settings API Bootstrap Demo
 * Plugin URI: https://github.com/DerekMarcinyshyn/wp-settings-api-bootstrap
 * Description: WordPress Setting API Bootstrap demo showing all of the available fields
 * Author: Derek Marcinyshyn
 * Author URI: http://derek.marcinyshyn.com
 * Version: 1.0
 */

// include the wp-settings-api-bootstrap file
require_once dirname( __FILE__ ) . '/lib/wp-settings-api-bootstrap/class.wp-settings-api-bootstrap.php';

/**
 * WP Settings API Bootstrap Demo plugin
 *
 * @author Derek Marcinyshyn
 */
if ( !class_exists( 'WP_Settings_API_Bootstrap_Demo' ) ) :
    class WP_Settings_API_Bootstrap_Demo {

        /**
         * @var WP_Settings_API_Bootstrap
         */
        private $wp_settings_api;

        /**
         * Constructor
         */
        function __construct() {
            $this->wp_settings_api = new WP_Settings_API_Bootstrap();

            add_action( 'admin_init', array( $this, 'admin_init') );
            add_action( 'admin_menu', array( $this, 'admin_menu') );
        }

        /**
         * Initialize the settings on admin_init hook
         */
        function admin_init() {

            //set the settings
            $this->wp_settings_api->set_sections( $this->get_settings_sections() );
            $this->wp_settings_api->set_fields( $this->get_settings_fields() );

            //initialize settings
            $this->wp_settings_api->admin_init();
        }

        /**
         * Add the menu on admin_menu hook
         */
        function admin_menu() {
            add_options_page( 'WP Settings API Demo', 'WP Settings API Bootstrap Demo', 'delete_posts', 'wp_settings_api_demo', array($this, 'plugin_page') );
        }

        /**
         * Set up all of the Main settings sections
         *
         * @return array
         */
        function get_settings_sections() {
            $sections = array(
                array(
                    'id' => 'wp_settings_api_basics',
                    'title' => __( 'Basic Settings', 'mytextdomain' )
                ),
                array(
                    'id' => 'wp_settings_api_advanced',
                    'title' => __( 'Advanced Settings', 'mytextdomain' )
                ),
                array(
                    'id' => 'wp_settings_api_about',
                    'title' => __( 'About', 'mytextdomain' )
                )
            );
            return $sections;
        }

        /**
         * Returns all the settings fields
         *
         * @return array settings fields
         */
        function get_settings_fields() {

            // a little cleaner to create a variable and add html rather than in the array
            $about = '<h2>WP Settings API Bootstrap</h2>
                <p>WP Settings API Bootstrap is a WordPress class for plugin and theme developers to speed up development of their admin pages.</p>
                <p><a href="https://github.com/DerekMarcinyshyn/wp-settings-api-bootstrap" target="_blank">More information here.</a></p>';

            $settings_fields = array(
                'wp_settings_api_basics' => array(
                    array(
                        'name'      => 'text',
                        'label'     => __( 'Text Input', 'mytextdomain' ),
                        'desc'      => __( 'Text input description', 'mytextdomain' ),
                        'type'      => 'text',
                        'default'   => 'Title'
                    ),
                    array(
                        'name'      => 'textarea',
                        'label'     => __( 'Textarea Input', 'mytextdomain' ),
                        'desc'      => __( 'Textarea description', 'mytextdomain' ),
                        'type'      => 'textarea'
                    ),
                    array(
                        'name'      => 'checkbox',
                        'label'     => __( 'Checkbox', 'mytextdomain' ),
                        'desc'      => __( 'Checkbox Label', 'mytextdomain' ),
                        'type'      => 'checkbox'
                    ),
                    array(
                        'name'      => 'radio',
                        'label'     => __( 'Radio Button', 'mytextdomain' ),
                        'desc'      => __( 'A radio button', 'mytextdomain' ),
                        'type'      => 'radio',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no'    => 'No'
                        )
                    ),
                    array(
                        'name'      => 'multicheck',
                        'label'     => __( 'Multiple checkbox', 'mytextdomain' ),
                        'desc'      => __( 'Multi checkbox description', 'mytextdomain' ),
                        'type'      => 'multicheck',
                        'options'   => array(
                            'one'   => 'One',
                            'two'   => 'Two',
                            'three' => 'Three',
                            'four'  => 'Four'
                        )
                    ),
                    array(
                        'name'      => 'selectbox',
                        'label'     => __( 'Dropdown', 'mytextdomain' ),
                        'desc'      => __( 'Dropdown description', 'mytextdomain' ),
                        'type'      => 'select',
                        'default'   => 'no',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no'    => 'No'
                        )
                    ),
                    array(
                        'name'      => 'colorpicker',
                        'label'     => __( 'Colorpicker', 'mytextdomain' ),
                        'desc'      => __( 'Colorpicker description', 'mytextdomain' ),
                        'type'      => 'colorpicker',
                        'default'   => '#ff0000'
                    ),
                    array(
                        'name'      => 'media_uploader',
                        'label'     => __( 'Media Uploader', 'mytextdomain' ),
                        'desc'      => __( 'Uploader description', 'mytextdomain' ),
                        'type'      => 'media',
                        'default'   => 'http://s.wordpress.org/about/images/logos/wordpress-logo-hoz-rgb.png',
                        'btn_title' => 'Upload image'
                    ),
                    array(
                        'name'      => 'about',
                        'label'     => __( 'About', 'mytextdomain' ),
                        'desc'      => __( $about, 'mytextdomain' ),
                        'type'      => 'about'
                    )
                ),

                'wp_settings_api_advanced' => array(
                    array(
                        'name'      => 'text',
                        'label'     => __( 'Text Input', 'mytextdomain' ),
                        'desc'      => __( 'Text input description', 'mytextdomain' ),
                        'type'      => 'text',
                        'default'   => 'Title'
                    ),
                    array(
                        'name'      => 'textarea',
                        'label'     => __( 'Textarea Input', 'mytextdomain' ),
                        'desc'      => __( 'Textarea description', 'mytextdomain' ),
                        'type'      => 'textarea'
                    ),
                    array(
                        'name'      => 'checkbox',
                        'label'     => __( 'Checkbox', 'mytextdomain' ),
                        'desc'      => __( 'Checkbox Label', 'mytextdomain' ),
                        'type'      => 'checkbox'
                    ),
                    array(
                        'name'      => 'radio',
                        'label'     => __( 'Radio Button', 'mytextdomain' ),
                        'desc'      => __( 'A radio button', 'mytextdomain' ),
                        'type'      => 'radio',
                        'default'   => 'no',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no'    => 'No'
                        )
                    ),
                    array(
                        'name'      => 'multicheck',
                        'label'     => __( 'Multile checkbox', 'mytextdomain' ),
                        'desc'      => __( 'Multi checkbox description', 'mytextdomain' ),
                        'type'      => 'multicheck',
                        'default'   => array('one' => 'one', 'four' => 'four'),
                        'options'   => array(
                            'one'   => 'One',
                            'two'   => 'Two',
                            'three' => 'Three',
                            'four'  => 'Four'
                        )
                    ),
                    array(
                        'name'      => 'selectbox',
                        'label'     => __( 'A Dropdown', 'mytextdomain' ),
                        'desc'      => __( 'Dropdown description', 'mytextdomain' ),
                        'type'      => 'select',
                        'options'   => array(
                            'yes'   => 'Yes',
                            'no'    => 'No'
                        )
                    )
                ),
                'wp_settings_api_about' => array(
                    array(
                        'name'      => 'about',
                        'label'     => __( 'About', 'mytextdomain' ),
                        'desc'      => __( $about, 'mytextdomain' ),
                        'type'      => 'about'
                    )
                )
            );

            return $settings_fields;
        }

        /**
         * Display the admin page
         */
        function plugin_page() {
            echo '<div class="wrap">';
            echo '<div id="icon-options-general" class="icon32"></div>';
            echo '<h2>WP Settings API Bootstrap Demo</h2>';

            settings_errors();

            $this->wp_settings_api->show_navigation();
            $this->wp_settings_api->show_forms();

            echo '</div>';
        }

        /**
         * Get all the pages
         *
         * @return array page names with key value pairs
         */
        function get_pages() {
            $pages = get_pages();
            $pages_options = array();
            if ( $pages ) {
                foreach ($pages as $page) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }

    }
endif; // if class_exists

// initiate the class
$settings = new WP_Settings_API_Bootstrap_Demo();