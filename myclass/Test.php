<?php

class Test
{
  private $str;

  public function __construct()
  {
    $this->str = $this->myReturn();
  }


  private function myReturn()
  {
    $str = "hoge";
    return $str;
  }

  public function output()
  {
    return $this->str;
  }
}

$test = new Test();
echo $test->output();
