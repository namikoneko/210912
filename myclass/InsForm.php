<?php
require_once "Html.php";

class InsForm extends Html
{
  protected $str;
  protected $strArray = [];

  //public function __construct($inputForm, $actionUrl)
  public function __construct($strArrayPartial, $actionUrl)
  {
    $str = <<<EOD
      <form action="{$actionUrl}" method="post">
EOD;
    $this->strArray["top"] = $str;
    $this->strArray = array_merge($this->strArray,$strArrayPartial);
    $str = <<<EOD
        <input type="submit" value="send">
EOD;
    $this->strArray["submitBtn"] = $str;
    $str = <<<EOD
      </form>
EOD;
    $this->strArray["last"] = $str;

  }//construct

  public function output()
  {
    return $this->strArray;
    //echo $this->str;
    //return $this->str;
  }
}

//$inputForm =  <<<EOD
//  <input type="text" name="title">
//EOD;
//$insform = new InsForm($inputForm);
//echo $insform->output();
