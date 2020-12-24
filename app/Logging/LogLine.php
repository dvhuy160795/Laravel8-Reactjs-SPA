<?php

/**
 *  Custom log content.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Logging;

use Illuminate\Log\Logger;
use Monolog\Formatter\LineFormatter;

/**
 * Class LogLine.
 *
 * @package App\Logging
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class LogLine
{

    /**
     * Customize the given logger instance.
     *
     * @param  Logger $logger : Log library object.
     * @return void
     */
    public function __invoke(Logger $logger)
    {
        $line = new LineFormatter(
            "[%datetime%] %channel%.%level_name%: %message% %context% %extra% \n",
            'Y-m-d h:i:s',
            false,
            true
        );

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter($line);
        }
    }
}
