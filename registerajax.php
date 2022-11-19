<?php
try{$connection = new mysqli("localhost","root","","mysql");} catch(Exception $exception){echo "Error connecting to database";exit();}

// uzima content iz http requesta
try{
$request = file_get_contents("php://input");
$object = json_decode($request);
}
catch(Exception $exception){
    echo "Error retreiving data from php";
}

// proverava koja funkcija je u pitanju
if($object->function == "checkUsername()"){
    checkUsername($object->value, $connection);
}
if($object->function == "checkEmail()"){
    checkEmail($object->value, $connection);
}



// funkcija za proveru usernamea u bazi
function checkUsername($username, $connection){
$resultObject = $connection->query("SELECT * from users WHERE username = '$username' ");
$resultString = mysqli_fetch_row($resultObject);
if(is_null($resultString)){echo "ok";} else{echo "notok";}
}

// funkcija za proveru usernamea u bazi
function checkEmail($email, $connection){
    $resultObject = $connection->query("SELECT * from gradjani WHERE email = '$email' ");
    $resultString = mysqli_fetch_row($resultObject);
    if(is_null($resultString)){echo "ok";} else{echo "notok";}
    }


?>