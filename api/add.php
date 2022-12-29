<?php
include "base.php";

$table=$_POST['table'];

$data=[];

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

switch($table){
    case "admin":
    break;
    case "menu":
    break;
    default:
    if(isset($_POST['text'])){
        $data['text']=$_POST['text'];
    }
    $data['sh']=($table=="Title")?0:1;

}

$$table->save($data);
to('../back.php?do='.lcfirst($table));



?>