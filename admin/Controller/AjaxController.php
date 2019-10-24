<?php

namespace Admin\Controller;

use Admin\Model\download;
use Admin\Model\Table;

class AjaxController extends AdminController
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
        if ($_POST['tableName']){

            $html = '<div class="tableHeader">'.$_POST['tableName'].'</div>'.$this->table->ColumCheckBoxes($_POST['tableName'], $this->table->getTable($_POST['tableName'] ,'*'));

            echo json_encode([
               'success' => true,
                'html' => $html
            ]);
        }
    }
}