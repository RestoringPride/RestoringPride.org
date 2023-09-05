<?php

namespace Give\Donations\ValueObjects;

use MyCLabs\Enum\Enum;

/**
 * @since 2.19.6
 *
 * @method static DonationMode TEST()
 * @method static DonationMode LIVE()
<<<<<<< HEAD
 * @method bool isTest()
 * @method bool isLive()
=======
>>>>>>> fb785cbb (Initial commit)
 */
class DonationMode extends Enum {
    const TEST = 'test';
    const LIVE = 'live';
}
