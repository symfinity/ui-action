<?php

declare(strict_types=1);

namespace Symfinity\UiAction;

final class NativeActionRules
{
    public function validate(ActionIntent $intent, ActionMarkupContext $context): ValidationResult
    {
        $violations = [];

        if ($this->hasDataUiAction($context)) {
            $violations[] = new RuleViolation(
                'forbidden.data_ui_action',
                'The data-ui-action attribute is forbidden for native HTTP actions in v0.',
            );
        }

        match ($intent) {
            ActionIntent::Navigate => $this->validateNavigate($context, $violations),
            ActionIntent::Submit => $this->validateSubmit($context, $violations),
            ActionIntent::Delete => $this->validateDelete($context, $violations),
            ActionIntent::Download => $this->validateDownload($context, $violations),
        };

        return $violations === [] ? ValidationResult::valid() : ValidationResult::invalid($violations);
    }

    /**
     * @param list<RuleViolation> $violations
     */
    private function validateNavigate(ActionMarkupContext $context, array &$violations): void
    {
        if ($context->tag === 'button' && !$context->parentIsForm) {
            $violations[] = new RuleViolation(
                'navigate.forbidden_button_navigation',
                'Navigate intent must not use a bare button without a form context.',
            );
        }

        if ($context->tag !== 'a' || !$this->hasNonEmptyAttribute($context, 'href')) {
            $violations[] = new RuleViolation(
                'navigate.requires_anchor',
                'Navigate intent requires an anchor element with an href attribute.',
            );
        }
    }

    /**
     * @param list<RuleViolation> $violations
     */
    private function validateSubmit(ActionMarkupContext $context, array &$violations): void
    {
        if (!$this->isPlainPostForm($context)) {
            $violations[] = new RuleViolation(
                'submit.requires_form_post',
                'Submit intent requires a parent form with method post.',
            );
        }

        if ($this->attributeValue($context, 'type') !== 'submit') {
            $violations[] = new RuleViolation(
                'submit.requires_submit_type',
                'Submit intent requires type="submit" on the control.',
            );
        }
    }

    /**
     * @param list<RuleViolation> $violations
     */
    private function validateDelete(ActionMarkupContext $context, array &$violations): void
    {
        if ($context->tag === 'a') {
            $violations[] = new RuleViolation(
                'delete.forbidden_get',
                'Delete intent must not use a GET anchor.',
            );
        }

        if (!$this->isPlainPostForm($context)) {
            $violations[] = new RuleViolation(
                'delete.requires_form_post',
                'Delete intent requires a parent form with plain method post.',
            );
        }

        if ($this->hasMethodOverride($context)) {
            $violations[] = new RuleViolation(
                'delete.forbidden_method_override',
                'Delete intent must not use _method=DELETE override in v0.',
            );
        }

        if ($this->attributeValue($context, 'type') !== 'submit') {
            $violations[] = new RuleViolation(
                'submit.requires_submit_type',
                'Delete intent requires type="submit" on the control.',
            );
        }
    }

    /**
     * @param list<RuleViolation> $violations
     */
    private function validateDownload(ActionMarkupContext $context, array &$violations): void
    {
        if ($context->tag !== 'a' || !$this->hasNonEmptyAttribute($context, 'href')) {
            $violations[] = new RuleViolation(
                'download.requires_anchor',
                'Download intent requires an anchor element with an href attribute.',
            );
        }

        if (!$this->hasDownloadAttribute($context)) {
            $violations[] = new RuleViolation(
                'download.requires_download_attr',
                'Download intent requires a download attribute on the anchor.',
            );
        }
    }

    private function hasDataUiAction(ActionMarkupContext $context): bool
    {
        foreach ($context->attributes as $name => $_value) {
            if (strtolower($name) === 'data-ui-action') {
                return true;
            }
        }

        return false;
    }

    private function isPlainPostForm(ActionMarkupContext $context): bool
    {
        return $context->parentIsForm && strtolower((string) $context->formMethod) === 'post';
    }

    private function hasMethodOverride(ActionMarkupContext $context): bool
    {
        $method = $this->attributeValue($context, '_method');

        return $method !== null && strtoupper($method) === 'DELETE';
    }

    private function hasNonEmptyAttribute(ActionMarkupContext $context, string $name): bool
    {
        $value = $this->attributeValue($context, $name);

        return $value !== null && $value !== '';
    }

    private function hasDownloadAttribute(ActionMarkupContext $context): bool
    {
        foreach ($context->attributes as $name => $value) {
            if (strtolower($name) !== 'download') {
                continue;
            }

            if ($value === false) {
                continue;
            }

            return true;
        }

        return false;
    }

    private function attributeValue(ActionMarkupContext $context, string $name): ?string
    {
        foreach ($context->attributes as $key => $value) {
            if (strtolower($key) !== strtolower($name)) {
                continue;
            }

            if (is_bool($value)) {
                return $value ? $name : null;
            }

            return (string) $value;
        }

        return null;
    }
}
