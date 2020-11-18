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

namespace Gansel\Intercom\Value\Tests\Common;

use Ergebnis\Test\Util\Helper;
use Gansel\Intercom\Value\Common;
use PHPUnit\Framework\TestCase;

final class HashTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(Common\Hash::class);
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

        Common\Hash::fromString($value);
    }

    /**
     * @test
     */
    public function toStringReturnsValueFromFromString()
    {
        $value = self::faker()->sha256;

        $hash = Common\Hash::fromString($value);

        static::assertSame(
            $value,
            $hash->toString()
        );
    }
}
