<?php

namespace Admin\Controller;

use Admin\Model\file;
use Admin\Model\Table;

class SaveController extends AdminController
{
    protected $file;
    protected $Table;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->file = new file($di);
        $this->Table = new Table($di);
    }

    public function index()
    {
        $select = implode(",", $this->request->get);

        $this->file->file_create($this->Table->getTable($select));

        $this->file->file_force_download();
    }
}