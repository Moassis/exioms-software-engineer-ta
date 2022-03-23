<?php
function quick_sort($myArray){
    $left=$right=array();
    if (count($myArray)<2)
    {
        return $myArray;
    }
    $first=array_shift($myArray);
    foreach($myArray as $x){
        if($x<=$first){
            $left[]=$x;
        }
        else{
            $right[]=$x;
        }
    }
    return array_merge(quick_sort($left),array($first),quick_sort($right));
}
$myArray=array(23, 45, 12, 8, 87, 98);
echo 'Original Array : '.implode(',',$myArray)."\n";
$myArray=quick_sort($myArray);
echo "Sorted Array : ".implode(',',$myArray);
?>