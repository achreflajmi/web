
<?php
	class Price
	{
		private $id=null;
		private $nvPrix=null;
		private $formulaire_id=null;
		
		
		
		
		function __construct($id, $nvPrix, $formulaire_id){
			$this->id=$id;
			$this->nvPrix=$nvPrix;
			$this->formulaire_id=$formulaire_id;
            
			
		}
		
		function getid(){
			return $this->id;
		}
		
		function getnvPrix(){
			return $this->nvPrix;
		}
		
		function getformulaire_id(){
			return $this->formulaire_id;
		}
		
		
		

		function setnvPrix(string $nvPrix){
			$this->nvPrix=$nvPrix;
		}
		
		function setformulaire_id(string $formulaire_id){
			$this->formulaire_id=$formulaire_id;
		}
		
	
		
		
		
	}

?>