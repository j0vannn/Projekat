<?php session_start() ?>
<html>
<head> <title> Welcome </title> </head>
<body>
<?php
$loginGood = false;
if(isset($_POST['username'])){
    try{
        $connection = new mysqli("localhost","root","","mysql");
    }
    catch(Exception $exception){
       echo "Error connecting to database";
       exit();
    }
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authenticationQuery = "SELECT username FROM users WHERE username = '$username' AND PASSWORD = '$password'";
        $queryResult = $connection->query($authenticationQuery);
        if ($queryResult->num_rows === 0) {
            echo 'Authentication failed';
        } else {
            $loginGood = true;
            echo "Authentication successful";
        }

      if(isset($_POST['rememberMe'])){
        $sessionID = session_id();
        if($loginGood){
        $insertQuery = "INSERT INTO sessions(sessionID,username,PASSWORD) VALUES('$sessionID','$username','$password') ON DUPLICATE KEY UPDATE username = '$username', PASSWORD = '$password'";
        $connection->query($insertQuery);}
       }

}
      //  $response = mysqli_fetch_array($connection->query("SELECT * from users")); 
       // echo $response[1]

?>
<br>
</body>
</html>