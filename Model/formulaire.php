
<?php
	class formulaire
	{
		private $id=null;
		private $host=null;
		private $nomEvent=null;
		private $date_d=null;
        private $date_f=null;
        private $lieu=null;
        private $categorie=null;
        private $description=null;
        private $programmation=null;
        private $affiche=null;
        private $numTel=null;
		private $email=null;
		private $prix=null;
		
		
		
		function __construct($host, $nomEvent, $date_d, $date_f, $lieu, $categorie, $programmation, $description,  $affiche, $numTel, $email, $prix){
			$this->host=$host;
			$this->nomEvent=$nomEvent;
            $this->date_d=$date_d;
            $this->date_f=$date_f;
			$this->lieu=$lieu;
			$this->categorie=$categorie;
			$this->programmation=$programmation;
			$this->description=$description;
			$this->affiche=$affiche;
			$this->numTel=$numTel;
			$this->email=$email;
			$this->prix=$prix;
			
		}
		
		function getid(){
			return $this->id;
		}
		
		function gethost(){
			return $this->host;
		}
		
		function getnomEvent(){
			return $this->nomEvent;
		}
		
		
		function getdate_d(){
			return $this->date_d;
		}
		
        function getdate_f(){
			return $this->date_f;
		}
        function getlieu(){
			return $this->lieu;
		}
        function getcategorie(){
			return $this->categorie;
		}
        function getdescription(){
			return $this->description;
		}
        function getaffiche(){
			return $this->affiche;
		}
        function getnumTel(){
			return $this->numTel;
		}
        function getprogrammation(){
			return $this->programmation;
		}
		function getemail(){
			return $this->email;
		}
		function getprix(){
			return $this->prix;
		}
		

		function sethost(string $host){
			$this->host=$host;
		}
		
		function setnomEvent(string $nomEvent){
			$this->nomEvent=$nomEvent;
		}
		
	
		
		function setemail(string $email){
			$this->email=$email;
		}

        function setnumTel(int $numTel){
			$this->numTel=$numTel;
		}
        function setdate_d(string $date_d){
			$this->date_d=$date_d;
		}
        function setdate_f(string $date_f){
			$this->date_f=$date_f;
		}
        function setlieu(string $lieu){
			$this->lieu=$lieu;
		}
        function setcategorie(string $categorie){
			$this->categorie=$categorie;
		}
        function setdescription(string $description){
			$this->description=$description;
		}
        function setprogrammation(string $programmation){
			$this->programmation=$programmation;
		}
		function setaffiche(string $affiche){
			$this->affiche=$affiche;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		
	}

?>