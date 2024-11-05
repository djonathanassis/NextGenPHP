<?php

declare(strict_types=1);

namespace Mylog\Logger;

use Mylog\Logger\Interfaces\LoggerInterface;
use Mylog\Logger\Enums\LogLevel;

class FileLogger implements LoggerInterface
{
    public function __construct(
        private readonly string $filePath
    ) {}

    public function log(LogLevel $level, string $message, array $data = []): void
    {
        $log = sprintf('%s | %s: [%s] [%s]', date('Y-m-d H:i:s'), $level->value, $message, json_encode($data));

        file_put_contents($this->filePath, $log . PHP_EOL, FILE_APPEND);
    }
}
