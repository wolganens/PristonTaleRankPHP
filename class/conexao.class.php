<?php
require_once('char.class.php');
class conexao
{
    private $db_host = 'localhost'; // servidor
    private $db_user = 'root'; // usuario do banco
    private $db_pass = 'vertrigo'; // senha do usuario do banco
    private $db_name = 'priston'; // nome do banco    
    private $con = false;

 
    public function connect(){
        if(!$this->con)        {
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);
            if($myconn)            {
                $seldb = @mysql_select_db($this->db_name,$myconn);
                if($seldb){
                    $this->con = true;
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return true;
        }
    }

 
    public function disconnect(){
        if($this->con){
            if(@mysql_close()){
                $this->con = false;
                return true;
            }
            else{
                return false;
            }
        }
    }
    
    public function insert($charList){
            
            $charList = $charList->getCharInfo();

            foreach($charList as $value){

                $charName  = $value[0]->getCharName();
                $charLevel = $value[0]->getCharLevel();
                $id_class  = $value[0]->getCharClass();

                $query = mysql_query( "SELECT 'charName' FROM rank WHERE 'charName' = '$charName' "); 
                
                if(mysql_num_rows($query) > 0){ 
                   mysql_query("UPDATE rank SET charLevel = $charLevel
                        WHERE 'charName' = '$charName'");
                }
                else{
                    $sql = "INSERT INTO rank (charName, charLevel, Id_class) VALUES ('$charName', $charLevel, $id_class)";
                    
                    if (!mysql_query($sql)){
                        die('Error: ' . mysql_error());
                    }
                        echo $charName. " adicionado ao ranking com sucesso<br/>";  
                }
            }            
    }
}
?>
