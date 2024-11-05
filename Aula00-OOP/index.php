<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Mylog\Logger\Logger;
use Mylog\Logger\FileLogger;
use Mylog\Logger\Enums\LogLevel;

$logger = new Logger(new FileLogger('./logs.txt'));

$logger->log(LogLevel::ALERT, 'Message 1', ['data1' => 1, 'data2' => 2]);
$logger->log(LogLevel::DEBUG, 'Message 3', ['data3' => 1, 'data4' => 2]);
$logger->log(LogLevel::LOG, 'Message 2', ['data5' => 1, 'data6' => 2]);

