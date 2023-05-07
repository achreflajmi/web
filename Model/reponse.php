<?php
class reponse
{
	private $id = null;
	private $id_reclamation = null;
	private $texte = null;




	function __construct($id, $texte, $id_reclamation)
	{
		$this->id = $id;
		$this->texte = $texte;
		$this->id_reclamation = $id_reclamation;



	}

	function getid()
	{
		return $this->id;
	}

	function getid_reclamation()
	{
		return $this->id_reclamation;
	}

	function gettexte()
	{
		return $this->texte;
	}





	function setid_reclamation(string $id_reclamation)
	{
		$this->id_reclamation = $id_reclamation;
	}

	function settexte(string $texte)
	{
		$this->texte = $texte;
	}




}

?>