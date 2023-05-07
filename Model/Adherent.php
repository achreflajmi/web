<?php
class reclamation
{
	private $id = null;
	private $nom = null;
	private $description = null;
	private $email = null;



	function __construct($id, $nom, $description, $email)
	{
		$this->id = $id;
		$this->nom = $nom;
		$this->description = $description;

		$this->email = $email;

	}

	function getid()
	{
		return $this->id;
	}

	function getnom()
	{
		return $this->nom;
	}

	function getdescription()
	{
		return $this->description;
	}


	function getemail()
	{
		return $this->email;
	}


	function setnom(string $nom)
	{
		$this->nom = $nom;
	}

	function setdescription(string $description)
	{
		$this->description = $description;
	}



	function setemail(string $email)
	{
		$this->email = $email;
	}

}

?>