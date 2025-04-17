<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pelanggan Table</h4>
                                    You can check the Pelanggan data here
                                </div>

                                <?=form_error('NamaPelanggan', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('Alamat', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('NomorTelepon', '<div class="alert alert-primary" role="alert">','</div>');?>

                                <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Produk
                                        </button>
                                </div>

                                <div class="card-content">
                                    <!-- table head dark -->
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID</th>
                                                    <th>NAMA</th>
                                                    <th>ALAMAT</th>
                                                    <th>NOMOR TELEPON</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                             <?php $i = 1 ?>
                                             <?php foreach ($pelanggan as $p): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-bold-500">PLG-<?php echo $p->PelangganID; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->NamaPelanggan; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->Alamat; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->NomorTelepon; ?></td>
                                                    
                                                    <td>
                                                        <a href="<?php echo base_url();?>Pelanggan/e_pelanggan/<?php echo $p->PelangganID ?>"><button  type="button" class="btn btn-primary">Edit</button></a>                                                     
                                                        <a href="<?php echo base_url();?>Pelanggan/hapus_pelanggan/<?php echo $p->PelangganID ?>"><button id="success" type="button" class="btn btn-danger">Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="<?= base_url('Pelanggan'); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan: </label>
            <input type="text" class="form-control" name="NamaPelanggan" id="NamaPelanggan" placeholder="Nama Pelanggan">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat: </label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NomorTelepon: </label>
            <input type="text" class="form-control" name="NomorTelepon" id="NomorTelepon" placeholder="Nomor Telepon">
        </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

