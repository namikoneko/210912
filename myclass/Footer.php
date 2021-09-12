<?php
require_once "Html.php";

class Footer extends Html
{
  private $str;

  public function __construct()
  {
   $str = <<<EOD
      </body>
      </html>
 EOD;
     $this->str = $str;
  }

  public function output()
  {
    return $this->str;
    //echo $this->str;
  }

}

//$footer = new Footer();
//$footer->output();
