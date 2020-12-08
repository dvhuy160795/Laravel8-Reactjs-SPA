<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class LogLine
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter(new LineFormatter(
               "[%datetime%] %channel%.%level_name%: %message% %context% %extra% \n", 'Y-m-d h:i:s', false, true
           ));
        }
    }
}
