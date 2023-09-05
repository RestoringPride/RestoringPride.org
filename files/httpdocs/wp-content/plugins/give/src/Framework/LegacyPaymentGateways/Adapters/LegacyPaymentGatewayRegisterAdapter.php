<?php

namespace Give\Framework\LegacyPaymentGateways\Adapters;

use Give\Framework\PaymentGateways\Contracts\PaymentGatewayInterface;
use Give\LegacyPaymentGateways\Adapters\LegacyPaymentGatewayAdapter;

<<<<<<< HEAD
use function method_exists;

=======
>>>>>>> fb785cbb (Initial commit)
class LegacyPaymentGatewayRegisterAdapter
{
    /**
     * Run the necessary legacy hooks on our LegacyPaymentGatewayAdapter
     * that prepares data to be sent to each gateway
     *
     * @since 2.19.0
<<<<<<< HEAD
     */
    public function connectGatewayToLegacyPaymentGatewayAdapter(string $gatewayClass)
=======
     *
     * @param string $gatewayClass
     */
    public function connectGatewayToLegacyPaymentGatewayAdapter($gatewayClass)
>>>>>>> fb785cbb (Initial commit)
    {
        /** @var LegacyPaymentGatewayAdapter $legacyPaymentGatewayAdapter */
        $legacyPaymentGatewayAdapter = give(LegacyPaymentGatewayAdapter::class);

        /** @var PaymentGatewayInterface $registeredGateway */
        $registeredGateway = give($gatewayClass);
<<<<<<< HEAD
        $registeredGatewayId = $registeredGateway::id();
=======
        $registeredGatewayId = $registeredGateway->getId();
>>>>>>> fb785cbb (Initial commit)

        add_action(
            "give_{$registeredGatewayId}_cc_form",
            static function ($formId, $args) use ($registeredGateway, $legacyPaymentGatewayAdapter) {
                echo $legacyPaymentGatewayAdapter->getLegacyFormFieldMarkup($formId, $args, $registeredGateway);
            },
            10,
            2
        );

        add_action(
            "give_gateway_{$registeredGatewayId}",
            static function ($legacyPaymentData) use ($registeredGateway, $legacyPaymentGatewayAdapter) {
<<<<<<< HEAD
                $legacyPaymentGatewayAdapter->handleBeforeGateway(give_clean($legacyPaymentData), $registeredGateway);
=======
                $legacyPaymentGatewayAdapter->handleBeforeGateway($legacyPaymentData, $registeredGateway);
>>>>>>> fb785cbb (Initial commit)
            }
        );
    }

    /**
     * Adds new payment gateways to legacy list for settings
     *
<<<<<<< HEAD
     * @since 2.25.0 add is_visible key to $gatewayData
     * @since 2.19.0
     */
    public function addNewPaymentGatewaysToLegacyListSettings(array $gatewaysData, array $newPaymentGateways): array
=======
     * @since 2.19.0
     *
     * @param array $gatewaysData
     * @param array $newPaymentGateways
     *
     * @return array
     */
    public function addNewPaymentGatewaysToLegacyListSettings($gatewaysData, $newPaymentGateways)
>>>>>>> fb785cbb (Initial commit)
    {
        foreach ($newPaymentGateways as $gatewayClassName) {
            /* @var PaymentGatewayInterface $paymentGateway */
            $paymentGateway = give($gatewayClassName);

<<<<<<< HEAD
            $gatewaysData[$paymentGateway::id()] = [
                'admin_label' => $paymentGateway->getName(),
                'checkout_label' => $paymentGateway->getPaymentMethodLabel(),
                'is_visible' => $this->supportsLegacyForm($paymentGateway),
=======
            $gatewaysData[$paymentGateway->getId()] = [
                'admin_label' => $paymentGateway->getName(),
                'checkout_label' => $paymentGateway->getPaymentMethodLabel(),
>>>>>>> fb785cbb (Initial commit)
            ];
        }

        return $gatewaysData;
    }
<<<<<<< HEAD

    /**
     * @since 2.25.0
     */
    public function supportsLegacyForm(PaymentGatewayInterface $gateway): bool
    {
        return method_exists($gateway, 'supportsLegacyForm') ? $gateway->supportsLegacyForm() : true;
    }
=======
>>>>>>> fb785cbb (Initial commit)
}
