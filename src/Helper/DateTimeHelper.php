<?php

declare(strict_types=1);

/**
 * This file is part of datana-gmbh/intercom-value-objects.
 *
 * (c) Datana GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Datana\Intercom\Value\Helper;

use OskarStark\Value\TrimmedNonEmptyString;
use Safe\DateTimeImmutable;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class DateTimeHelper
{
    public static function createDateTimeImmutableFromUnixTimestamp(int $timestamp): DateTimeImmutable
    {
        return new DateTimeImmutable(
            \Safe\date('Y-m-d H:i:s', $timestamp),
            new \DateTimeZone('Europe/Berlin')
        );
    }
}
