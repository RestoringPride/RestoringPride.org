<?php

namespace Give\PaymentGateways\Stripe\DataTransferObjects;

/**
 * Class GetStripeAccountDetailsDto
 * @package Give\PaymentGateways\Stripe\DataTransferObjects
 *
<<<<<<< HEAD
 * @since   2.13.0
 */
final class GetStripeAccountDetailsDto
=======
 * @since 2.13.0
 */
class GetStripeAccountDetailsDto
>>>>>>> fb785cbb (Initial commit)
{
    /**
     * @var string
     */
    public $accountSlug;

    /**
     * @since 2.13.0
     *
     * @param array $array
     *
     * @return self
     */
    public static function fromArray($array)
    {
        $self = new static();

        $self->accountSlug = ! empty($array['account_slug']) ? $array['account_slug'] : '';

        return $self;
    }
}
