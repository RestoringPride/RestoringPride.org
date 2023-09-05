<?php

namespace Give\Framework\PaymentGateways\Commands;

/***
 * @since 2.18.0
 */
abstract class PaymentCommand implements GatewayCommand
{
    /**
     * The Gateway Transaction / Charge Record ID
     *
     * @var string|null
     */
    public $gatewayTransactionId;

    /**
     * Notes to be added to the payment.
     *
     * @var array|string[]
     */
    public $paymentNotes = [];

    /**
<<<<<<< HEAD
     * @param string|null $gatewayTransactionId
     *
=======
     * @param  string|null  $gatewayTransactionId
>>>>>>> fb785cbb (Initial commit)
     * @return static
     */
    public static function make(string $gatewayTransactionId = null): PaymentCommand
    {
        return new static($gatewayTransactionId);
    }

    /**
<<<<<<< HEAD
     * @since      2.18.0
     * @since 2.23.1 Make constructor final to avoid unsafe usage of `new static()`.
     *
     * @param string|null $gatewayTransactionId
     */
    final public function __construct(string $gatewayTransactionId = null)
=======
     * @since 2.18.0
     *
     * @param  string|null  $gatewayTransactionId
     */
    public function __construct(string $gatewayTransactionId = null)
>>>>>>> fb785cbb (Initial commit)
    {
        $this->gatewayTransactionId = $gatewayTransactionId;
    }

    /**
<<<<<<< HEAD
     * @since 2.22.0 add type, so it is typesafe
     *
     * @param string|string[] ...$paymentNotes
     *
     * @return $this
     */
    public function setPaymentNotes(string ...$paymentNotes): PaymentCommand
=======
     * @param  string|string[]  ...$paymentNotes
     * @return $this
     */
    public function setPaymentNotes(...$paymentNotes): PaymentCommand
>>>>>>> fb785cbb (Initial commit)
    {
        $this->paymentNotes = $paymentNotes;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @param string $gatewayTransactionId
     *
=======
     * @param  string  $gatewayTransactionId
>>>>>>> fb785cbb (Initial commit)
     * @return $this
     */
    public function setTransactionId(string $gatewayTransactionId): PaymentCommand
    {
        $this->gatewayTransactionId = $gatewayTransactionId;
<<<<<<< HEAD

=======
        
>>>>>>> fb785cbb (Initial commit)
        return $this;
    }
}
