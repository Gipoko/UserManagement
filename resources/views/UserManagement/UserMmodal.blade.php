
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="UserMmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="aboutForm" name="aboutForm" class="form-horizontal" enctype="multipart/form-data">

       <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">User ID</label>
                    <input type="text" class="form-control" id="user_id" aria-describedby="" placeholder="">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="" placeholder="">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <input type="text" class="form-control" id="role_id" aria-describedby="" placeholder="">
                </div>
            </div>

        </div>
       </div>
        

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary BtnUser">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>