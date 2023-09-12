<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="UserMmodal" tabindex="-1" aria-labelledby="ModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="UserForm" name="UserForm" class="form-horizontal">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="user_id" class="form-label"></label>
                  <input type="hidden" class="form-control" id="user_id" name="id">
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="role_id" class="form-label">Role</label>
                  <select name="role_id" id="role_id" class="form-select">
                    <option value="">Select Role</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">User</option>
                  </select>
                </div>
              </div>

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="text" class="form-control" id="password" name="password">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="BtnUser">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
