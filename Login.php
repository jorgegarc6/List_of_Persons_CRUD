<?php

session_start();

if(isset($_SESSION['session_User'])){
    header("Location: Index.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="CSS/Style.css"/>

</head>
<body>

<div id="content_Main">
    <div id="content_Background">
        <div id="content_Form">

            <h1>LOGIN</h1><br/>

            <form method="POST" id="frm_Login">

                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" id="login_User" name="login_User" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-key" aria-hidden="true"></i></span>
                    <input type="password" id="login_Password" name="login_Password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
                </div>
                <br/>

            </form>
            <button id="btn_Submit" class="btn btn-primary">Ingresar</button>
            <div id="showMessage"></div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="Jquery/Login_Functions.js"></script>

</body>
</html>