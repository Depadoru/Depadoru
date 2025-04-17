<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit User Data</h4>
                                    You can edit the User Data data here
                                </div>
      <div class="modal-body">

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <input type="hidden" id="idh" name="idh" value="<?= $users->id ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username: </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $users->username ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password: </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?= $users->password ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email: </label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= $users->email ?>">
        </div>

        <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Role: </label>
    <select class="form-control" name="role" id="role">
        <option value="admin" <?= $users->role == 'admin' ? 'selected' : '' ?>>admin</option>
        <option value="pegawai" <?= $users->role == 'pegawai' ? 'selected' : '' ?>>pegawai</option>
    </select>
    </div>


        </div>
      <div class="modal-footer">
        <a href="<?php echo base_url();?>Userdata?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>


                </div>
            </div>
       </section>
<!-- Table head options end -->      