<?php
require_once('char.class.php');
class getCharInfo{
	private $charLevel;
	private $charClass;
	private $con;
	private $charList = array();

	function __construct(){
		$charList = array();
		$dataServer  = "C:\\New folder\\DataServer\\userdata\\"; 
		if (is_dir($dataServer)) {
		    if ($dh = opendir($dataServer)) {
		        while (($file = readdir($dh)) !== false) {		        
            	   $sub = $dataServer.$file."\\";
            	   if ($asd = opendir($sub)) {
	            	   	while ($satan = readdir($asd)) { 	            	   		
	            	   		if (is_file($sub.$satan)) {
	            	   			$this->charList[] = array(new char(substr($satan,0,strrpos($satan,'.')),$this->getLevel($sub.$satan),$this->getClass($sub.$satan)));	            	   			
	            	   		}	            	   			            	   		
	            	   	}
            	   	}
		        }
		        closedir($dh);
		    }
		}
		else{
			echo "<SCRIPT>alert(\"DataServer não encontrada\");</SCRIPT>";
			exit(1);
		}
		
		return $this->charList;
	}
	public function getLevel($dat){		
		$fr = fopen($dat, "rb");
		fseek($fr, 200);
		$charLevel = ord(strtolower(fread($fr,1)));	

		return $charLevel;
	}
	public function getClass($dat){
		$fr = fopen($dat, "rb");
		fseek($fr, 196);
		$charClass = ord(fread($fr,1));

		return $charClass;
	}

	public function getCharInfo(){
		return $this->charList;
	}
}
?>
