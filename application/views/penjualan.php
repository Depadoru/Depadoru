<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Penjualan Table</h4>
                                    You can check the Penjualan data here
                                </div>

                                <?=form_error('TanggalPenjualan', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('NamaPelanggan', '<div class="alert alert-primary" role="alert">','</div>');?>

                                 <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Add Penjualan
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
                                                    <th>TANGGAL</th>
                                                    <th>TOTAL HARGA</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                             <?php $i = 1 ?>
                                             <?php foreach ($penjualan as $p): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-bold-500">PJL-<?php echo $p->PenjualanID; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->NamaPelanggan; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->TanggalPenjualan; ?></td>
                                                    <td>Rp.<?= number_format( $p->TotalHarga, 0, ',', '.')?></td>

                                                    
                                                    <td>
                                                        <a href="<?php echo base_url();?>Penjualan/detail/<?php echo $p->PenjualanID ?>"><button  type="button" class="btn btn-primary">Detail</button></a>                                                     
                                                        <a href="<?php echo base_url();?>Penjualan/hapus_penjualan/<?php echo $p->PenjualanID ?>"><button id="success" type="button" class="btn btn-danger">Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="<?= base_url('Penjualan'); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tanggal Penjualan: </label>
            <input type="date" class="form-control" name="TanggalPenjualan" id="TanggalPenjualan" placeholder="Tanggal Penjualan">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Pelanggan: </label>
           <select class="form-control" name="NamaPelanggan" id="NamaPelanggan">
                <?php foreach ($pelanggan as $pelanggan) : ?>
                    <option value="<?=$pelanggan->PelangganID?>"><?=$pelanggan->NamaPelanggan?></option>
                <?php endforeach ?>    
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

