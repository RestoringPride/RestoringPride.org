<?php

namespace Give\Donations\LegacyListeners;

use Give\Donations\Models\Donation;
use Give\Helpers\Hooks;
use Give\PaymentGateways\DataTransferObjects\GiveInsertPaymentData;

class DispatchGiveInsertPayment
{
    /**
<<<<<<< HEAD
     * @since 2.22.3 Use $donor->userId instead of $donor->id on the userInfo key
     * @since      2.20.0 only run this listener if the legacy hook is used
     * @since      2.19.6
=======
     * @since 2.20.0 only run this listener if the legacy hook is used
     * @since 2.19.6
>>>>>>> fb785cbb (Initial commit)
     *
     * @param Donation $donation
     *
     * @return void
     */
    public function __invoke(Donation $donation)
    {
        if (!has_action('give_insert_payment')) {
            return;
        }

        $donor = $donation->donor;

        $giveInsertPaymentData = GiveInsertPaymentData::fromArray([
            'price' => $donation->amount->formatToDecimal(),
            'formTitle' => $donation->formTitle,
            'formId' => $donation->formId,
            'priceId' => give_get_price_id($donation->formId, $donation->amount->formatToDecimal()),
            'date' => $donation->createdAt,
            'donorEmail' => $donor->email,
            'purchaseKey' => $donation->purchaseKey,
            'currency' => $donation->amount->getCurrency()->getCode(),
            'paymentGateway' => $donation->gatewayId,
<<<<<<< HEAD
            'donorId' => $donation->donorId,
            'userInfo' => [
                'id' => $donor->userId,
=======
            'userInfo' => [
                'id' => $donor->id,
>>>>>>> fb785cbb (Initial commit)
                'firstName' => $donor->firstName,
                'lastName' => $donor->lastName,
                'title' => $donor->prefix,
                'email' => $donor->email,
<<<<<<< HEAD
                'address' => $donation->billingAddress,
=======
>>>>>>> fb785cbb (Initial commit)
            ],
        ]);

        /**
         * @deprecated
         */
        Hooks::doAction('give_insert_payment', $donation->id, $giveInsertPaymentData->toArray());
    }
}
