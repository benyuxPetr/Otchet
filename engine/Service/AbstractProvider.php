<?php

namespace Engine\Service;

abstract class AbstractProvider
{

    protected $di;

    /**
     * AbstractProvider constructor.
     * @param \Engine\DI\Di $di
     */
    public function __construct(\Engine\DI\Di $di)
    {
        $this->di = $di;
    }

    /**
     * @return mixed
     */
    abstract function init();
}