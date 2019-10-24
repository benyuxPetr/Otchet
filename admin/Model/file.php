<?php

namespace Admin\Model;
use Engine\Controller;
use Engine\DI\DI;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class file extends Controller
{
    protected $file = './Assets/files/table.xlsx';
    protected $table;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->table = new Table($di);
    }


    public function getTablesArray($post){
        $result = [];
        $longArr = 0;
        foreach ($post['checkbox'] as $key=>$value){
            $select = "";
            foreach ($value as $key1 => $value1){
                $select .= $key1.",";
            }

            $array = $this->table->getTableAll($key ,substr($select, 0, -1));



            foreach($array as $k => $v){
                foreach ($v as $k1 => $v1){
                    $v[$key.'_'.$k1] = $v1;
                    unset($v[$k1]);
                }
                $array[$k] = $v;
            }

            if($longArr < count($array)){
                $longArr = count($array);
            }
            $result[] = $array;
        }
        $resultFinal = [];
        foreach ($result as $array=>$arrayValue){
            if(count($arrayValue) < $longArr){
                while (count($arrayValue) < $longArr){
                    $arrayValue[] = ['empty' => ''];
               }
            }
            $resultFinal = array_replace_recursive($resultFinal, $arrayValue);
        }

        return $resultFinal;
    }


     public function file_create($data){

         $spreadsheet = new Spreadsheet();

         $headers = [];
         foreach ($_POST['checkbox'] as $key => $value)
             {

                 foreach ($value as $key1 =>$names)
                 {

                    $headers[] = $key1;
                 }
             }

         array_unshift($data, $headers);

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