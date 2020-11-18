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

namespace Gansel\Intercom\Value;

use Gansel\Intercom\Value\Canvas\ContentUrl;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class LiveCanvas implements CanvasInterface
{
    private ContentUrl $contentUrl;

    private function __construct(ContentUrl $contentUrl)
    {
        $this->contentUrl = $contentUrl;
    }

    public static function fromValues(ContentUrl $contentUrl): self
    {
        return new self($contentUrl);
    }

    public function toArray(): array
    {
        return [
            'content_url' => $this->contentUrl->toString(),
        ];
    }
}
