$(document).ready(function(){
    function createCustomer()
    {
        var datastring = $("#frmCustomer").serialize();
        $.post( "api/customers", datastring )
            .done(function( data ) {
                loadCustomer();
            })
            .fail(function( data ) {
                let errorMessage = $.parseJSON(data.responseText);
                alert(errorMessage.message);
            })
        ;
    }

    function updateCustomer()
    {
        var datastring = $("#frmUpdateCustomer").serialize();
        $.ajax({
            url: 'api/customers/'+$('#hdnCustomerId').val(),
            type: 'PUT',
            data: datastring,
            success: function(data) {
                loadCustomer();
            }
        });
    }
    function deleteCustomer(customerId)
    {
        $.ajax({
            url: 'api/customers/'+customerId,
            type: 'DELETE',
            success: function(data) {
                loadCustomer();
            }
        });
    }

    function loadCustomer()
    {
        $('#tblCustomer').find("tr:gt(0)").remove();
        $.get( "api/customers", function( data ) {
            $.each(data,function(key,val){
                $('#tblCustomer').append( '<tr><td>' + val.first_name + '</td><td>' + val.last_name + '</td>'
                    +'<td><input type="button" class="btn btn-primary" value="Update" onclick="editCustomer(\'' + val.customer_id + '\')"/>'
                    +'<input type="button" class="btn btn-secondary delete-customer" data-customer_id="' + val.customer_id + '" value="Delete"/></td></tr>' );
            })

            $(".delete-customer").click(function(){
                deleteCustomer($(this).data('customer_id'));
            });
        });
    }

    function init()
    {
        loadCustomer();
        $('#addCustomer').click(function(){
            $("#divCustomer").toggle();
        });
        $('#saveCustomer').click(function(){
            createCustomer();
        });
        $('#updateCustomer').click(function(){
            updateCustomer();
        });
        $('#deleteCustomer').click(function(){
            deleteCustomer();
        });
    }
    init();
});


function editCustomer(customerId)
{
    $.get( "api/customers/"+customerId, function( data ) {
        $('#editFirstName').val(data.first_name);
        $('#editLastName').val(data.last_name);
        $('#hdnCustomerId').val(data.customer_id);
        $('#divUpdateCustomer').show();
    });
}



