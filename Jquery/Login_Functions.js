$(document).ready(function(){

    //Click on Login button
    $('#btn_Submit').click(function () {
        validate_User();
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
            alert(answer);
        }
    });
}