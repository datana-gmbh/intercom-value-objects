<?php

declare(strict_types=1);

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
