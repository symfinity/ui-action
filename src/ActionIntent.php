<?php

declare(strict_types=1);

namespace Symfinity\UiAction;

enum ActionIntent: string
{
    case Navigate = 'navigate';
    case Submit = 'submit';
    case Delete = 'delete';
    case Download = 'download';
}
