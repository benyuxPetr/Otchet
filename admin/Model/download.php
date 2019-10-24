<?php

namespace Admin\Model;
use Engine\Controller;
use Engine\DI\DI;

class download extends Controller
{
    protected $table;
    protected $startTable;
    public $tableName;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->table = new Table($di);
        $this->tableName = basename(dirname(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

        $this->startTable = $this->table->getTable($this->tableName ,'*');
    }

    public function getStartTable(){
        return $this->startTable;
    }

}