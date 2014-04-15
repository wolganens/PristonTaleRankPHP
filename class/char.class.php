<?php 
class char{
	private $charName  = "";
	private $charLevel = 0;
	private $charClass = 0;

	function __construct($name,$level,$class){
		$this->setCharName($name);
		$this->setCharLevel($level);
		$this->setCharClass ($class);
	}

    public function setCharName($name){
    	if($name == null){
    		$this->charName = "no";
    	}
    	else{
    		$this->charName = $name;
    	}
    }
    public function setCharLevel($level){
        if ($level == null) {
            $this->charLevel = 0;
        }
        else{
    	   $this->charLevel = $level;
        }
    }
    public function setCharClass($class){
        if ($class == null) {
            $this->charClass = 1;
        }
        else{
           $this->charClass = $class;
        }    	
    }

    public function getCharName(){
    	return $this->charName;
    }
    public function getCharLevel(){
    	return $this->charLevel;
    }
    public function getCharClass(){
    	return $this->charClass;
    }
}
?>
