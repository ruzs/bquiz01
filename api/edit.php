<?php
include_once "base.php";

//dd($_POST);
$table = $_POST['table'];

foreach ($_POST['id'] as $idx => $id) {
  if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
    $$table->del($id);
  } else {
    $row = $$table->find($id);
    switch ($table) {
      case "Title":
        $row['text'] = $_POST['text'][$idx];
        $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
        break;
      case "Admin":
        $row['acc']=$_POST['acc'][$idx];
        $row['pw']=$_POST['pw'][$idx];
        break;
      case "Menu":
        $row['name']=$_POST['name'][$idx];
        $row['href']=$_POST['href'][$idx];
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        break;
      default:
        if(isset($_POST['text'])){
          $row['text']=$_POST['text'][$idx];}
          $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
    }
    $$table->save($row);
  }
}

to("../back.php?do=" . lcfirst($table));
//lcfirst()=把字符串中的首字符轉換為小寫
?>