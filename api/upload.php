<?php
include_once "base.php";
$table=$_POST['table'];

$row=$$table->find($_POST['id']);

if(!empty($_FILES['img']['tmp_name'])){
  move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
  $row['img']=$_FILES['img']['name'];
  $$table->save($row);
  //上傳的檔案會強制先傳XAMPP的某個檔案夾
  //if這段程式是在把檔案從XAMPP的檔案夾轉移到我們指定的路徑
  //並且在最後儲存進資料庫
}

to("../back.php?do=".lcfirst($table));
?>