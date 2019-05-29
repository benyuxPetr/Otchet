<?php
/**
 * Created by PhpStorm.
 * User: benyu
 * Date: 27.05.2019
 * Time: 10:04
 */

namespace Admin\Controller;

use Admin\Model\Table;

class TableController extends AdminController
{
    protected $table;

    public function __construct($di)
    {
        parent::__construct($di);

        $this->table = new Table($di);
    }

    public function index()
    {
        $data = $this->table->generateTableHtml(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '*');

        $this->view->render('table', $data);
    }
}