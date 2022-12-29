<?php
include "base.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $img=$_FILES['img']['name'];
}
$Mvim->save(['img'=>$img,'sh'=>1]);
to('../back.php?do=mvim');
?>