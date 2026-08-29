<?php

declare(strict_types=1);

namespace Symfinity\UiAction;

final readonly class ActionMarkupContext
{
    /**
     * @param array<string, string|bool> $attributes
     */
    public function __construct(
        public string $tag,
        public array $attributes = [],
        public bool $parentIsForm = false,
        public ?string $formMethod = null,
        public bool $hasCsrfField = false,
    ) {
    }
}
