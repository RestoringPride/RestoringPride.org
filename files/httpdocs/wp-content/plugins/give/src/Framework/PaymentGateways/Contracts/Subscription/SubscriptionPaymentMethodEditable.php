<?php

namespace Give\Framework\PaymentGateways\Contracts\Subscription;

use Give\Subscriptions\Models\Subscription;

/**
 * @since 2.20.0
 */
interface SubscriptionPaymentMethodEditable
{
    /**
     * Update subscription payment method.
     *
     *
     * @since 2.21.2 Second parameter has been made required.
<<<<<<< HEAD
     *             For example a developer can use "givewp_donor_dashboard_edit_subscription_payment_method_gateway_data_{$gateway->getId()}" filter
=======
     *             For example a developer can use "givewp_edit_{$gateway->getId()}_gateway_subscription_payment_method_from_donor_dashboard" filter
>>>>>>> fb785cbb (Initial commit)
     *             To provide payment method request data to gateway before updating payment method (filter is in recurring donations  add-on).
     * @since 2.20.0
     */
    public function updateSubscriptionPaymentMethod(Subscription $subscription, $gatewayData);
}
