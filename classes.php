<?php

class Korisnik{
    public $userID = '';
    public $password = '';

    public function __construct($id,$pass){
       $userID = $id;
       $password = $pass;
	}

}

class Gradjanin extends Korisnik{
    static function kreirajGradjanina($id,$pass,$imePrezime,$email, $connection){
		$createUser = "INSERT INTO users(username, PASSWORD) VALUES('$id','$pass')";
        $createGradjanin = "INSERT INTO gradjani(username, email, imeprezime) VALUES('$id','$email',
        '$imePrezime')";
        $connection->query($createUser);
        $connection->query($createGradjanin);     
	}
    public $imePrezime;
    public $email;
    public function __construct($id,$pass,$imePrezime,$email){
        parent::__construct($id, $pass);
        $this->imePrezime = $imePrezime;
        $this->email = $email;
	}

}

?>