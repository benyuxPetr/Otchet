<?php

namespace Admin\Model;

use Engine\Core\Database\QueryBuilder;
use Engine\Controller;
use Engine\DI\DI;

class Table extends Controller
{
    protected $table;

    public function __construct(DI $di)
    {
        parent::__construct($di);

        $this->table = 'workers';
    }

    public function getTable($select = '*'){
        $queryBuilder = new QueryBuilder();

        $sql = $queryBuilder->select($select)->from($this->table)->sql();

        return $this->db->query($sql, $queryBuilder->values);
    }

    public function generateTableHtml()
    {
        $query = $this->getTable();

        $tableHtml = $this->buildTable($query);

        $CheckBoxesHtml = $this->ColumCheckBoxes($query);

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

    public function ColumCheckBoxes($array)
    {
        $html = '';
        $i = 0;
        foreach($array[0] as $key=>$value){
            $html .= '<label><input type="checkbox" name="checkbox'.$i.'" value="' . htmlspecialchars($key) . '" checked>' . htmlspecialchars($key) . '</label>';
            $i++;
        }
        return $html;
    }
}