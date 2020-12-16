<?php

declare(strict_types=1);

/**
 * This file is part of gansel-rechtsanwaelte/intercom-value-objects.
 *
 * (c) Gansel Rechtsanwälte
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gansel\Intercom\Value\Tests\Security;

use Ergebnis\Test\Util\Helper;
use Gansel\Intercom\Value\Security;
use PHPUnit\Framework\TestCase;
use function Symfony\Component\String\u;

/**
 * @internal
 */
final class IdentityVerificationSecretTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(Security\IdentityVerificationSecret::class);
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

        Security\IdentityVerificationSecret::fromString($value);
    }

    /**
     * @test
     */
    public function throwsExcetionIfValueIsNot40CharactersLong(): void
    {
        $value = u(self::faker()->sha256)->truncate(20)->toString();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The Identity Verification Secret needs to be 40 characters long!');

        Security\IdentityVerificationSecret::fromString($value);
    }

    /**
     * @test
     */
    public function toStringReturnsValueFromFromString(): void
    {
        $value = u(self::faker()->sha256)->truncate(40)->toString();

        $identiyVerificationSecret = Security\IdentityVerificationSecret::fromString($value);

        self::assertSame(
            $value,
            $identiyVerificationSecret->toString()
        );
    }
}
