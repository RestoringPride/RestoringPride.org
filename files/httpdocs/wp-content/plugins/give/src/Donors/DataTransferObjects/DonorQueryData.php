<?php

namespace Give\Donors\DataTransferObjects;

use Give\Donors\Models\Donor;
use Give\Donors\ValueObjects\DonorMetaKeys;
use Give\Framework\Support\Facades\DateTime\Temporal;
<<<<<<< HEAD
use Give\Framework\Support\ValueObjects\Money;
=======
>>>>>>> fb785cbb (Initial commit)

/**
 * Class DonorObjectData
 *
 * @since 2.19.6
 */
<<<<<<< HEAD
final class DonorQueryData
=======
class DonorQueryData
>>>>>>> fb785cbb (Initial commit)
{

    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $createdAt;
    /**
     * @var int
     */
    public $userId;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $firstName;
    /**
     * @var string
     */
    public $lastName;
    /**
<<<<<<< HEAD
     * @var array
=======
     * @var mixed
>>>>>>> fb785cbb (Initial commit)
     */
    public $additionalEmails;
    /**
     * @var string
     */
    public $prefix;
<<<<<<< HEAD
    /**
     * @var Money
     */
    public $totalAmountDonated;
    /**
     * @var int
     */
    public $totalNumberOfDonations;
=======
>>>>>>> fb785cbb (Initial commit)

    /**
     * Convert data from donor object to Donor Model
     *
<<<<<<< HEAD
     * @since 2.24.0 add $totalAmountDonated and $totalNumberOfDonations
=======
>>>>>>> fb785cbb (Initial commit)
     * @since 2.20.0 add donor prefix property
     * @since 2.19.6
     *
     * @return self
     */
    public static function fromObject($object)
    {
        $self = new static();

        $self->id = (int)$object->id;
        $self->userId = (int)$object->userId;
        $self->prefix = $object->{DonorMetaKeys::PREFIX()->getKeyAsCamelCase()};
        $self->email = $object->email;
        $self->name = $object->name;
        $self->firstName = $object->firstName;
        $self->lastName = $object->lastName;
        $self->createdAt = Temporal::toDateTime($object->createdAt);
<<<<<<< HEAD
        $self->additionalEmails = $object->additionalEmails;
        $self->totalAmountDonated = Money::fromDecimal($object->totalAmountDonated, give_get_currency());
        $self->totalNumberOfDonations = (int)$object->totalNumberOfDonations;
=======
        $self->additionalEmails = json_decode($object->additionalEmails, true);
>>>>>>> fb785cbb (Initial commit)

        return $self;
    }

    /**
     * Convert DTO to Donation
     *
     * @return Donor
     */
    public function toDonor()
    {
        $attributes = get_object_vars($this);

        return new Donor($attributes);
    }
}
