<?php

namespace Give\Donations\ValueObjects;

use Give\Framework\Support\ValueObjects\Enum;

/**
 * @since 2.19.6
 *
 * @method static DonationStatus PENDING()
 * @method static DonationStatus COMPLETE()
 * @method static DonationStatus REFUNDED()
 * @method static DonationStatus FAILED()
<<<<<<< HEAD
 * @method static DonationStatus CANCELLED()
=======
 * @method static DonationStatus CANCELED()
>>>>>>> fb785cbb (Initial commit)
 * @method static DonationStatus ABANDONED()
 * @method static DonationStatus PREAPPROVAL()
 * @method static DonationStatus PROCESSING()
 * @method static DonationStatus REVOKED()
<<<<<<< HEAD
 * @method static DonationStatus RENEWAL() @deprecated
=======
 * @method static DonationStatus RENEWAL()
>>>>>>> fb785cbb (Initial commit)
 * @method bool isPending()
 * @method bool isComplete()
 * @method bool isRefunded()
 * @method bool isFailed()
<<<<<<< HEAD
 * @method bool isCancelled()
=======
 * @method bool isCanceled()
>>>>>>> fb785cbb (Initial commit)
 * @method bool isAbandoned()
 * @method bool isPreapproval()
 * @method bool isProcessing()
 * @method bool isRevoked()
<<<<<<< HEAD
 * @method bool isRenewal() @deprecated Do not use this. Instead, set the donation type to "renewal" and use COMPLETE status.
=======
 * @method bool isRenewal()
>>>>>>> fb785cbb (Initial commit)
 */
class DonationStatus extends Enum
{
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const COMPLETE = 'publish';
    const REFUNDED = 'refunded';
    const FAILED = 'failed';
<<<<<<< HEAD
    const CANCELLED = 'cancelled';
    const ABANDONED = 'abandoned';
    const PREAPPROVAL = 'preapproval';
    const REVOKED = 'revoked';

    /**
     * @deprecated 2.23.0 Use DonationStatus::COMPLETE
     */
    const RENEWAL = 'give_subscription';

    /**
     * @since 2.24.0
     *
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::PENDING => __('Pending', 'give'),
            self::PROCESSING => __('Processing', 'give'),
            self::COMPLETE => __('Completed', 'give'),
            self::REFUNDED => __('Refunded', 'give'),
            self::FAILED => __('Failed', 'give'),
            self::CANCELLED => __('Cancelled', 'give'),
            self::ABANDONED => __('Abandoned', 'give'),
            self::PREAPPROVAL => __('Preapproval', 'give'),
            self::REVOKED => __('Revoked', 'give'),
            self::RENEWAL => __('Renewal', 'give'),
        ];
    }

    /**
     * @since 2.24.0
     *
     * @return string
     */
    public function label(): string
    {
        return self::labels()[ $this->getValue() ];
    }
=======
    const CANCELED = 'cancelled';
    const ABANDONED = 'abandoned';
    const PREAPPROVAL = 'preapproval';
    const REVOKED = 'revoked';
    const RENEWAL = 'give_subscription';
>>>>>>> fb785cbb (Initial commit)
}
