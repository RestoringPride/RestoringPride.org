<?php

namespace Give\Donations\DataTransferObjects;

use DateTime;
use Give\Donations\Models\Donation;
use Give\Donations\Properties\BillingAddress;
use Give\Donations\ValueObjects\DonationMetaKeys;
use Give\Donations\ValueObjects\DonationMode;
use Give\Donations\ValueObjects\DonationStatus;
<<<<<<< HEAD
use Give\Donations\ValueObjects\DonationType;
=======
>>>>>>> fb785cbb (Initial commit)
use Give\Framework\Support\Facades\DateTime\Temporal;
use Give\Framework\Support\ValueObjects\Money;

/**
 * Class DonationData
 *
<<<<<<< HEAD
 * @since 2.23.0 remove parentId property
 * @since 2.19.6
 */
final class DonationQueryData
=======
 * @since 2.19.6
 */
class DonationQueryData
>>>>>>> fb785cbb (Initial commit)
{
    /**
     * @var Money
     */
    public $amount;
    /**
     * @var string
     */
    public $exchangeRate;
    /**
     * @var Money
     */
    public $feeAmountRecovered;
    /**
     * @var int
     */
    public $donorId;
    /**
     * @var string
     */
    public $firstName;
    /**
     * @var string
     */
    public $lastName;
    /**
     * @var string
     */
    public $email;
    /**
     * @var int
     */
    public $id;
    /**
     * @var DonationStatus
     */
    public $status;
    /**
     * @var int
     */
<<<<<<< HEAD
=======
    public $parentId;
    /**
     * @var int
     */
>>>>>>> fb785cbb (Initial commit)
    public $subscriptionId;
    /**
     * @var DateTime
     */
    public $updatedAt;
    /**
     * @var DateTime
     */
    public $createdAt;
    /**
     * @var string
     */
    public $gatewayId;
    /**
     * @var DonationMode
     */
    public $mode;
    /**
<<<<<<< HEAD
     * @var DonationType
     */
    public $type;
    /**
=======
>>>>>>> fb785cbb (Initial commit)
     * @var int
     */
    public $formId;
    /**
     * @var BillingAddress
     */
    public $billingAddress;
    /**
     * @var string
     */
    public $formTitle;
    /**
     * @var string
     */
    public $purchaseKey;
    /**
     * @var string
     */
    public $donorIp;
    /**
     * @var bool
     */
    public $anonymous;
    /**
     * @var int
     */
    public $levelId;
    /**
     * @var string
     */
    public $gatewayTransactionId;
<<<<<<< HEAD
    /**
     * @var string|null
     */
    public $company;
=======
>>>>>>> fb785cbb (Initial commit)

    /**
     * Convert data from object to Donation
     *
<<<<<<< HEAD
     * @since 2.23.0 remove parentId property
     * @since 2.22.0 add support for company field
=======
>>>>>>> fb785cbb (Initial commit)
     * @since 2.20.0 update for new amount property, fee amount recovered, and exchange rate
     * @since 2.19.6
     *
     * @param object $donationQueryObject
     *
     * @return self
     */
<<<<<<< HEAD
    public static function fromObject($donationQueryObject): self
=======
    public static function fromObject($donationQueryObject)
>>>>>>> fb785cbb (Initial commit)
    {
        $self = new static();

        $currency = $donationQueryObject->{DonationMetaKeys::CURRENCY()->getKeyAsCamelCase()};
        $feeAmountRecovered = $donationQueryObject->{DonationMetaKeys::FEE_AMOUNT_RECOVERED()->getKeyAsCamelCase()};

        $self->id = (int)$donationQueryObject->id;
        $self->formId = (int)$donationQueryObject->{DonationMetaKeys::FORM_ID()->getKeyAsCamelCase()};
        $self->formTitle = $donationQueryObject->{DonationMetaKeys::FORM_TITLE()->getKeyAsCamelCase()};
<<<<<<< HEAD
        $self->amount = Money::fromDecimal(
            $donationQueryObject->{DonationMetaKeys::AMOUNT()->getKeyAsCamelCase()},
            $currency
        );
=======
        $self->amount = Money::fromDecimal($donationQueryObject->{DonationMetaKeys::AMOUNT()->getKeyAsCamelCase()}, $currency);
>>>>>>> fb785cbb (Initial commit)
        $self->feeAmountRecovered = $feeAmountRecovered ? Money::fromDecimal($feeAmountRecovered, $currency) : null;
        $self->exchangeRate = $donationQueryObject->{DonationMetaKeys::EXCHANGE_RATE()->getKeyAsCamelCase()};
        $self->donorId = (int)$donationQueryObject->{DonationMetaKeys::DONOR_ID()->getKeyAsCamelCase()};
        $self->firstName = $donationQueryObject->{DonationMetaKeys::FIRST_NAME()->getKeyAsCamelCase()};
        $self->lastName = $donationQueryObject->{DonationMetaKeys::LAST_NAME()->getKeyAsCamelCase()};
        $self->email = $donationQueryObject->{DonationMetaKeys::EMAIL()->getKeyAsCamelCase()};
        $self->gatewayId = $donationQueryObject->{DonationMetaKeys::GATEWAY()->getKeyAsCamelCase()};
        $self->createdAt = Temporal::toDateTime($donationQueryObject->createdAt);
        $self->updatedAt = Temporal::toDateTime($donationQueryObject->updatedAt);
        $self->status = new DonationStatus($donationQueryObject->status);
<<<<<<< HEAD
=======
        $self->parentId = (int)$donationQueryObject->parentId;
>>>>>>> fb785cbb (Initial commit)
        $self->subscriptionId = (int)$donationQueryObject->{DonationMetaKeys::SUBSCRIPTION_ID()->getKeyAsCamelCase()};
        $self->mode = new DonationMode($donationQueryObject->{DonationMetaKeys::MODE()->getKeyAsCamelCase()});
        $self->billingAddress = BillingAddress::fromArray([
            'country' => $donationQueryObject->{DonationMetaKeys::BILLING_COUNTRY()->getKeyAsCamelCase()},
            'city' => $donationQueryObject->{DonationMetaKeys::BILLING_CITY()->getKeyAsCamelCase()},
            'state' => $donationQueryObject->{DonationMetaKeys::BILLING_STATE()->getKeyAsCamelCase()},
            'zip' => $donationQueryObject->{DonationMetaKeys::BILLING_ZIP()->getKeyAsCamelCase()},
            'address1' => $donationQueryObject->{DonationMetaKeys::BILLING_ADDRESS1()->getKeyAsCamelCase()},
            'address2' => $donationQueryObject->{DonationMetaKeys::BILLING_ADDRESS2()->getKeyAsCamelCase()},
        ]);
        $self->purchaseKey = $donationQueryObject->{DonationMetaKeys::PURCHASE_KEY()->getKeyAsCamelCase()};
        $self->donorIp = $donationQueryObject->{DonationMetaKeys::DONOR_IP()->getKeyAsCamelCase()};
        $self->anonymous = (bool)$donationQueryObject->{DonationMetaKeys::ANONYMOUS()->getKeyAsCamelCase()};
        $self->levelId = (string)$donationQueryObject->{DonationMetaKeys::LEVEL_ID()->getKeyAsCamelCase()};
        $self->gatewayTransactionId = $donationQueryObject->{DonationMetaKeys::GATEWAY_TRANSACTION_ID()
            ->getKeyAsCamelCase()};
<<<<<<< HEAD
        $self->company = $donationQueryObject->{DonationMetaKeys::COMPANY()
            ->getKeyAsCamelCase()};

        if (!empty($donationQueryObject->{DonationMetaKeys::SUBSCRIPTION_INITIAL_DONATION()->getKeyAsCamelCase()})) {
            $self->type = DonationType::SUBSCRIPTION();
        } elseif ($self->subscriptionId) {
            $self->type = DonationType::RENEWAL();
        } else {
            $self->type = DonationType::SINGLE();
        }
=======
>>>>>>> fb785cbb (Initial commit)

        return $self;
    }

    /**
     * Convert DTO to Donation
<<<<<<< HEAD
     */
    public function toDonation(): Donation
=======
     *
     * @return Donation
     */
    public function toDonation()
>>>>>>> fb785cbb (Initial commit)
    {
        $attributes = get_object_vars($this);

        return new Donation($attributes);
    }
}
