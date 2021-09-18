<?php

//class ShowRowFind
class ShowRowFind extends ShowRowTitle
{

// ここは適宜オーバーライドする
  public function getRows($table)
  {
    $this->rows = ORM::for_table($table)->order_by_desc("id")->find_array();
    //$this->rows = ORM::for_table($table)->find_array();
//    $id = Flight::request()->query['id'];
//    echo $id;
  }

}
