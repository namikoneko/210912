<?php
//require_once "GetRow.php";

//class GetRowChild extends GetRow
class GetRowChild
{
  public function __construct()
  {
    $this->rows = ORM::for_table("child")->find_array();
  }

}

$getrow = new GetRowChild();
$rows = $getrow->output();
echo $rows[0]["title"];
