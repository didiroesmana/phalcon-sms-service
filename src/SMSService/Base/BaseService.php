<?php

namespace Didiroesmana\SMSService\Base;

use Phalcon\DiInterface;
use Phalcon\Di\InjectionAwareInterface;

abstract class BaseService implements InjectionAwareInterface
{
    /**
     * @var mixed
     */
    protected $_di;

    /**
     * @return mixed
     */
    public function getDi()
    {
        return $this->_di;
    }

    /**
     * @param DiInterface $di
     */
    public function setDi(DiInterface $di)
    {
        $this->_di = $di;
    }
}
