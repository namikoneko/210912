<?php
//require_once '../libs/flight/Flight.php';
//require_once './myclass/InsExe.php';
//require_once './myclass/InsForm.php';
//require_once './myclass/GetRowParent.php';
//require_once './myclass/ShowRowTitle.php';
//require_once './myclass/ShowRowFind.php';
//require_once './myclass/LinkHtml.php';
//require_once './myclass/Header.php';
//require_once './myclass/Facade.php';

Flight::route("/", function(){
  rootUrl();
});

Flight::route("/find", function(){
  $table = "parent";
  $showColArray = ["title","text"];
  $facade = new Facade($table, $showColArray);
  $facade->switchExe();
//  Facade::switchExe();
  //$q = Flight::request()->query['q'];
  //echo $q;
  //rootUrl($q);
});

function rootUrl($q = "none")
{
//$dirname = "210905";

$header = new Header();
echo $header->output();

  //echo $q;
//ins-form作成
  $formArray = [
    ["type" => "typeText", "name" => "title", "col" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "col" => "text", "showKey" => "text"],
  ];
  $insformpartial = new InsFormPartial($formArray);
  $strArray = $insformpartial->output();
  $actionUrl = "./insexe"; 
  //$actionUrl = "{$dirname}/insexe"; 
  $insform = new InsForm($strArray, $actionUrl);
  $strArray = $insform->output();
//  print_r($strArray);
  echo $strArray["top"]; 
  echo $strArray["title"]; 
  echo $strArray["text"]; 
  echo $strArray["submitBtn"]; 
  echo $strArray["last"]; 

//rowをshow
  $table = "parent";
  $showColArray = ["title","text"];
  //$showrowtitle = new ShowRowFind($table, $showColArray);
  //$showrowtitle = new ShowRowTitle($table, $showColArray);

  $facade = new Facade($table, $showColArray);
  //$facade->switchExe();
  //Facade::switchExe();
  $showrowtitle = $facade->switchExe();

  $showRows = $showrowtitle->output();
  foreach($showRows as $showRow)
  {
//  print_r($showRow);
    echo $showRow["title"];
    echo "  ";
    echo $showRow["text"];
//    echo "  ";
//    echo $showRow["updLink"];
//    echo "  ";
//    echo $showRow["delLink"];
    echo "<br>";
  }
}//rootUrl
//});

Flight::route("/insexe", function(){
  $table = "parent";
  $formArray = [
      ["type" => "typeText", "name" => "title", "col" => "title"],
      ["type" => "textarea", "name" => "text", "col" => "text"],
  //    ["type" => "textarea", "name" => "text", "col" => "text"],
  ];
  new InsExe($formArray,$table);
  Flight::redirect('/');
});


Flight::route("/upd/exe", function(){
  $table = "parent";
  $formArray = [
    ["type" => "typeText", "name" => "title", "col" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "col" => "text", "showKey" => "text"],
  ];
  new UpdExe($formArray, $table);
  Flight::redirect('/');
});


Flight::route("/upd/@id", function($id){
  $table = "parent";
  $formArray = [
    ["type" => "typeText", "name" => "title", "col" => "title", "showKey" => "title"],
    ["type" => "textarea", "name" => "text", "col" => "text", "showKey" => "text"],
  ];
  $updformpartial = new UpdFormPartial($formArray, $table, $id);
  $inputForm = $updformpartial->output();
//  print_r($inputForm);
  $actionUrl = "./exe"; 
  $updform  = new InsForm($inputForm, $actionUrl);
  $strArray = $updform->output();
//  print_r($strArray);
  echo $strArray["top"]; 
  echo $strArray["hiddenId"]; 
  echo $strArray["title"]; 
  echo $strArray["text"]; 
  echo $strArray["submitBtn"]; 
  echo $strArray["last"]; 
});






Flight::route("/del/@id", function($id){
  $table = "parent";
  Del::exe($table, $id);
  Flight::redirect('/');
});

Flight::route("/test2", function(){
//echo "test";
  $s = new ShowRowFind();
  $s->getRows();
//$id = Flight::request()->query['id'];
//echo $id;

//  $row = ORM::for_table('parent')->find_one(1)->as_array();
////  print_r($row);
//  echo $row["title"];
//  echo hoge();
});

function hoge()
{
  echo "hoge";
}
