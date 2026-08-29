<?php

declare(strict_types=1);

namespace Symfinity\UiAction;

final readonly class ValidationResult
{
    /**
     * @param list<RuleViolation> $violations
     */
    public function __construct(
        public bool $valid,
        public array $violations,
    ) {
    }

    public static function valid(): self
    {
        return new self(true, []);
    }

    /**
     * @param list<RuleViolation> $violations
     */
    public static function invalid(array $violations): self
    {
        return new self(false, $violations);
    }
}
