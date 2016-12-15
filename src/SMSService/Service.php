<?php

namespace Didiroesmana\SMSService;

use Didiroesmana\SMSService\Base\BaseService;
use \Exception;

class Service extends BaseService
{
    /**
     * @var mixed
     */
    protected $_provider = null;

    /**
     * @param $from
     * @param $to
     * @param $message
     */
    public function send($from, $to, $message)
    {
        if (!$this->_provider) {
            $this->_initializeProvider();
        }

        return $this->_provider
            ->setMessage($message)
            ->setSender($from)
            ->setRecipient($to)
            ->send();
    }

    protected function _initializeProvider()
    {
        if (!$config = $this->getDi()->get('config')->smsService) {
            throw new Exception("No config available", 1);
        }

        if (!$providerName = $config->use) {
            throw new Exception("No provider is set", 1);
        }

        $providerClass = "Didiroesmana\\SMSService\\Providers\\{$providerName}";

        if (class_exists($providerClass)) {
            $this->_provider = new $providerClass($this->_di, $config->{$config->use});
        } else {
            throw new Exception("Provider doesn't exists", 1);
        }

        return $this;
    }

}
