<?php
<<<<<<< HEAD

namespace Give\Framework\PaymentGateways\Commands;

/***
 * @since 2.18.0
 */
class SubscriptionComplete implements GatewayCommand
{
=======
namespace Give\Framework\PaymentGateways\Commands;
/***
 * @since 2.18.0
 */
class SubscriptionComplete implements GatewayCommand {
>>>>>>> fb785cbb (Initial commit)
    /**
     * The Gateway Transaction / Charge Record ID
     *
     * @var string
     */
    public $gatewayTransactionId;
    /**
     * The Gateway Subscription Record ID
     *
     * @var string
     */
    public $gatewaySubscriptionId;

    /**
     * @since 2.18.0
     */
    public function __construct(string $gatewayTransactionId, string $gatewaySubscriptionId)
    {
        $this->gatewayTransactionId = $gatewayTransactionId;
        $this->gatewaySubscriptionId = $gatewaySubscriptionId;
    }
}
