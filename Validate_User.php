<?php
    require('Connection.php');
    session_start();
?>

<?php

class Validate_User{

    function Validate($login_User, $login_Password){

        $connection = new Connection();

        $user = mysqli_real_escape_string($connection->Connect(), $login_User);
        $password = mysqli_real_escape_string($connection->Connect(), $login_Password);
        $sha1_password = sha1($password);

        $query = "SELECT * FROM person WHERE User = '$user' AND Password = '$sha1_password'";
        $result = $connection->Connect()->query($query);
        $rows = $result->num_rows;

        if($rows > 0){
            $rows = $result->fetch_assoc();
            $_SESSION['session_User'] = $rows['User'];
            header("Location: Index.php");
        }

        echo $rows;

    }

}

$validate = new Validate_User();
$validate->Validate($_POST['login_User'], $_POST['login_Password']);

?>