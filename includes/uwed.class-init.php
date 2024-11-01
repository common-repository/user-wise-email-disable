<?php
if (!class_exists('UWED_init_plugin')) {
    class UWED_init_plugin{

        static public $shortcodes = array();

        function __construct() {
            add_action('init', array( $this, 'uwed_initialte_hooks' ), 10, 0);
        }
    
        public function uwed_initialte_hooks(){

            add_action('admin_menu', array( $this, 'uwed_init_setting_page' ), 9);
            add_action('admin_notices', array( $this, 'uwed_save_setting' ), 9);

            add_filter('wp_mail', array( $this, 'uwed_emails_overrite' ), 100, 1);
        }

        public function uwed_init_setting_page() {
            $menu = add_menu_page(  
                'uwed-settings',
                esc_html__('Disable Emails Settings', 'user-wise-mail-disable'),
                'administrator',
                'uwed-settings',
                array( $this, 'uwed_settings' ),
                'dashicons-privacy',
                26
            );

            add_action( 'admin_print_styles-' . $menu, array( $this, 'uwed_admin_custom_css' ) );
        }

        public function uwed_admin_custom_css(){
            wp_enqueue_style('uwed-style', UWED_URL . '/assets/uwed-style.css' );
            wp_enqueue_script('uwed-script', UWED_URL . '/assets/uwed-script.js', array( 'jquery-ui-sortable' ), rand(), true );
        }
        
        public function uwed_save_setting(){
            if( isset( $_POST[ 'uwed_nonce_check' ] ) && wp_verify_nonce( $_POST[ 'uwed_nonce_check' ], 'uwed_nonce_check' ) ) {
                $uwed_lists = isset($_POST[ 'uwed__list_user' ]) ? $this->uwed_sanatize_array($_POST[ 'uwed__list_user' ]) : array();
                update_option('uwed_checked_users', $uwed_lists );
                echo sprintf(
                    '<div class="notice notice-success is-dismissible">
                        <p><strong>%s</strong></p>
                    </div>',
                    esc_html__('Settings saved.', 'user-wise-mail-disable')
                );
            }
        }

        public function uwed_sanatize_array( $data ){
            $san_data = array();

            if( !empty($data) ){
                foreach ( $data as $key => $val ) {
                    $san_data[ esc_attr($key) ] = sanitize_text_field( $val );
                }
            }

            return $san_data;
        }     

        public function uwed_settings()
        {
            $checked_users = get_option('uwed_checked_users');
            $args = array(
                'orderby'   => 'user_nicename',
                'order'     => 'ASC',
                'exclude'   => $checked_users
            );

            $users = get_users( $args );

            echo uwed_get_template(
                'uwed-users-lists.php',
                array(
                    'uwed_users'            => $users,
                    'uwed_checked_users'    => $checked_users
                )
            );
        }

        public function uwed_emails_overrite( array $args ): array
        {
            $checked_users = get_option('uwed_checked_users');

            $user = get_user_by('email', $args['to']);

            if (in_array($user->ID, $checked_users)) {
                $args['to'] = '';
            }
            return $args;
        }
    }

    new UWED_init_plugin();
}