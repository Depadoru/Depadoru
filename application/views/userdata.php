<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">User Data Table</h4>
                                    You can check the User Data here
                                </div>
                                <?=form_error('username', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('password', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('email', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('role', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add User Data
                                        
                                        </button>
                                        
                                    </div>
                                    <!-- table head dark -->
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID</th>
                                                    <th>USERNAME</th>
                                                    <th>PASSWORD</th>
                                                    <th>EMAIL</th>
                                                    <th>ROLE</th>
                                                    <th>CREATED_AT</th>
                                                    <th>ACTION</th>

                                                </tr>
                                            </thead>
                                             <?php $i = 1 ?>
                                              <?php foreach ($users as $user): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-bold-500">USR-<?php echo $user->id; ?></td>
                                                    <td><?php echo $user->username; ?></td>
                                                    <td class="text-bold-500">[Hashed Password]</td> <!-- Ganti hash password dengan informasi umum -->
                                                    <td><?php echo $user->email; ?></td>
                                                    <td><?php echo $user->role; ?></td>
                                                    <td><?php echo $user->created_at; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url();?>Userdata/e_userdata/<?php echo $user->id ?>"><button  type="button" class="btn btn-primary">Edit</button></a>                                                     
                                                        <a href="<?php echo base_url();?>Userdata/delete_userdata/<?php echo $user->id ?>"><button id="success" type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                    </tr>
                                                    <?php $i++ ?>
                                               <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Table head options end -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="<?= base_url('Userdata'); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Username: </label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password: </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email: </label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Role: </label>
            <select class="form-control" name="role" id="role">
                <option value="pegawai">Pegawai</option>
                <option value="admin">Admin</option>

            </select>
        </div>
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>


