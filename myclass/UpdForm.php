<?php
require_once "Html.php";

class UpdForm extends Html
{
  protected $str;

  public function __construct($inputForm, $actionUrl, $id)
  {
//  $getrowone = new GetRowOne($id);
//  $row = $getrowone->output(); 

    $str = <<<EOD
      <form action="{$actionUrl}" method="post">
        {$inputForm}
        <input type="submit" value="send">
      </form>
EOD;
    $this->str = $str;

  }
    //<input type="text" name="title">

  public function output()
  {
    echo $this->str;
    //return $this->str;
  }
}

//$inputForm =  <<<EOD
//  <input type="text" name="title">
//EOD;
//$insform = new InsForm($inputForm);
//echo $insform->output();
