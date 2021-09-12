<?php
//require_once "GetRow.php";

abstract class ShowRow
{
  protected $rows;

  public function __construct($rows)
  {
    $this->rows = $rows;
//    $getrow = new GetRow();
//    $this->rows = $getrow->output();
  }

  protected abstract function output();
//  public function output()
//  {
//    $str = "";
//    $rows = $this->rows;
//    foreach($rows as $row)
//    {
//      $str .= $row["title"];
//      $str .= "<br>";
//    }
//    return $str;
//  }
}

//$showrow = new ShowRow();
//$str = $showrow->output();
//echo $str;

//$rows = $showrow->output();
//echo $rows[1]["title"];
