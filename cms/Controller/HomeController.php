<?php

namespace Cms\Controller;


class HomeController extends CmsController
{
    public function index()
    {
        $data = ['name' => 'aaaa'];
        $this->view->render('index', $data);
    }
}