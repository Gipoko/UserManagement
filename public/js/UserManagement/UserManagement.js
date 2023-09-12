$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var UserMmodal = $("#UserMmodal");
    var ModalTitle = $("#ModalTitle");
    var BtnUser    = $("#BtnUser");

    var table = $('#UserMTable').DataTable({
    processing: true,
    serverSide: true,
    searching: true,
    paging: true,
    bInfo: true,
    ajax: {
        url:"/UserM",
     },
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
     
        {data: 'name', name: 'Name'},
        {data: 'email', name: 'Email'},
        {data: 'display_name', name: 'Role'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
       
    ]
});

$('#NewUser').click(function(){
    UserMmodal.modal('show');
    ModalTitle.html("New User");
    BtnUser.html("Save");
    $('#UserForm').trigger("reset");
    $('#user_id').val('');
    var input = $("#password");
    input.attr("placeholder", " ");
    
});

$('body').on('click', '.editUser', function () {
    var id = $(this).data('user_id');
    var input = $("#password");
    input.attr("placeholder", "Leaving the input empty will retain the password.");
    $.get("/UserM" +'/' + id +'/edit', function (data) {
        
        UserMmodal.modal('show');
        ModalTitle.html("Edit User");
        BtnUser.html("Save Changes");
        $('#user_id').val(data.id);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#role_id').val(data.role_id);
        
    });
 });

 BtnUser.click(function (e) {
    e.preventDefault();
    $(this).html('Save');

    $.ajax({
        data: $('#UserForm').serialize(),
        url: "/UserM",
        type: "POST",
        dataType: 'json',
        success: function (data) {
            // Use SweetAlert for success message
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.success,
            });

            $('#UserForm').trigger("reset");
            UserMmodal.modal('hide');
            table.draw();
        },
        error: function (data) {
            // Use SweetAlert for error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred.',
            });
            console.log('Error:', data);
            BtnUser.html('Save Changes');
        }
    });
});

// Delete button click handler
$('body').on('click', '.deleteUser', function() {
    var id = $(this).data('user_id');

    // Use SweetAlert2 for confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this user!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: "/UserM" + '/' + id,
                success: function (data) {
                    // Show success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'The user has been deleted.',
                    });

                    table.draw();
                },
                error: function (data) {
                    // Show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while deleting the user.',
                    });
                    console.log('Error:', data);
                }
            });
        }
    });
});


});