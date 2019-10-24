<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{

    public $serviceName = 'router';
    /**
     * @return mixed
     */
    public function init()
    {
        $router = new Router('http://otchet.loc/');

        $this->di->set($this->serviceName, $router);
    }
}