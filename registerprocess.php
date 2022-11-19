<?php 

try{
    require("classes.php");
}
catch(Exception $exception){
    echo "Unable to load main components.";
}

try{$connection = new mysqli("localhost","root","","mysql");} 
catch(Exception $exception){echo "Error connecting to database. Try later.";exit();}



if(isset($_POST['usernameRegister'])){
$gradjanin = new Gradjanin($_POST['usernameRegister'], $_POST['passwordRegister'], $_POST['nameRegister'], $_POST['emailRegister']);
Gradjanin::kreirajGradjanina($_POST['usernameRegister'], $_POST['passwordRegister'], $_POST['nameRegister'], $_POST['emailRegister'], $connection);
}
else {
    echo "Greska pri ucitavanju podataka iz sesije.";
}

?>