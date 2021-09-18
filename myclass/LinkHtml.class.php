<?php

class LinkHtml
{
//  private $str;

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

  public function general($id, $childStr, $linkStr)
  {
    $hrefStr = $this->hrefStr($childStr, $id);
    $str = "";
    $str .= "<a href='hrefStr'>{$linkStr}</a>";
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
    //return $this->str;
    //echo $this->str;
  }

}
