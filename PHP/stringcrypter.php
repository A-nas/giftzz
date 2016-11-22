<?php
// a ameliorer mail@example.dom => m**l@e*****e.dom
function showHidenEmail($mail){
return preg_replace('/(?<=.).(?=.*@)/u','*',$mail);
}
?>