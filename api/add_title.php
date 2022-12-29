<?php
include "base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
}

$text=$_POST['text'];

$Title->save(['img'=>$img,'text'=>$text,'sh'=>0]);
to('../back.php?do=title');



?>