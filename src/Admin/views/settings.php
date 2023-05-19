<div class="dpgw-settings-wrap">
    <div class="dpgw-settings-content">
        <div class="dpgw-settings-form-wrapper">
            <form method="post" id="dpgw-settings-form" action="options.php" novalidate="novalidate">
                <?php do_settings_fields( $this->_optionGroup, 'default' ); ?>
                <?php do_settings_sections( $this->_optionGroup, 'default' ); ?>
                <?php submit_button('Save Settings', 'btn-settings dpgw-settings-button'); ?>
            </form>
        </div>
    </div>
</div>