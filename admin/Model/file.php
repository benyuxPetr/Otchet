<?php

namespace Admin\Model;
use Engine\Controller;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class file extends Controller
{
    protected $file = './Assets/files/table.xlsx';

     public function file_create($data){

         $spreadsheet = new Spreadsheet();

         $get = $this->request->get;

         array_unshift($data, $get);

         $spreadsheet->getActiveSheet()->fromArray($data,NULL);

         $writer = new Xlsx($spreadsheet);

         $writer->save($this->file);
     }

    function file_force_download() {
        if (file_exists($this->file)) {

            if (ob_get_level()) {
                ob_end_clean();
            }

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($this->file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($this->file));

            readfile($this->file);
            exit;
        }
    }
}