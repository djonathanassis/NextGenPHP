<?php

declare(strict_types=1);

namespace Mylog\Logger\Enums;

enum LogLevel: string
{
    case DEBUG = 'debug';
    case INFO = 'info';
    case WARNING = 'warning';
    case ERROR = 'error';
    case ALERT = 'alert';
    case LOG = 'log';
}
