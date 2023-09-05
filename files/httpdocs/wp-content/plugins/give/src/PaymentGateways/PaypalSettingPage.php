<?php

namespace Give\PaymentGateways;

use Give\PaymentGateways\Gateways\PayPalStandard\PayPalStandard;
use Give\PaymentGateways\PayPalCommerce\AdminSettingFields;
use Give\PaymentGateways\PayPalCommerce\PayPalCommerce;

use function give_get_current_setting_section as getCurrentSettingSection;

/**
 * Class PaypalSettingSection
 * @package Give\PaymentGateways
 *
 * @sicne 2.9.0
 */
class PaypalSettingPage implements SettingPage
{
    /**
     * @var PayPalCommerce
     */
    private $payPalCommerce;

    /**
     * @var PayPalStandard
     */
    private $paypalStandard;

    /**
     * Register properties
     *
     * @since 2.9.0
     *
     * @param PayPalStandard $paypalStandard
     *
     * @param PayPalCommerce $payPalCommerce
     */
    public function __construct(PayPalCommerce $payPalCommerce, PayPalStandard $paypalStandard)
    {
        $this->payPalCommerce = $payPalCommerce;
        $this->paypalStandard = $paypalStandard;
    }

    /**
     * @inheritDoc
     */
    public function boot()
    {
        add_action('give_get_groups_paypal', [$this, 'getGroups']);
        add_filter('give_get_settings_gateways', [$this, 'registerPaypalSettings']);
        add_filter('give_get_sections_gateways', [$this, 'registerPaypalSettingSection'], 5);

        // Load custom setting fields.
        /* @var AdminSettingFields $adminSettingFields */
        $adminSettingFields = give(AdminSettingFields::class);
        $adminSettingFields->boot();
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return 'paypal';
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return esc_html__('PayPal', 'give');
    }

    /**
     * @inheritDoc
     */
    public function getSettings()
    {
<<<<<<< HEAD
        $settings[$this->payPalCommerce::id()] = $this->payPalCommerce->getOptions();
        $settings[$this->paypalStandard::id()] = $this->paypalStandard->getOptions();
=======
        $settings[$this->payPalCommerce->getId()] = $this->payPalCommerce->getOptions();
        $settings[$this->paypalStandard->getId()] = $this->paypalStandard->getOptions();
>>>>>>> fb785cbb (Initial commit)

        return $settings;
    }

    /**
     * Get groups.
     *
     * @since 2.9.0
     *
     * @return array
     */
    public function getGroups()
    {
        return [
<<<<<<< HEAD
            $this->payPalCommerce::id() => $this->payPalCommerce->getName(),
            $this->paypalStandard::id() => $this->paypalStandard->getName(),
=======
            $this->payPalCommerce->getId() => $this->payPalCommerce->getName(),
            $this->paypalStandard->getId() => $this->paypalStandard->getName(),
>>>>>>> fb785cbb (Initial commit)
        ];
    }

    /**
     * Register settings.
     *
     * @since 2.9.0
     *
     * @param array $settings
     *
     * @return array
     */
    public function registerPaypalSettings($settings)
    {
        $currentSection = getCurrentSettingSection();

        if ($currentSection === $this->getId()) {
            $settings = $this->getSettings();
        }

        return $settings;
    }

    /**
     * Register setting section.
     *
     * @since 2.9.0
     *
     * @param array $sections
     *
     * @return array
     */
    public function registerPaypalSettingSection($sections)
    {
        $sections[$this->getId()] = $this->getName();

        return $sections;
    }
}
