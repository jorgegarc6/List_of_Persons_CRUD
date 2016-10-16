<?php

class Connection
{

    function Connect()
    {
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'register';

        $connect = mysqli_connect($server, $user, $pass, $db) or die('No se pudo conectar: ' . mysql_error());

        return $connect;
    }
}
?>