<?php
function countproduct($array)
{
	$ar_array=array();
	foreach(array_unique($array) as $value){
		$count=0;
		foreach($array as $element){
			if($element==$value){
				$count++;
			}
		}
		$ar_array[$value]=$count;
	}
	return $ar_array;
}
?>