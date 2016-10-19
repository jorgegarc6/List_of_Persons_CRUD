<?php require_once('Connection.php'); ?>

<?php
class Register{


    function select_Action($action){

        switch($action){

            case 1:

                $this->Add_Person();

                break;

            case 2:

                $this->update_Person($_POST['id'], $_POST['name'], $_POST['lastname'], $_POST['years']);

                break;
            case 3:

                $this->deleted_Person($_POST['id']);
                break;
        }

    }

    function Add_Person(){

        if (isset($_POST['name']) && ($_POST['lastname']) && ($_POST['user']) && ($_POST['password']) && ($_POST['years'] != "")) {

            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $user = $_POST['user'];
            $password = sha1($_POST['password']);
            $years = $_POST['years'];

            $connect = new Connection();

            $insert = sprintf("INSERT INTO person (Name, LastName, User, Password, Years) VALUES ('$name', '$lastname', '$user', '$password', $years)");
            mysqli_select_db($connect->Connect(), "register");
            mysqli_query($connect->Connect(), $insert);

            echo 1;
        }else {
            echo 2;
        }

    }

    function update_Person($id, $name, $lastname, $years){
        $connect = new Connection();

        $query = sprintf("UPDATE person SET Name='".$name."', LastName='".$lastname."', Years=".$years." WHERE id=".$id);
        mysqli_select_db($connect->Connect(), "register");
        mysqli_query($connect->Connect(), $query);
        mysqli_close($connect->Connect());
        echo 2;
    }

    function deleted_Person($id){
        $connect = new Connection();

        $query = sprintf("DELETE FROM person WHERE id=$id");
        mysqli_select_db($connect->Connect(), "register");
        mysqli_query($connect->Connect(), $query);
        mysqli_close($connect->Connect());
        echo "remove";
    }
}

$ejecutar = new Register();
$ejecutar->select_Action($_POST['action']);

?>