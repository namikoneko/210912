<?php
//require_once '../../libs/flight/Flight.php';
require_once '../libs/flight/Flight.php';
//require_once '../../libs/idiorm.php';
require_once '../libs/idiorm.php';
//ORM::configure('sqlite:../data.db');
ORM::configure('sqlite:./data.db');
ORM::configure('return_result_sets', true);

class InsExe
{
  protected $row;

  public function __construct($formArray)
  {
    $this->row = ORM::for_table("parent")->create();
    foreach($formArray as $formItem)
    {
      $name = $formItem["name"];
      $col = $formItem["col"];
      //$this->row->$col = $name;
      $this->row->$col = Flight::request()->data->$name;
    }//foreach
      $this->row->save();
      //header('Location: http://localhost/210905/');
    //$this->str = $str;
  }//construct

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
