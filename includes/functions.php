<?php

if( !function_exists( 'uwed_get_template' ) ) : 
    function uwed_get_template( string $template_name, array $args = array(), string $template_path = '' )
    {
        if( empty( $template_path ) ) :
            $template_path = UWED_PATH . 'templates/';
        endif;        
        
        $template = $template_path . $template_name;
        if ( ! file_exists( $template ) ) :
            return new WP_Error( 
                'error', 
                sprintf( 
                    __( '%s does not exist.', 'user-wise-mail-disable' ), 
                    '<code>' . $template . '</code>' 
                ) 
            );
        endif;

        do_action( 'uwed_before_template_part', $template, $args, $template_path );

        if ( ! empty( $args ) && is_array( $args ) ) :
            extract( $args );
        endif;
        include $template;

        do_action( 'uwed_after_template_part', $template, $args, $template_path );
    }
endif;

?>