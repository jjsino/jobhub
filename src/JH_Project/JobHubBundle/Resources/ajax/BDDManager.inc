<?php
class BDDManager {
        
	    var $host="localhost";
        var $user="root";
        var $passwd="j8mt5bg3";
        var $bddName="geo_plugin";
	
        var $isConnected=false;

	public function __construct() {
	   $num_args=func_num_args();
	   switch ($num_args) {
	      case 3:{
		      	$this->host=func_get_arg(0);
				$this->user=func_get_arg(1);
				$this->passwd=func_get_arg(2);
	      };break;
	   }
	}	
	function query($aQuery){		
		$result = mysql_query($aQuery);
		return $result;
	}	
	function connectBDD(){
		if(!$this->isConnected)
		{			
			mysql_connect($this->host,$this->user,$this->passwd) or die("erreur de connexion au serveur $this->host");
			mysql_select_db($this->bddName) or die("erreur de connexion a la base de donnees");
			$this->isConnected=true;			
		}
	}	
	function isConnected(){
		return $this->isConnected;
	}
}
GLOBAL $bdd;
$bdd = new BDDManager();
?>
