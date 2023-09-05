<?php

namespace Give\Subscriptions\DataTransferObjects;

use DateTime;
use Give\Framework\Support\Facades\DateTime\Temporal;
use Give\Framework\Support\ValueObjects\Money;
use Give\Subscriptions\Models\Subscription;
<<<<<<< HEAD
use Give\Subscriptions\ValueObjects\SubscriptionMode;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Subscriptions\ValueObjects\SubscriptionPeriod;
use Give\Subscriptions\ValueObjects\SubscriptionStatus;

/**
 * Class SubscriptionObjectData
 *
 * @since 2.19.6
 */
<<<<<<< HEAD
final class SubscriptionQueryData
=======
class SubscriptionQueryData
>>>>>>> fb785cbb (Initial commit)
{
    /**
     * @var int
     */
    public $id;
    /**
     * @var DateTime
     */
    public $createdAt;
    /**
     * @var DateTime
     */
<<<<<<< HEAD
    public $renewsAt;
=======
    public $expiresAt;
>>>>>>> fb785cbb (Initial commit)
    /**
     * @var string
     */
    public $status;
    /**
     * @var int
     */
    public $donorId;
    /**
     * @var SubscriptionPeriod
     */
    public $period;
    /**
     * @var string
     */
    public $frequency;
    /**
     * @var int
     */
    public $installments;
    /**
     * @var string
     */
    public $transactionId;
    /**
<<<<<<< HEAD
     * @var SubscriptionMode
     */
    public $mode;
    /**
=======
>>>>>>> fb785cbb (Initial commit)
     * @var Money
     */
    public $amount;
    /**
     * @var Money
     */
    public $feeAmountRecovered;
    /**
     * @var string
     */
    public $gatewayId;
    /**
     * @var string
     */
    public $gatewaySubscriptionId;
    /**
     * @var int
     */
    public $donationFormId;

    /**
     * Convert data from Subscription Object to Subscription Model
     *
     * @since 2.19.6
<<<<<<< HEAD
     */
    public static function fromObject($subscriptionQueryObject): self
=======
     *
     * @return self
     */
    public static function fromObject($subscriptionQueryObject)
>>>>>>> fb785cbb (Initial commit)
    {
        $self = new static();

        $self->id = (int)$subscriptionQueryObject->id;
        $self->createdAt = Temporal::toDateTime($subscriptionQueryObject->createdAt);
<<<<<<< HEAD
        $self->renewsAt = isset($subscriptionQueryObject->renewsAt) ? Temporal::toDateTime(
            $subscriptionQueryObject->renewsAt
=======
        $self->expiresAt = isset($subscriptionQueryObject->expiration) ? Temporal::toDateTime(
            $subscriptionQueryObject->expiration
>>>>>>> fb785cbb (Initial commit)
        ) : null;
        $self->donorId = (int)$subscriptionQueryObject->donorId;
        $self->period = new SubscriptionPeriod($subscriptionQueryObject->period);
        $self->frequency = (int)$subscriptionQueryObject->frequency;
        $self->installments = (int)$subscriptionQueryObject->installments;
        $self->transactionId = $subscriptionQueryObject->transactionId;
<<<<<<< HEAD
        $self->mode = new SubscriptionMode($subscriptionQueryObject->mode);
        $self->amount = Money::fromDecimal($subscriptionQueryObject->amount, $subscriptionQueryObject->currency ?? give_get_currency());
        $self->feeAmountRecovered = Money::fromDecimal($subscriptionQueryObject->feeAmount,
            $subscriptionQueryObject->currency ?? give_get_currency());
=======
        $self->amount = Money::fromDecimal($subscriptionQueryObject->amount, $subscriptionQueryObject->currency);
        $self->feeAmountRecovered = Money::fromDecimal($subscriptionQueryObject->feeAmount, $subscriptionQueryObject->currency);
>>>>>>> fb785cbb (Initial commit)
        $self->status = new SubscriptionStatus($subscriptionQueryObject->status);
        $self->gatewayId = $subscriptionQueryObject->gatewayId;
        $self->gatewaySubscriptionId = $subscriptionQueryObject->gatewaySubscriptionId;
        $self->donationFormId = (int)$subscriptionQueryObject->donationFormId;

        return $self;
    }

    /**
     * Convert DTO to Subscription
<<<<<<< HEAD
     */
    public function toSubscription(): Subscription
=======
     *
     * @return Subscription
     */
    public function toSubscription()
>>>>>>> fb785cbb (Initial commit)
    {
        $attributes = get_object_vars($this);

        return new Subscription($attributes);
    }
}
