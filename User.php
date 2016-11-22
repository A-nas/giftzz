<?php
class User{
	private  $username;
	private  $email;
	
	// init new user.
	function __CONSTRUCT($username,$email){
		$this->username = $username;
		$this->email = $email;
	}
	
	public function getUserName(){
		return $this->username;
	}
	
    public function getEmail(){
		return $this->email;
	}
	
	public function display(){
		echo "User: ".$this->username." Email: ".$this->email;
	}
}
// user x - passer vers PDO -  

//************* TEST ***************
// affichage adequat avec toUppeer
//$user = new User('Anas','ANAS.LAGHOUAOUTA@HOTMAIL.FR');
//$user->getEmail();
//$user->display();
//************ END TEST *************

?>