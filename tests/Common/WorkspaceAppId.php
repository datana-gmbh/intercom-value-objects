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

namespace Datana\Intercom\Value\Tests\Common;

use Datana\Intercom\Value\Common;
use Ergebnis\Test\Util\Helper;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class WorkspaceAppId extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(Common\WorkspaceAppId::class);
    }

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::blank()
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::empty()
     */
    public function throwsExcetionIfValueIs(string $value): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Common\WorkspaceAppId::fromString($value);
    }

    /**
     * @test
     */
    public function throwsExcetionIfValueIsTooShort(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Common\WorkspaceAppId::fromString('1111111');
    }

    /**
     * @test
     */
    public function throwsExcetionIfValueIsTooLong(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Common\WorkspaceAppId::fromString('111111111');
    }

    /**
     * @test
     */
    public function toStringReturnsValueFromFromStringIfExactly8CharactersLong(): void
    {
        $value = 'nwrk724c';

        $hash = Common\WorkspaceAppId::fromString($value);

        self::assertSame(
            $value,
            $hash->toString()
        );
    }
}
