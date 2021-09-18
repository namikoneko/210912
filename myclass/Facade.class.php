<?php

class Facade
{
  private $q;
  private $table;
  private $showColArray;

  public function __construct($table, $showColArray)
  {
    $this->q = Flight::request()->query['q'];
    $this->table = $table;
    $this->showColArray = $showColArray;
  }

  public function switchExe()
  {
//    echo "switchExe2";
    return $this->switchNone();
//    echo $this->q;
  }

  private function switchNone()
  {
    if($this->q == "")
    {
//      echo "switchNone";
//      echo $this->q;
//      return;

     $showrowtitle = new ShowRowTitle($this->table, $this->showColArray);
     return $showrowtitle;
    }
    $this->switchFind();
  }

  private function switchFind()
  {
      echo $this->q;
      return;
//      $showrowtitle = new ShowRowFind($this->table, $this->showColArray);
//      return $showrowtitle;

  }

}
