<?php

namespace Give\PaymentGateways\Gateways\Stripe\Traits;

trait SEPAMandateForm
{
    use FormFieldMarkup;

    public function getMandateFormHTML(int $form_id, array $args): string
    {
        ob_start();

<<<<<<< HEAD
        $id_prefix = ! empty($args['id_prefix']) ? $args['id_prefix'] : '';
=======
        $id_prefix = !empty($args['id_prefix']) ? $args['id_prefix'] : '';
>>>>>>> fb785cbb (Initial commit)

        do_action('give_before_cc_fields', $form_id); ?>

        <fieldset id="give_cc_fields" class="give-do-validate">
            <legend>
<<<<<<< HEAD
                <?php
                esc_attr_e('IBAN Info', 'give'); ?>
=======
                <?php esc_attr_e('IBAN Info', 'give'); ?>
>>>>>>> fb785cbb (Initial commit)
            </legend>

            <?php
            if (is_ssl()) {
                ?>
                <div id="give_secure_site_wrapper">
                    <span class="give-icon padlock"></span>
<<<<<<< HEAD
                    <span><?php
                        esc_attr_e('This is a secure SSL encrypted payment.', 'give'); ?></span>
=======
                    <span><?php esc_attr_e('This is a secure SSL encrypted payment.', 'give'); ?></span>
>>>>>>> fb785cbb (Initial commit)
                </div>
                <?php
            }

            if ($this->canShowFields()) {
                ?>
                <div id="give-iban-number-wrap" class="form-row form-row-responsive give-stripe-cc-field-wrap">
<<<<<<< HEAD
                    <label for="give-iban-number-field-<?php
                    echo $id_prefix; ?>" class="give-label">
                        <?php
                        echo __('IBAN', 'give'); ?>
                        <span class="give-required-indicator">*</span>
                        <span class="give-tooltip give-icon give-icon-question" data-tooltip="<?php
                        esc_attr_e(
=======
                    <label for="give-iban-number-field-<?php echo $id_prefix; ?>" class="give-label">
                        <?php echo __('IBAN', 'give'); ?>
                        <span class="give-required-indicator">*</span>
                        <span class="give-tooltip give-icon give-icon-question" data-tooltip="<?php esc_attr_e(
>>>>>>> fb785cbb (Initial commit)
                            'The (typically) 16 digits on the front of your credit card.',
                            'give'
                        ); ?>"></span>
                    </label>
                    <div
<<<<<<< HEAD
                        id="give-stripe-sepa-fields-<?php
                        echo $id_prefix; ?>"
                        class="give-stripe-sepa-iban-field give-stripe-cc-field"
                        data-hide_icon="<?php
                        echo give_stripe_hide_iban_icon($form_id); ?>"
                        data-icon_style="<?php
                        echo give_stripe_get_iban_icon_style($form_id); ?>"
                        data-placeholder_country="<?php
                        echo give_stripe_get_iban_placeholder_country(); ?>"
=======
                        id="give-stripe-sepa-fields-<?php echo $id_prefix; ?>"
                        class="give-stripe-sepa-iban-field give-stripe-cc-field"
                        data-hide_icon="<?php echo give_stripe_hide_iban_icon($form_id); ?>"
                        data-icon_style="<?php echo give_stripe_get_iban_icon_style($form_id); ?>"
                        data-placeholder_country="<?php echo give_stripe_get_iban_placeholder_country(); ?>"
>>>>>>> fb785cbb (Initial commit)
                    ></div>
                </div>
                <div class="form-row form-row-responsive give-stripe-sepa-mandate-acceptance-text">
                    <?php
                    if (give_is_setting_enabled(give_get_option('stripe_mandate_acceptance_option', 'enabled'))) {
                        echo give_stripe_get_mandate_acceptance_text();
                    }
                    ?>
                </div>
                <?php
                /**
                 * This action hook is used to display content after the Credit Card expiration field.
                 *
                 * Note: Kept this hook as it is.
                 *
                 * @since 2.5.0
                 *
<<<<<<< HEAD
                 * @param int   $form_id Donation Form ID.
                 * @param array $args    List of additional arguments.
=======
                 * @param array $args List of additional arguments.
                 *
                 * @param int $form_id Donation Form ID.
>>>>>>> fb785cbb (Initial commit)
                 */
                do_action('give_after_cc_expiration', $form_id, $args);

                /**
                 * This action hook is used to display content after the Credit Card expiration field.
                 *
                 * @since 2.5.0
                 *
<<<<<<< HEAD
                 * @param int   $form_id Donation Form ID.
                 * @param array $args    List of additional arguments.
=======
                 * @param array $args List of additional arguments.
                 *
                 * @param int $form_id Donation Form ID.
>>>>>>> fb785cbb (Initial commit)
                 */
                do_action('give_stripe_after_cc_expiration', $form_id, $args);
            }
            ?>
        </fieldset>
        <?php
        // Remove Address Fields if user has option enabled.
        $billing_fields_enabled = give_get_option('stripe_collect_billing');
<<<<<<< HEAD
        if ( ! $billing_fields_enabled) {
=======
        if (!$billing_fields_enabled) {
>>>>>>> fb785cbb (Initial commit)
            remove_action('give_after_cc_fields', 'give_default_cc_address_fields');
        }

        do_action('give_after_cc_fields', $form_id, $args);

        return ob_get_clean();
    }
}
