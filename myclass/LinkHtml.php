<?php
//require_once "Html.php";

class LinkHtml
{
  private $str;

  public function __construct()
  {

  }

  //public static function upd($hrefStr)
  public function upd($id)
  {
    $hrefStr = $this->hrefStr("upd", $id);
    $str = "";
    $str .= '<a href="hrefStr">update</a>';
    $str = str_replace("hrefStr", $hrefStr, $str);
    return $str;
  }

  //public static function del($hrefStr)
  public function del($id)
  {
    $hrefStr = $this->hrefStr("del", $id);
    $str = "";
    $str .= '<a href="hrefStr">delete</a>';
    $str = str_replace("hrefStr", $hrefStr, $str);
    return $str;
  }

  private function hrefStr($type, $id)
  {
    $str = "";
    $str .= "./{$type}/";
    $str .= $id;
    return $str;
  }//method

  public function output()
  {
    return $this->str;
    //echo $this->str;
  }

}
