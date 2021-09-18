<?php
namespace testDir;

class Test
{
  private $str;

  public function __construct($str)
  {
    $this->str = $str;
  }


//  private function myReturn()
//  {
//    $str = "hoge";
//    return $str;
//  }
//
  public function output()
  {
    return $this->str;
    //return $this->str;
  }
}
//
//$test = new Test();
//echo $test->output();
