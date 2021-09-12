<?php
//require_once "ShowRow.php";

//class ShowRowTitle extends ShowRow
class ShowRowTitle
{
  private $rows;
  private $showRows;
  private $showColArray;
  private $strArray;

  public function __construct($table, $showColArray)
  {
    $this->getRows($table);
    //$this->rows = ORM::for_table($table)->find_array();
    $this->showColArray = $showColArray;
    $this->makeStrArray();
  }

// ここは適宜オーバーライドする
  private function getRows($table)
  {
    $this->rows = ORM::for_table($table)->find_array();
  }

//メインルーチン的
  private function makeStrArray()
  {
    $rows = $this->rows;

    foreach($rows as $row)
    {
//3rdsuccess
//2ndsuccess
      $this->makeColArray($row);
//      foreach($this->showColArray as $showCol)
//      {
//          $this->strArray[$showCol] = $row[$showCol];//すべてのカラムを配列に入れる
//
//	  if($showCol == "title")//カラム名がこれのとき，再度入れ直している
//	  {
//            $this->strArray[$showCol] = $this->makeColLink($row, $showCol);
//	  }
//      }

//1stsuccess
//      $this->strArray["title"] = $row["title"];
//      $this->strArray["text"] = $row["text"];

      $id = $row["id"];
      $linkHtmlArray = $this->makeLink($id);
      $this->strArray = array_merge($this->strArray, $linkHtmlArray);

//      $linkhtml = new LinkHtml();
//      $this->strArray["updLink"] = $linkhtml->upd($id);
//      $this->strArray["delLink"] = $linkhtml->del($id);
      $this->showRows[] = $this->strArray;
    }//foreach
//    return $this->showRows;
  }//method

// ここは適宜オーバーライドする
  private function makeColArray($row)
  {
    foreach($this->showColArray as $showCol)
    {
        $this->strArray[$showCol] = $row[$showCol];//すべてのカラムを配列に入れる

        //第3引数はchoiceしたカラム，再度入れ直している
        $this->choiceLinkCol($row,$showCol,"title");

//        if($showCol == "title")//カラム名がこれのとき，再度入れ直している
//        {
//          $this->strArray[$showCol] = $this->makeColLink($row, $showCol);
//        }
    }
    //return $this->strArray;
  }

  private function choiceLinkCol($row,$showCol,$choiceCol)
  {
    if($showCol == $choiceCol)//カラム名がこれのとき，再度入れ直している
    {
        $this->strArray[$showCol] = $this->makeColLink($row, $showCol);
    }
  }

  private function makeColLink($row,$showCol)
  {
    $childStr = "child";
    $id = $row["id"];
    $linkStr = $row[$showCol];
    //$linkStr = $row["title"];//titleの場合
    $linkhtml = new LinkHtml();
    $linkHtmlArray = $linkhtml->general($id, $childStr, $linkStr);
    return $linkHtmlArray;
  }

  private function makeLink($id)
  {
    $linkhtml = new LinkHtml();
    $linkHtmlArray["updLink"] = $linkhtml->upd($id);
    $linkHtmlArray["delLink"] = $linkhtml->del($id);
    return $linkHtmlArray;
  }


  public function output()
  {
    return $this->showRows;
  }//method

}//class

//$getrow = new GetRowParent();
//$rows = $getrow->output();
//$showrowtitle = new ShowRowTitle($rows);
//$showrowtitle->output();
//$str = $showrowtitle->output();
//echo $str;
