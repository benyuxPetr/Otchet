<?php

namespace Admin\Model;

use Engine\Core\Database\QueryBuilder;
use Engine\Controller;
use Engine\DI\DI;

class Table extends Controller
{

    public function __construct(DI $di)
    {
        parent::__construct($di);
    }

    public function getTable($table, $select = '*'){
        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder->select($select)->from($table)->orderBy($table.'.id','DESC')->limit(15)->sql();

        return $this->db->query($sql, $queryBuilder->values);
    }

    public function getTableAll($table, $select = '*'){
        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder->select($select)->from($table)->orderBy($table.'.id','DESC')->sql();

        return $this->db->query($sql, $queryBuilder->values);
    }

    public function generateTableHtml($table, $select)
    {
        $query = $this->getTable($table, $select);

        $tableHtml = $this->buildTable($query);

        $CheckBoxesHtml = $this->ColumCheckBoxes($table, $query);

        return ['table' => $tableHtml,
                'labels' => $CheckBoxesHtml];
    }

    public function buildTable($array)
    {
        $html = '<table>';
        $html .= '<tr>';
        foreach($array[0] as $key=>$value){
            $html .= '<th>' . htmlspecialchars($key) . '</th>';
        }
        $html .= '</tr>';
        foreach( $array as $key=>$value){
            $html .= '<tr>';
            foreach($value as $key2=>$value2){
                $html .= '<td>' . htmlspecialchars($value2) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    }

    public function ColumCheckBoxes($table, $array)
    {
        $html = '';
        foreach($array[0] as $key=>$value){
            $html .= '<label><input type="checkbox" name="checkbox['.$table.']['.htmlspecialchars($key).']" value="' . htmlspecialchars($key) . '" checked>' . htmlspecialchars($key) . '</label>';
        }
        return $html;
    }

    public function getOptions($table){
        $arr = [
            "worker",
            "project",
            "task"
        ];
        if(($key = array_search($table,$arr)) !== FALSE){
            unset($arr[$key]);
        }
        $html = '';
        foreach ($arr as $value){
            $html .= '<option value="'.$value.'">'.$value.'</option>';
        }
        return $html;
    }
}