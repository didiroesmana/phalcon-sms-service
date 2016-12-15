<?php

namespace Didiroesmana\SMSService;

use Didiroesmana\SMSService\Base\BaseService;

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
        if (!$_provider) {
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

        if (class_exists("Didiroesmana\\SMSService\\Providers\\{$providerName}")) {
            $this->_provider =
        } else {
            throw new Exception("Provider doesn't exists", 1);
        }
    }

}
