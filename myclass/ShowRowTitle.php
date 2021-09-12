<?php
//require_once "ShowRow.php";

//class ShowRowTitle extends ShowRow
class ShowRowTitle
{
  private $rows;
  private $showRows;
  private $showColArray;

  //private $strArray = [];

  //public function __construct($rows)
  //public function __construct($table)
  public function __construct($table, $showColArray)
  {
    $this->rows = ORM::for_table($table)->find_array();
    $this->showColArray = $showColArray;
  }

  private function makeShowArray($row)
  {
    foreach($this->showColArray as $showCol)
    {
      $strArray[$showCol] = $row[$showCol];
    }
    return $strArray;
  }

  private function makeLink($id)
  {
    $linkhtml = new LinkHtml();
    $linkHtmlArray["updLink"] = $linkhtml->upd($id);
    $linkHtmlArray["delLink"] = $linkhtml->del($id);
    return $linkHtmlArray;
  }

  private function makeStrArray()
  {
    $rows = $this->rows;

    foreach($rows as $row)
    {
      $strArray = $this->makeShowArray($row);
      //$str .= $row["title"];
//      foreach($this->showColArray as $showCol)
//      {
//        $strArray[$showCol] = $row[$showCol];
//      }
//      $strArray["title"] = $row["title"];
//      $strArray["text"] = $row["text"];
      //$str .= "  ";

      //$hrefStr = "";
      $id = $row["id"];
      $linkHtmlArray = $this->makeLink($id);
      $strArray = array_merge($strArray, $linkHtmlArray);

//      $linkhtml = new LinkHtml();
//      $strArray["updLink"] = $linkhtml->upd($id);
//      $strArray["delLink"] = $linkhtml->del($id);
      $this->showRows[] = $strArray;
    }
//    return $this->showRows;
  }//method

  public function output()
  {
    $this->makeStrArray();
    return $this->showRows;
  }//method

}//class

//$getrow = new GetRowParent();
//$rows = $getrow->output();
//$showrowtitle = new ShowRowTitle($rows);
//$showrowtitle->output();
//$str = $showrowtitle->output();
//echo $str;
