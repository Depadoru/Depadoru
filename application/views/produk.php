<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Produk Table</h4>
                                    You can check the Produk data here
                                </div>

                                <?=form_error('NamaProduk', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('Harga', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('Stok', '<div class="alert alert-primary" role="alert">','</div>');?>

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
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                             <?php $i = 1 ?>
                                             <?php foreach ($produk as $p): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-bold-500">PDK-<?php echo $p->ProdukID; ?></td>
                                                    <td class="text-bold-500"><?php echo $p->NamaProduk; ?></td>
                                                    <td>Rp.<?= number_format( $p->Harga, 0, ',', '.')?></td>
                                                    <td class="text-bold-500"><?php echo $p->Stok; ?></td>
                                                    
                                                    <td>
                                                        <a href="<?php echo base_url();?>Produk/e_produk/<?php echo $p->ProdukID ?>"><button  type="button" class="btn btn-primary">Edit</button></a>                                                     
                                                        <a href="<?php echo base_url();?>Produk/hapus_produk/<?php echo $p->ProdukID ?>"><button id="success" type="button" class="btn btn-danger">Delete</button></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="<?= base_url('Produk'); ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk: </label>
            <input type="text" class="form-control" name="NamaProduk" id="NamaProduk" placeholder="Nama Produk">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga: </label>
            <input type="text" class="form-control" name="Harga" id="Harga" placeholder="Harga">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stok: </label>
            <input type="text" class="form-control" name="Stok" id="Stok" placeholder="Stok">
        </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

