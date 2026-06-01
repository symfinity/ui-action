<?php

declare(strict_types=1);

namespace Symfinity\UiAction\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;
use Symfinity\UiAction\NativeActionRules;
use Symfinity\UiAction\Tests\Fixtures\IntentFixtures;

final class NativeActionRulesTest extends TestCase
{
    private NativeActionRules $rules;

    protected function setUp(): void
    {
        $this->rules = new NativeActionRules();
    }

    #[Test]
    public function validFixtureRowsPass(): void
    {
        foreach (IntentFixtures::validRows() as [$intent, $context]) {
            $result = $this->rules->validate($intent, $context);
            self::assertTrue($result->valid, sprintf('Expected valid for intent %s', $intent->value));
            self::assertSame([], $result->violations);
        }
    }

    /**
     * @return iterable<string, array{ActionIntent, ActionMarkupContext, string}>
     */
    public static function invalidFixtureRows(): iterable
    {
        foreach (IntentFixtures::invalidRows() as $row) {
            yield $row[2] => $row;
        }
    }

    #[Test]
    #[DataProvider('invalidFixtureRows')]
    public function invalidFixtureRowsFail(ActionIntent $intent, ActionMarkupContext $context, string $expectedCode): void
    {
        $result = $this->rules->validate($intent, $context);

        self::assertFalse($result->valid);
        $codes = array_map(static fn ($v) => $v->code, $result->violations);
        self::assertContains($expectedCode, $codes);
    }
}
