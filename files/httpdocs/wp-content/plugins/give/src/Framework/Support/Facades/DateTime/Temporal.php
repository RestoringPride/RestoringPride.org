<?php

namespace Give\Framework\Support\Facades\DateTime;

use DateTime;
use DateTimeInterface;
use Give\Framework\Support\Facades\Facade;

/**
 * @since 2.19.6
 *
<<<<<<< HEAD
 * @method static DateTimeInterface toDateTime(string $date)
 * @method static DateTimeInterface getCurrentDateTime()
 * @method static string getFormattedDateTime(DateTimeInterface $dateTime)
 * @method static string getCurrentFormattedDateForDatabase()
 * @method static DateTimeInterface withoutMicroseconds(DateTimeInterface $dateTime)
 */
class Temporal extends Facade
{
    protected function getFacadeAccessor(): string
=======
 * @method static toDateTime(string $date): DateTimeInterface
 * @method static getCurrentDateTime(): DateTimeInterface
 * @method static getFormattedDateTime(DateTime $dateTime): string
 * @method static getCurrentFormattedDateForDatabase(): string
 * @method static withoutMicroseconds(DateTimeInterface $dateTime): DateTimeInterface
 */
class Temporal extends Facade
{
    protected function getFacadeAccessor()
>>>>>>> fb785cbb (Initial commit)
    {
        return TemporalFacade::class;
    }
}
