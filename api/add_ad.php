<?php
include "base.php";

$Ad->save(['text'=>$_POST['text'],'sh'=>1]);
to('../back.php?do=ad');

?>