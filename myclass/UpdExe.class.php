<?php
//require_once "GetRowOne.php";
//require_once '../../libs/flight/Flight.php';
require_once '../libs/flight/Flight.php';
//require_once '../../libs/idiorm.php';
require_once '../libs/idiorm.php';
//ORM::configure('sqlite:../data.db');
ORM::configure('sqlite:./data.db');
ORM::configure('return_result_sets', true);

class UpdExe
{
  protected $row;

  public function __construct($formArray, $table)
  {
//    $id = Flight::request()->data->id;
//    $this->row = ORM::for_table($table)->find_one($id);
    $this->getRow($table);
    $this->exe($formArray);
//    $getrowone = new GetRowOne($id);
//    $this->row = $getrowone->rows[0];

//    foreach($formArray as $formItem)
//    {
//      $name = $formItem["name"];
//      $col = $formItem["col"];
//      //$this->row->$col = $name;
//      $this->row->$col = Flight::request()->data->$name;
//    }//foreach
//      $this->row->save();
  }//construct

  private function getRow($table)
  {
    $id = Flight::request()->data->id;
    $this->row = ORM::for_table($table)->find_one($id);
  }

  private function exe($formArray)
  {
    foreach($formArray as $formItem)
    {
      $name = $formItem["name"];
      $col = $formItem["col"];
      //$this->row->$col = $name;
      $this->row->$col = Flight::request()->data->$name;
    }//foreach
      $this->row->save();

  }
}//class

//$formArray = [
//    //["type" => "typeText", "name" => "xxx", "col" => "xxy"],
//    ["type" => "typeText", "name" => "title", "col" => "title"],
//    ["type" => "textarea", "name" => "text", "col" => "text"]
//];
//$insexe = new InsExe($formArray);
//$rows = $insrow->output();
//echo $rows[0]["title"];
//echo $rows[1]["title"];
//echo $rows[2]["title"];
