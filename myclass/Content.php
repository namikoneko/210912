<?php
require_once "Html.php";
require_once "Header.php";
require_once "Footer.php";

class Content extends Html
{
//  private $str;
  private $content;

  public function __construct($str)
  {
//    $content = <<<EOD
//      content
//EOD;
    $this->content = $str;
    //$this->content = $content;

  }

  public function output()
  {
    $str = "";
    $header = new Header();
    $str .= $header->output();

    $str .= $this->content;

    $footer = new Footer();
    $str .= $footer->output();

    echo $str;
  }

}

$content = new Content();
$content->output();
