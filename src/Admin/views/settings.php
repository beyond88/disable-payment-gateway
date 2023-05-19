<?php 
	settings_errors(); 
	$setting_options = wp_parse_args( get_option( $this->_optionName ), $this->_defaultOptions );
?>
<div class="dpgw-settings-wrap">
    <div class="dpgw-settings-content">
        <div class="wrap woocommerce">
            <form method="post" id="dpgw-settings-form" action="options.php" novalidate="novalidate">
                <?php settings_fields( $this->_optionGroup ); ?>
                <table class="form-table">
                    <tbody>
                        <tr valign="top">
                            <th scope="row" class="titledesc">
                                <label for="woocommerce_store_address">
                                    <?php echo __('Product type', 'disable-payment-gateway'); ?>
                                </label>
                            </th>
                            <td class="forminp forminp-text">
                                <?php if ( ! empty( $product_types ) ) : ?>
                                    <select name="dpgw_settings[product_type]" id="product_type" class="">
                                        <?php foreach( $product_types as $type_id => $type_name ): ?>
                                            <?php
                                                $selected = '';
                                                if( isset( $type_id ) ) :
                                                    if( $settings['product_type'] == $type_id ) :
                                                        $selected ='selected';
                                                    endif;
                                                endif; 
                                            ?>
                                            <option value="<?php echo esc_attr( $type_id ); ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr( $type_name ); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <p>
                                        <?php echo __('No product types found.', 'disable-payment-gateway'); ?>
                                    </p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row" class="titledesc">
                                <label for="woocommerce_store_address">
                                    <?php echo __('Payment gateway', 'disable-payment-gateway'); ?>
                                </label>
                            </th>
                            <td class="forminp forminp-text">
                                <?php if (!empty($payment_methods)): ?>
                                    <select name="dpgw_settings[payment_gateway]" id="payment_gateway" class="">
                                        <?php foreach ( $payment_methods as $method ): ?>
                                            <?php
                                                $pselected = '';
                                                $method_id = $method->id;
                                                if( isset( $method_id ) ) :
                                                    if( $settings['payment_gateway'] == $method_id ) :
                                                        $pselected ='selected';
                                                    endif;
                                                endif; 
                                            ?>
                                            <option value="<?php echo esc_attr($method_id); ?>" <?php echo esc_attr($pselected); ?>><?php echo esc_html($method->get_title()); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php else: ?>
                                    <p>
                                        <?php echo __('No payment methods found.', 'disable-payment-gateway'); ?>
                                    </p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php do_settings_fields( $this->_optionGroup, 'default' ); ?>
                <?php do_settings_sections( $this->_optionGroup, 'default' ); ?>
                <?php submit_button('Save Settings', 'btn-settings dpgw-settings-button'); ?>
            </form>
        </div>
    </div>
</div>