<?php
require_once "Html.php";

class Header extends Html
{
  private $str;
  private $cdnLink = <<<EOD
      <link rel="stylesheet" href="https://fonts.xz.style/serve/inter.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css">
EOD;

  public function __construct()
  {
   $str = <<<EOD
     <!doctype>
      <html>
      <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      {$this->cdnLink}
      </head>
      <body>
 EOD;
     $this->str = $str;

  }
      //<link rel="icon" href="/{$this->dirname}/favicon.svg" type="image/svg+xml">
      //<link rel="stylesheet" href="/{$this->dirname}/style.css">

  public function output()
  {
    return $this->str;
    //echo $this->str;
  }

}

//$header = new Header();
//$header->output();
