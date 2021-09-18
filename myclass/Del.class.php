<?php
//require_once '../../libs/flight/Flight.php';
require_once '../libs/flight/Flight.php';
//require_once '../../libs/idiorm.php';
require_once '../libs/idiorm.php';
//ORM::configure('sqlite:../data.db');
ORM::configure('sqlite:./data.db');
ORM::configure('return_result_sets', true);

class Del
{

  public function exe($table, $id)
  {
    //$getrowone = new GetRowOne($id);
    $row = ORM::for_table($table)->find_one($id);
    $row->delete();
  }//method

}//class
