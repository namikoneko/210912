<?php
//require_once '../../libs/idiorm.php';
//ORM::configure('sqlite:../data.db');

//class GetRowOne extends GetRow
class GetRowOne
{
  //private $row;

  public function __construct($id)
  {
    $this->rows = ORM::for_table("parent")->where("id", $id)->find_array();
  }

}

//$getrow = new GetRowOne(1);
//$rows = $getrow->output();
//echo $rows[0]["title"];
