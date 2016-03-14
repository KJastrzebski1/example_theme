<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Settings Admin', 
            'Alt Watch', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' ),
            'dashicons-clock',
            50
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'alt_clock_option' );
        ?>
        <div class="wrap">
            <h2>Alt Watch</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'alt_clock_options_group' );   
                do_settings_sections( 'my-setting-admin' );
                submit_button();  
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'alt_clock_options_group', // Option group
            'alt_clock_option', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  
        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
        add_settings_field(
            'diameter', // ID
            'Diameter', // Title 
            array( $this, 'diameter_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );
        add_settings_field(
            'url', 
            'Background image', 
            array( $this, 'url_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'h_color', // ID
            'Hands Color', // Title 
            array( $this, 'h_color_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );
        add_settings_field(
            'dial_color', // ID
            'Dial Color', // Title 
            array( $this, 'dial_color_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );
        
            
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['diameter'] ) )
            $new_input['diameter'] = absint( $input['diameter'] );
        $new_input['h_color'] = $input['h_color'];
        $new_input['dial_color'] = $input['dial_color'];
        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );
        $new_input['url'] = $input['url'];
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function diameter_callback()
    {
        printf(
            '<input type="text" id="diameter" name="alt_clock_option[diameter]" value="%s" />',
            isset( $this->options['diameter'] ) ? esc_attr( $this->options['diameter']) : ''
        );
    }
    public function h_color_callback(){
        printf(
                '<input type="text" name="alt_clock_option[h_color]" class="my-color-field" value="%s" />',
                isset( $this->options['h_color'] ) ? esc_attr( $this->options['h_color']) : '#fff'
                );
                
        }
    public function dial_color_callback(){
        printf(
                '<input type="text" id="dial_color" name="alt_clock_option[dial_color]" class="my-color-field" value="%s" />',
                isset( $this->options['dial_color'] ) ? esc_attr( $this->options['dial_color']) : '#eeee22'
                );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="alt_clock_option[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
    public function url_callback()
    {
        printf(
            '<input type="text" name="alt_clock_option[url]" class="media-input" value="%s" /><button class="media-button">Select image</button>',
                isset( $this->options['url'] ) ? esc_attr( $this->options['url']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();