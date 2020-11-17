<?php

declare(strict_types=1);

namespace Gansel\Intercom\Value\Canvas;

/**
 * @author Oskar Stark <oskarstark@googlemail.com>
 */
final class Components
{
    /**
     * @var Component[]
     */
    private array $components;

    private function __construct(Component ...$components)
    {
        $this->components = $components;
    }

    public static function fromValues(Component ...$components): self
    {
        return new self(...$components);
    }

    public function toArray(): array
    {
        $components = [];

        foreach ($this->components as $component) {
            $components[] = $component->toArray();
        }

        return [
            'components' => $components,
        ];
    }
}
