<?php

class InsFormPartial extends Html
{
  //protected $str;
  protected $strArray = [];
  protected $typeTextStr = <<<EOD
    <input type="text" name="nameStr">
EOD;
  protected $textareaStr =  <<<EOD
    <textarea name="nameStr"></textarea>
EOD;

  public function __construct($formArray)
  {
    $str = "";
    foreach($formArray as $formItem){
      $str = $this->formTypeText($formItem);

      $showKey = $formItem["showKey"];
      $this->strArray[$showKey] =  $str;
    }//foreach
  }//construct

  protected function formTypeText($formItem)
  {
    if($formItem["type"] == "typeText"){
//      $str = <<<EOD
//          <input type="text" name="nameStr">
//EOD;
      $str = $this->typeTextStr;
      $str = $this->replaceName($formItem, $str);
      $str = $this->replaceValue($formItem, $str);
//        $str = str_replace("nameStr",$formItem["name"],$str);
      return $str;
	//$this->str =  $str;
    }//if
    $str = $this->formTextArea($formItem);//コンストラクタに置くと上書きされる
    return $str;
  }//method

  protected function formTextArea($formItem)
  {
    if($formItem["type"] == "textarea"){
//      $str = <<<EOD
//          <textarea name="nameStr"></textarea>
//EOD;
      $str = $this->textareaStr;
      $str = $this->replaceName($formItem, $str);
      $str = $this->replaceValue($formItem, $str);
      return $str;
//      $str = str_replace("nameStr",$formItem["name"],$str);
	//$this->str .=  $str;
    }//if
  }//method


  protected function replaceName($formItem, $str)
  {
    $str = str_replace("nameStr",$formItem["name"],$str);
    return $str;
  }//method

  protected function replaceValue($formItem, $str)
  {
    return $str;
  }//method

  public function output()
  {
    return $this->strArray;
    //return $this->str;
  }
}

//$formArray = [
//    ["type" => "typeText", "name" => "xxx"],
//    ["type" => "textarea", "name" => "yyy"],
//    ["type" => "textarea", "name" => "zzz"],
//];
//$insformpartial = new InsFormPartial($formArray);
//echo $insformpartial->output();
