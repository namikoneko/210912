<?php
//require_once '../libs/flight/Flight.php';
//require_once '../libs/idiorm.php';
//ORM::configure('sqlite:./data.db');
require_once '../../libs/flight/Flight.php';
require_once '../../libs/idiorm.php';
ORM::configure('sqlite:../data.db');

//class GetRowChild extends GetRow
class GetRows
{
  //private $rows;
  private $table;

//  public function __construct($table)
//  {
//    $this->table = $table;
//  }

//  public function getAll()
//  {
//    $rows = ORM::for_table($this->table)->find_array();
//    return $rows;
//  }

  public function getAll($table)
  {
    $rows = ORM::for_table($table)->find_array();
    return $rows;
  }

  public function getOne($table)
  {
    //$rows = ORM::for_table($table)->find_one()->as_array();
    $rows = ORM::for_table($table)->find_one();
    $rows = $rows->as_array();
    return $rows;
  }

  public function findText($table,$findStr)
  {
    $rows = ORM::for_table($table)->where_like("text","%{$findStr}%")->find_array();
    return $rows;
  }

}//class

$table = "parent";
//$getrows = new GetRows($table);
//$rows = $getrows->getAll();
//$rows = GetRows::getAll($table);
//$rows = GetRows::getOne($table);
$rows = GetRows::findText($table,"x");
print_r($rows);
