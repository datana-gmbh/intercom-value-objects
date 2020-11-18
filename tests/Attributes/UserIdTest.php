<?php

declare(strict_types=1);

/*
 * This file is part of gansel-rechtsanwaelte/intercom-value-objects.
 *
 * (c) Gansel Rechtsanwälte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gansel\Intercom\Value\Tests\Attributes;

use Ergebnis\Test\Util\Helper;
use Gansel\Intercom\Value\Attributes\UserId;
use PHPUnit\Framework\TestCase;

final class UserIdTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(UserId::class);
    }

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::empty()
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::blank()
     */
    public function throwsExcetionIfValueIs(string $value)
    {
        $this->expectException(\InvalidArgumentException::class);

        UserId::fromString($value);
    }

    /**
     * @test
     */
    public function toStringReturnsValueFromFromString()
    {
        $value = self::faker()->uuid;

        $userId = UserId::fromString($value);

        static::assertSame(
            $value,
            $userId->toString()
        );
    }
}
