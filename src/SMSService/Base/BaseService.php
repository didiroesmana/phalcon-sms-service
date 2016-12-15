<?php

namespace Didiroesmana\SMSService\Base;

use Phalcon\DiInterface;

abstract class BaseService implements InjectionAware
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
        return $_di;
    }

    /**
     * @param DiInterface $di
     */
    public function setDi(DiInterface $di)
    {
        $this->_di = $di;
    }
}
