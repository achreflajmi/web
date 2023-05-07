<?php 
class user {
    private $id=null;
    private $uname=null;
    private $email=null;
    private $pswd=null;
    private $dateN=null;
    private $image=null;
    public function __construct(string $uname,string $email,string $pswd, string $dateN,string $image)
    {
        $this->uname = $uname;
        $this->email = $email;
        $this->pswd = $pswd;
        $this->dateN = $dateN;
        $this->image = $image;
    }
    // Getters 
    function getId(){
        return $this->id;
    }
    public function getUname()
    {
        return $this->uname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPswd()
    {
        return $this->pswd;
    }
    public function getdateN()
    {
        return $this->dateN;
    }
    public function getImage()
    {
        return $this->image;
    }
    // Setters
    public function setUname($uname)
    {
        $this->uname = $uname;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPswd($pswd)
    {
        $this->pswd = $pswd;
    }
    public function setdateN($dateN)
    {
        $this->dateN = $dateN;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }
    


}
?>