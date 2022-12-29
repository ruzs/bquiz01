<?php
include_once "base.php";

//dd($_POST);
$table=$_POST['table'];
foreach($_POST['id'] as $idx =>$id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Title->del($id);
    }else{
        $row=$$table->find($id);

        $row['text']=$_POST['text'][$idx];
        $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;

        $$table->save($row);
    }
}

to("../back.php?do=".lcfirst($table));
?>