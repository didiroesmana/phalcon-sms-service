<?php

namespace Didiroesmana\SMSService\Base;

use Didiroesmana\SMSService\Contracts\SmsProviderInterface;
use GuzzleHttp\Client as HttpClient;
use Phalcon\DiInterface;

abstract class BaseProvider implements SmsProviderInterface
{
    /**
     * @var mixed
     */
    protected $_config;

    /**
     * @var mixed
     */
    protected $_di;

    /**
     * @var mixed
     */
    protected $_sender;

    /**
     * @var mixed
     */
    protected $_recipient;

    /**
     * @var mixed
     */
    protected $_endpoint;

    /**
     * @var mixed
     */
    protected $_client;

    /**
     * @param DiInterface $di
     * @param $config
     */
    public function __construct(DiInterface $di, $config)
    {
        $this->_di = $di;
        $this->_config = $config;
        $this->_client = new HttpClient();
    }

    protected function _buildQuery();

}
