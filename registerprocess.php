<?php 
session_start();
try{$connection = new mysqli("localhost","root","","mysql");} 
catch(Exception $exception){echo "Error connecting to database. Try later.";exit();}

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
        $createGradjanin = "INSERT INTO gradjani(userID, email, imeprezime) VALUES('$id','$email',
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


try{$connection = new mysqli("localhost","root","","mysql");} 
catch(Exception $exception){echo "Error connecting to database. Try later.";exit();}




if(isset($_POST['usernameRegister'])){
$gradjanin = new Gradjanin($_POST['usernameRegister'], $_POST['passwordRegister'], $_POST['nameRegister'], $_POST['emailRegister']);
Gradjanin::kreirajGradjanina($_POST['usernameRegister'], $_POST['passwordRegister'], $_POST['nameRegister'], $_POST['emailRegister'], $connection);
echo "done";
}
else {
    echo "Greska pri ucitavanju podataka iz sesije.";
}

?>