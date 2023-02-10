$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var UserMmodal = $("#UserMmodal");
    var ModalTitle = $("#ModalTitle");
    var BtnUser = $("#BtnUser");

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
        {data: 'display_name', name: 'Email'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
       
    ]
});

$('body').on('click', '.editUser', function () {
    var id = $(this).data('user_id');
    $.get("/UserM" +'/' + id +'/edit', function (data) {
        
        UserMmodal.modal('show');
        ModalTitle.html("Edit User");
        BtnUser.html("Save Changes");
        $('#user_id').val(data.id);
        $('name').val(data.name);
        $('user_role').val(data.display_name);
        
    })
 });
});