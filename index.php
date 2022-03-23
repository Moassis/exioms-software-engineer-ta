<?php
$a=array();
for($i=1; $i<=100; $i++){
    if($i==57){ // put any value that you want to miss as I have written here 57.
        continue;
    }
    $a[]=$i;
}
echo "Original_Array:".implode(',',$a)."\n";

for($i=1; $i<=100; $i++){
    if($i!=intval($a[($i-1)])){
        break;
    }
}
echo "Missing Value: "."$i";
?>