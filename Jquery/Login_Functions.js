$(document).ready(function(){

    //Click on Login button
    $('#btn_Submit').click(function(){
        validate_User();
    });

    //Click on Register button
    $('#btn_Register').click(function(){
        btn_Register();
    });

});

//Validate Login

function validate_User(){
    var user = $('#login_User').val();
    var pass = $('#login_Password').val();
    $.ajax({
        type: 'POST',
        url: 'Validate_User.php',
        data: ('login_User='+user+'&login_Password='+pass),
        success: function(answer){
            if(answer == 1){
                window.location.replace("Index.php");
            }else{
                $('#showMessage').show();
                $('#showMessage').html("<div class='alert alert-danger' role='alert'> Your Credentials are Incorrect </div>").fadeOut(4000);
            }

        }
    });
}

function btn_Register(){
    $('#name').val(''); $('#lastname').val(''); $('#user').val(''); $('#password').val(''); $('#years').val('');
    $('#dialog-Register').dialog({
        modal: true,
        buttons:{
            "Add Person": function(){
                Add_Person();
            },
            Cancel: function () {
                $(this).dialog('close');
            }
        }
    });
}

function Add_Person(){
    var form = $('#form_Register');
    $.ajax({
        type: "POST",
        url: "Register.php",
        data: form.serialize(),
        success: function(answer){
            if(answer == 1){
                $('#showMessage').show();
                $('#showMessage').html("<div class='alert alert-success' role='alert'>The user has been Added</div>").fadeOut(5000);
                $('#dialog-Register').dialog( "close" );
            }else{
                $('#showMessage').show();
                $('#showMessage').html("<div class='alert alert-warning' role='alert'>Fail: Try to again...</div>").fadeOut(5000);;
            }
        }
    })
}