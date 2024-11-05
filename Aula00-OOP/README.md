## Exercício 
Criar um conjunto de classes de log em arquivos, seguindo o uso abaixo:
O logger deve gerar um arquivo local com o contéudo sempre adicionando uma linha nova

```php
<?php

use Mylog\Logger;

$logger = new Logger(new FileLogger('./logs.txt'));

// LogLevel
// Enum: log, alert, danger
$logger->log(level: LogLevel::alert, message: 'Message 1', data: ['data1' => 1, 'data2' => 2]);

$logger->log(level: LogLevel::danger, message: 'Message 3', data: ['data3' => 1, 'data4' => 2]);

$logger->log(level: LogLevel::log, message: 'Message 2', data: ['data5' => 1, 'data6' => 2]);

// Ex: Saída do log em arquivo
// 2024-10-28 23:44:33 | alert: [Message 1] [{"data1":1,"data2":2}]
// 2024-10-28 23:45:33 | danger: [Message 3] [{"data3":1,"data4":2}]
// 2024-10-28 23:46:33 | log: [Message 2] [{"data5":1,"data6":2}]