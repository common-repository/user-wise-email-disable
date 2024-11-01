<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo esc_html__('User Wise Email Disable Settings', 'user-wise-mail-disable'); ?></h1>
    <form name="uwed__form" method="post">
        <div class="uwed__main-block">
            <?php wp_nonce_field( 'uwed_nonce_check', 'uwed_nonce_check' ); ?>
            <div class="uwed__col-50">
                <div class="uwed__first-col uwed__col-inn">
                    <h2 class="title uwed-mr-10"><?php echo esc_html__('Enable mail for the below users', 'user-wise-mail-disable'); ?></h2>
                    <div class="uwed__col-inner uwed-main-sortable uwed__sortable-col uwed__drag-show">
                        <?php
                        if( !empty($uwed_users) ):
                            foreach ( $uwed_users as $user ) {
                                echo sprintf(
                                    '<label for="user-%d" id="userid-%d" class="uwed__label-for"><input type="hidden" name="" value="%d">%s</label>',
                                    esc_attr( $user->ID ),
                                    esc_attr( $user->ID ),
                                    esc_attr( $user->ID ),
                                    esc_html( $user->display_name ),
                                );
                            }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="uwed__col-50">
                <div class="uwed__second-col uwed__col-inn">
                    <h2 class="title"><?php echo esc_html__('Disable mail for the below users', 'user-wise-mail-disable'); ?></h2>
                    <div class="uwed__col-inner uwed-list-sortable uwed__sortable-col uwed__drag-drop">
                        <?php
                        if( !empty($uwed_checked_users) ):
                            foreach ( $uwed_checked_users as $user_val ) {
                                $user = get_user_by( 'id', $user_val );
                                echo sprintf(
                                    '<label for="user-%d" id="userid-%d" class="uwed__label-for" data-fieldname="uwed__list_user[]"><input type="hidden" name="uwed__list_user[]" value="%d">%s</label>',
                                    esc_attr( $user->ID ),
                                    esc_attr( $user->ID ),
                                    esc_attr( $user->ID ),
                                    esc_html( $user->display_name ),
                                );
                            }
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo esc_html__('Save Settings', 'user-wise-mail-disable'); ?>">
        </p>
    </form>
    <div class="clear"></div>
</div>
<div class="clear"></div>