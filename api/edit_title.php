<?php
include_once "base.php";

dd($_POST);

foreach($_POST['id'] as $idx => $id){
    $row=$Title->find($id);
    $row['text']=$_POST['text'][$idx];
    $Title->save($row);
}

$row1=$Title->find($_POST['sh']);
foreach($_POST['id'] as $id){
    $row2=$Title->find($id);
    $row2['sh']=0;
    $Title->save($row2);
}

$row1['sh']=1;
$Title->save($row1);

foreach($_POST['del'] as $id){
    $Title->del($id);
}

to("../back.php?do=title");
?>