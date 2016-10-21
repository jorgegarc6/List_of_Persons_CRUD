$(document).ready(function(){

    //Loading DataTable
    getDataTable();
    //Add Person to DataTable
    $('#btn-Register').click(function(){
        btn_Add_Person();
    });
    //Editing Person of the DataTable
    $('#datatable_Person tbody').on( 'click', "button[id^='editPerson']", function () {

        var data = getDataTable().row( $(this).parents('tr') ).data();
        btn_Update_Person(data);

    } );

    //Deleting Person from DataTable
    $('#datatable_Person tbody').on('click', "button[id='removePerson']", function(){
        var data = getDataTable().row( $(this).parents('tr')).data();
        btn_Remove_Person(data, 3);
    });

});

function getDataTable(){

    var table = $('#datatable_Person').DataTable({
        "ajax": "Data_Ajax.php",
        "columns": [
            { data: "id"},
            { data: "Name"},
            { data: "LastName"},
            { data: "Years"},
            { "targets": -1, data: null, "defaultContent": "<button id='editPerson' type='button' class='btn btn-info'>Edit</button>"},
            { "targets": -1, data: null, "defaultContent": "<button id='removePerson' type='button' class='btn btn-danger'>Remove</button>"}
        ],
        retrieve: true,
        destroy: true
    });

    return table;
}
//Click on the Add Person button, call function AddUser
function btn_Add_Person(){
    $('#name').val(''); $('#lastname').val(''); $('#years').val('');
    $('#dialog-Register').dialog({
        modal: true,
        buttons: {
            "Add Person": function(){
                AddUser(1);
            },
            Close: function(){
                $(this).dialog('close');
            }
        }
    });
}
//Add a new Person to DataTable
function AddUser(action){

    var name = $('#name').val();
    var lastname = $('#lastname').val();
    var years = $('#years').val();

    if(name != '' && lastname !='' && years !=''){
        $.ajax({
            type: 'POST',
            url: 'Register.php',
            data: (
            'action='+action+' &name= '+ name+ ' &lastname='+lastname+' &years='+years
            ),
            success: function (answer) {
                if(answer == 1){
                    $('#message').show();
                    $('#message').html("<div class='alert alert-success' role='alert'>The user has been Add to DataTable</div>");
                    $('#datatable_Person').DataTable().ajax.reload();
                    $('#dialog-Register').dialog( "close" );
                    $('#message').fadeOut(5000);
                }else{
                    $('#message').show();
                    $('#message').html("<div class='alert alert-warning' role='alert'>Fail: Try to again...</div>");
                    $('#message').fadeOut(5000);
                }
            }

        });

    }else{
        $('#message2').html("<div class='alert alert-warning' role='alert'>Enter Valid Values</div>");
    }

}
//Click on the Edit button, later call to the Fuction UpdatePerson for update the data of the Person
function btn_Update_Person(data){
    $('#dialog-Register').attr("title", "Edit Person");
    //Call function filling_fields_dialog and fill the fields of the dialog
    filling_fields_dialog(data['Name'].trim(), data['LastName'].trim(), data['Years']);
    $('#dialog-Register').dialog({
        modal: true,
        buttons: {
            "Update Person": function(){
                updatePerson(data['id'], 2);
            },
            Close: function(){
                $(this).dialog('close');
            }
        }
    });
}
//Fill the fields that contain the Dialog
function filling_fields_dialog(Name, LastName, Years){

    $('#name').val(Name);
    $('#lastname').val(LastName);
    $('#years').val(Years);

}
//Update the data of the Person
function updatePerson(id_Person, action){

    var id = id_Person;
    var name = $('#name').val();
    var lastname = $('#lastname').val();
    var years = $('#years').val();

    if(name != '' && lastname !='' && years !='') {

        $.ajax({

            type: "POST",
            url: "Register.php",
            data: ('action='+ action +'&id=' + id + '&name=' + name + '&lastname=' + lastname + '&years=' + years),
            success: function (answer) {
                if(answer == 2) {
                    $('#message').show();
                    $('#datatable_Person').DataTable().ajax.reload();
                    $('#message').html("<div class='alert alert-success' role='alert'>You has modified the user with success...</div>");
                    $('#dialog-Register').dialog( "close" );
                    $('#message').fadeOut(5000);

                }else{
                    $('#message').show();
                    $('#message').html("<div class='alert alert-danger' role='alert'>You have failed to user modification...</div>");
                    $('#message').fadeOut(5000);
                }
            }

        });
    }else{
        $('#message2').html("<div class='alert alert-danger' role='alert'>No hay valor para Actualizar</div>");
        $('#message2').fadeOut(5000);
    }
}
//Delete the data of the user and delete of the DataTable
function btn_Remove_Person(data, action){
    $.ajax({
        type: "POST",
        url: "Register.php",
        data: ('id='+data['id'] + ' &action='+action),
        success: function(answer){
            if(answer.localeCompare("remove")){
                $('#message').show();
                $('#message').html("<div class='alert alert-success' role='alert'>The User has been Removed...</div>");
                $('#message').fadeOut(5000);
                $('#datatable_Person').DataTable().ajax.reload();
            }else{
                $('#message').show();
                $('#message').html("<div class='alert alert-danger' role='alert'>Is cannot the User Removed</div>");
                $('#message').fadeOut(5000);
            }
        }
    })
}