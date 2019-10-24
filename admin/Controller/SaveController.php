<?php

namespace Admin\Controller;

use Admin\Model\file;
use Admin\Model\Table;

class SaveController extends AdminController
{
    protected $file;
    protected $Table;
    protected $tableName;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->file = new file($di);
        $this->Table = new Table($di);
        $this->tableName = basename(dirname(dirname(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))));
    }

    public function index()
    {


//        echo "<pre>";
//        print_r($_POST);

        $resultArr = $this->file->getTablesArray($_POST);

        $this->file->file_create($resultArr);

        $this->file->file_force_download();
    }
}