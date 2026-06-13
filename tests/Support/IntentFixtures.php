<?php

declare(strict_types=1);

namespace Symfinity\UiAction\Tests\Support;

use Symfinity\UiAction\ActionIntent;
use Symfinity\UiAction\ActionMarkupContext;

final class IntentFixtures
{
    /**
     * @return list<array{ActionIntent, ActionMarkupContext}>
     */
    public static function validRows(): array
    {
        return [
            [ActionIntent::Navigate, new ActionMarkupContext('a', ['href' => '/go'])],
            [ActionIntent::Submit, new ActionMarkupContext('button', ['type' => 'submit'], parentIsForm: true, formMethod: 'post')],
            [ActionIntent::Delete, new ActionMarkupContext('button', ['type' => 'submit'], parentIsForm: true, formMethod: 'post', hasCsrfField: true)],
            [ActionIntent::Download, new ActionMarkupContext('a', ['href' => '/file.txt', 'download' => 'file.txt'])],
        ];
    }

    /**
     * @return list<array{ActionIntent, ActionMarkupContext, string}>
     */
    public static function invalidRows(): array
    {
        return [
            [ActionIntent::Navigate, new ActionMarkupContext('button', []), 'navigate.forbidden_button_navigation'],
            [ActionIntent::Navigate, new ActionMarkupContext('a', []), 'navigate.requires_anchor'],
            [ActionIntent::Submit, new ActionMarkupContext('button', ['type' => 'submit']), 'submit.requires_form_post'],
            [ActionIntent::Submit, new ActionMarkupContext('button', ['type' => 'button'], parentIsForm: true, formMethod: 'post'), 'submit.requires_submit_type'],
            [ActionIntent::Delete, new ActionMarkupContext('a', ['href' => '/x'], parentIsForm: true, formMethod: 'post'), 'delete.forbidden_get'],
            [ActionIntent::Delete, new ActionMarkupContext('button', ['type' => 'submit', '_method' => 'DELETE'], parentIsForm: true, formMethod: 'post'), 'delete.forbidden_method_override'],
            [ActionIntent::Download, new ActionMarkupContext('button', ['href' => '/f']), 'download.requires_anchor'],
            [ActionIntent::Download, new ActionMarkupContext('a', ['href' => '/f']), 'download.requires_download_attr'],
            [ActionIntent::Navigate, new ActionMarkupContext('a', ['href' => '/x', 'data-ui-action' => 'noop']), 'forbidden.data_ui_action'],
        ];
    }
}
