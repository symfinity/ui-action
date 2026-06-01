<?php

declare(strict_types=1);

namespace Symfinity\UiAction;

final readonly class RuleViolation
{
    public function __construct(
        public string $code,
        public string $message,
    ) {
    }
}
