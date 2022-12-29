<?php
$array=['a','b','c','d'];
foreach($array as $k => $v){
    $$v=($k+1)*10;
    echo ($k+1)*10;
}
echo "<hr>";
echo $a;
echo $b;
echo $c;
/* $var2="var1";
//echo $var1="hello";
echo $var2;
$$var2='hello';
echo $var2;
echo $var1; */