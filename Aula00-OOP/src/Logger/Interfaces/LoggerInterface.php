<?php

declare(strict_types=1);

namespace Mylog\Logger\Interfaces;

use Mylog\Logger\Enums\LogLevel;

interface LoggerInterface
{
    public function log(LogLevel $level, string $message, array $data = []): void;
}