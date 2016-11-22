<?php
class Objet{
public $table;
public function find_one($fields=null){
	if($fields==null )
	{
	   $fields="*";
    }
	$sql=mysql_query("select $fields from ".$this->table." where COD_ARTICLE = ".$this->COD_ARTICLE);
	if ($data=mysql_fetch_assoc($sql)){foreach ($data as $k=>$v){
	$this->$k=$v;
	}
	return true;}
	else 
	 {
		echo '<script type="text/javascript">alert("erreur 404 !");</script>'; 
		return false;
	} 
	}
	public static  function instance($name=null){
		require_once $name.'.php';
		return new $name();
	}
}
?>