<?php
//require_once "GetRow.php";

class GetRowParent
{
  public $rows;

  public function __construct()
  {
    $this->rows = ORM::for_table("parent")->find_array();
  }

  public function output()
  {
    return $this->rows;
  }
}
