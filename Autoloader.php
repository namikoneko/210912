<?php

spl_autoload_register(function($name){
  if($name === "Flight" or substr($name,0,6) === "flight"){
    require_once '../libs/flight/Flight.php';
    return;
  }
  myclass($name);
  //mydirname($name);
});

//  function mydirname($name){
//    if($name === "Dirname"){
//      require_once "./{$name}.php";
//      return;
//    }
//    myclass($name);
//  }
  //}else{
  //require_once "../210821class/{$name}.php";
  function myclass($name){
    require_once "./myclass/{$name}.php";
  }
