<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Tests\Attributes;

use Ergebnis\Test\Util\Helper;
use Gansel\Intercom\Value\Attributes\UserHash;
use Gansel\Intercom\Value\Attributes\UserId;
use PHPUnit\Framework\TestCase;

final class UserHashTest extends TestCase
{
    use Helper;

    /**
     * @test
     */
    public function isFinal(): void
    {
        self::assertClassIsFinal(UserHash::class);
    }

    /**
     * @test
     *
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::empty()
     * @dataProvider \Ergebnis\Test\Util\DataProvider\StringProvider::blank()
     */
    public function throwsExcetionIfSecretIs(string $value)
    {
        $userId = UserId::fromString(self::faker()->uuid);

        $this->expectException(\InvalidArgumentException::class);

        UserHash::forUserId(
            $userId,
            $value
        );
    }

    /**
     * @test
     */
    public function toStringReturnsValidHashForSecret()
    {
        $value = self::faker()->uuid;
        $secret = self::faker()->sha256;

        $userId = UserId::fromString($value);

        $expectedHash = hash_hmac(
            'sha256',
            $userId->toString(),
            $secret
        );

        self::assertSame(
            $expectedHash,
            UserHash::forUserId($userId, $secret)->toString()
        );
    }
}
