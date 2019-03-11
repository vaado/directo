<?php

namespace Directo;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\WebProcessor;
use Psr\Log\LoggerInterface;

class LoggerBuilder {

    /** @var LoggerInterface */
    protected $logger;

    /**
     * Gets Logger.
     *
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Logger.
     *
     * @param $channel
     * @param string $path
     * @param int    $level
     *
     * @return LoggerBuilder
     *
     * @throws \Exception
     */
    public function createLogger($channel, $path = '/tmp/directo.log', $level = Logger::DEBUG)
    {
        $this->logger = new Logger($channel);
        $this->logger->pushHandler(new StreamHandler($path, $level));
        $this->logger->pushProcessor(new WebProcessor());

        return $this;
    }
}