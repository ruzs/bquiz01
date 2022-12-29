<?php
include_once "base.php";

$row=$Title->find($_POST['id']);

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
    $Title->save($row);
}

to("../back.php?do=title");
?>