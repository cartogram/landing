<div class="wrap">

    <div id="icon-options-general" class="icon32"><br /></div>
    <h2><?php _e('Cartogram - General', 'cartogram'); ?></h2>


    <?php
        $cartogram_general_updated = false;

        if ( !empty( $_POST ) && wp_verify_nonce( $_POST['cartogram_general_key'], 'cartogram_update_general' ) )
        {
	
			$cartogram_general['header']=$_POST['cartogram-general-header'];
			$cartogram_general['footer']=$_POST['cartogram-general-footer'];
            $cartogram_general['description']=$_POST['cartogram-general-description'];
			$cartogram_general['devmode']=$_POST['cartogram-general-devmode'];
	
            update_option( '_cartogram_general', $cartogram_general );

            $cartogram_general_updated = true;

        }


        // we need to pull our existing sections, if present
        $cartogram_general = get_option( '_cartogram_general' );

        // if there's nothing, we'll set our defaults
        if( empty( $cartogram_general ) )
        {
            $cartogram_general[] = array(
                                        'header'      		=> '',
                                        'footer'            => '',
                                        'description'       => '',
										'devmode'			=> ''
            );
        }

    ?>

    <?php if( $cartogram_general_updated) : ?>
        <div class="message updated">
            <p><strong>Cartogram</strong> general settings updated.</p>
        </div>
        <!-- /message -->
    <?php endif ?>

    <h3><?php _e('General Settings', 'cartogram'); ?></h3>

    <form action="" method="post">

        <?php wp_nonce_field( 'cartogram_update_general', 'cartogram_general_key' ); ?>

        <div id="cartogram-general">
                <div>
                    <label for="cartogram-general-description"><?php _e('Description', 'cartogram'); ?></label>
                    <textarea name="cartogram-general-description"><?php echo stripslashes($cartogram_general['description']); ?></textarea>
                </div>
				<div>
                	<label for="cartogram-general-header"><?php _e('Custom Header Code', 'cartogram'); ?></label>
                	<textarea name="cartogram-general-header"><?php echo stripslashes($cartogram_general['header']); ?></textarea>
				</div>
				<div>
					<label for="cartogram-general-footer"><?php _e('Custom Footer Code', 'cartogram'); ?></label>
                	<textarea name="cartogram-general-footer"><?php echo stripslashes($cartogram_general['footer']); ?></textarea>
				</div>
				<div>
					<input type="checkbox" name="cartogram-general-devmode" value="devmode" <?php if($cartogram_general['devmode']): ?> checked="checked" <?php endif; ?> /> <label for="cartogram-general-devmode"><?php _e('Developer Mode', 'cartogramstreet'); ?></label>
				</div>
        </div>

        <div id="cartogram-save">
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save', 'cartogram'); ?>" />
            </p>
        </div>

    </form>

</div>