<?php

//class UpdFormPartial
class UpdFormPartial extends InsFormPartial
{
//  protected $str;
  protected $row;
  protected $typeTextStr = <<<EOD
          <input type="text" name="nameStr" value="valStr">
EOD;
  protected $textareaStr =  <<<EOD
          <textarea name="nameStr">valStr</textarea>
EOD;

  public function __construct($formArray, $table, $id)
  {
    //$row = ORM::for_table($table)->where("id", $id)->find_array();
    //$this->row = $row[0];//find_arrayは二次元配列なので先頭行のみは[0]をつける
    $this->getRow($table, $id);
    $str = <<<EOD
        <input type="hidden" name="id" value="{$id}">
EOD;
    $this->strArray["hiddenId"] =  $str;
    parent::__construct($formArray);

  }//construct

  private function getRow($table, $id)
  {
    $this->row = ORM::for_table($table)->find_one($id)->as_array();
  }

  protected function replaceValue($formItem, $str)
  {
    $col = $formItem["col"];
    $str = str_replace("valStr", $this->row["{$col}"], $str);
    return $str;
  }//method

}//class

//  private function formTypeText($formItem)
//  {
//    if($formItem["type"] == "typeText"){
//      $str = <<<EOD
//          <input type="text" name="nameStr" value="valStr">
//EOD;
//      $this->replaceStr($formItem, $str);
////      $str = str_replace("nameStr",$formItem["name"],$str);
////      $col = $formItem["col"];
////      $str = str_replace("valStr", $this->row["{$col}"], $str);
////      $this->str .=  $str;
//      return;
//    }//if
//      $str = $this->formTextArea($formItem);
//      return $str;
//  }

//  private function formTextArea($formItem)
//  {
//    if($formItem["type"] == "textarea"){
//      $str = <<<EOD
//          <textarea name="nameStr" value="valStr">
//EOD;
//      $this->replaceStr($formItem, $str);
////      $str = str_replace("nameStr",$formItem["name"],$str);
////      $col = $formItem["col"];
////      $str = str_replace("valStr", $this->row["{$col}"], $str);
////      $this->str .=  $str;
//    }//if
//  }//method

//  private function replaceStr($formItem, $str)
//  {
//      $str = str_replace("nameStr",$formItem["name"],$str);
//      $col = $formItem["col"];
//      $str = str_replace("valStr", $this->row["{$col}"], $str);
//      $this->str .=  $str;
//  }//method


//$formArray = [
//    //["type" => "typeText", "name" => "xxx", "col" => "xxy"],
//    ["type" => "textarea", "name" => "text", "col" => "id"],
//];
//$updformpartial = new UpdFormPartial($formArray, 1);
//echo $updformpartial->output();
