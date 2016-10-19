<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Persons</title>

    <!-- Libreries Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Plugin DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css"/>
    <!-- My Style-->
    <link rel="stylesheet" href="CSS/Style.css"/>
</head>
<body>

<center><h1>List of Persons</h1></center> <br/>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover" id="datatable_Person">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        USER
                    </th>
                    <th>
                        NAME
                    </th>
                    <th>
                        LAST NAME
                    </th>
                    <th>
                        YEARS
                    </th>
                    <th id="colum_Edit">
                        ACTION
                    </th>
                    <th id="colum_Remove">
                        ACTION
                    </th>
                </tr>
                </thead>
            </table>

            <button type="button" id="btn-Register" class="btn btn-success">Add Person</button>
            <div id="message"></div>
        </div>
    </div>
</div>

<div id="dialog-Register" title="Register Person">
    <form method="post">
        <label>Name:</label>
        <input type="text" id="name"/>
        <label>Last Name:</label>
        <input type="text" id="lastname"/>
        <label id="lbl_user">User:</label>
        <input type="text" id="user"/>
        <label>Password:</label>
        <input type="password" id="password"/>
        <label>Years:</label>
        <input type="number" id="years"/>
        <div id="message2"></div>
    </form>
</div>

<br/><br/><br/>


<script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="Jquery/Functions.js"></script>

</body>
</html>