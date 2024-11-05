<?php

declare(strict_types=1);

namespace Mylog\Logger;

use Mylog\Logger\Interfaces\LoggerInterface;
use Mylog\Logger\Enums\LogLevel;

class Logger implements LoggerInterface
{
    public function __construct(
        private readonly LoggerInterface $logger
    ) {}

    public function log(LogLevel $level, string $message, array $data = []): void
    {
        $this->logger->log($level, $message, $data);
    }
}
