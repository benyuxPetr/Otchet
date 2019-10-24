<?php

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('dashboard', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('auth-admin', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');
$this->router->add('save', '/admin/[a-zA-Z0-9\.\-_%]+/download/save/', 'SaveController:index', 'POST');
$this->router->add('download', '/admin/[a-zA-Z0-9\.\-_%]+/download/', 'DownloadController:index');
$this->router->add('ajax', '/admin/ajax/', 'AjaxController:index', 'POST');



$this->router->add('worker', '/admin/worker/', 'TableController:index');
$this->router->add('project', '/admin/project/', 'TableController:index');
$this->router->add('task', '/admin/task/', 'TableController:index');