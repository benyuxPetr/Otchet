<?php

namespace Admin\Controller;

use Admin\Model\download;
use Admin\Model\Table;

class DownloadController extends AdminController
{
    protected $table;
    protected $download;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->table = new Table($di);
        $this->download = new download($di);
    }

    public function index()
    {
        $data = ['check' => $this->table->ColumCheckBoxes($this->download->tableName, $this->download->getStartTable())];
        $data += ['tableName' => $this->download->tableName];
        $data += ['options' => $this->table->getOptions($this->download->tableName)];

        $this->view->render('download', $data);
    }
}