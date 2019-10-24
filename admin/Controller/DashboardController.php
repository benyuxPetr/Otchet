<?php

namespace Admin\Controller;

use Admin\Model\Table;

class DashboardController extends AdminController
{
    protected $table;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->table = new Table($di);
    }

    public function index()
    {
        $this->view->render('dashboard');
    }
}