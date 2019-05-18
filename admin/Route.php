<?php

$this->router->add('login', '/admin/login/', 'LoginController:form');
$this->router->add('dashboard', '/admin/auth/', 'LoginController:authAdmin', 'POST');
$this->router->add('auth-admin', '/admin/', 'DashboardController:index');
$this->router->add('logout', '/admin/logout/', 'AdminController:logout');
$this->router->add('save', '/admin/save/', 'SaveController:index');