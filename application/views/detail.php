<div class="container">
  <div class="row">
    <div class="col">
      <!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Table</h4>
                                    You can check the Detail data here
                                </div>
      <div class="modal-body">

<form action="<?= base_url('Penjualan/detail/'.$penjualan->PenjualanID); ?>" method="POST">
        
        <div class="mb-3">
            <input type="hidden" id="PenjualanID" name="PenjualanID" value="<?= $penjualan->PenjualanID ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Produk: </label>
            <select class="form-control" name="NamaProduk" id="NamaProduk">
                <?php foreach ($produk as $produk) : ?>
                    <option value="<?=$produk->ProdukID?>"><?= $produk->NamaProduk ?></option>
                <?php endforeach ?>    
            </select>
          </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Produk: </label>
            <input type="text" class="form-control" id="JumlahProduk" name="JumlahProduk" placeholder="Jumlah Produk" a_ia-describedby="emailHelp">
          </div>

        </div>
      <div class="modal-footer">
        <a href="<?php echo base_url();?>Penjualan?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Save</button>


                </div>
            </div>
       </section>
<!-- Table head options end -->      
    </div>
    <div class="col">
      <!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Table</h4>
                                    You can check the Detail data here
                                </div>

                                <?=form_error('NamaProduk', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('PelangganID', '<div class="alert alert-primary" role="alert">','</div>');?>
                                <?=form_error('JumlahProduk', '<div class="alert alert-primary" role="alert">','</div>');?>

                                
                                <div class="card-content">
                                   
                                    <!-- table head dark -->
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID</th>
                                                    <th>NAMA</th>
                                                    <th>PRODUK</th>
                                                    <th>JUMLAH PRODUK</th>
                                                    <th>SUB TOTAL</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                             <?php $i = 1 ?>
                                             <?php foreach ($detail as $d): ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td class="text-bold-500">DTL-<?php echo $d->DetailID; ?></td>
                                                    <td class="text-bold-500"><?php echo $d->NamaPelanggan; ?></td>
                                                    <td class="text-bold-500"><?php echo $d->NamaProduk; ?></td>
                                                    <td class="text-bold-500"><?php echo $d->JumlahProduk; ?></td>
                                                    <td>Rp.<?= number_format( $d->Subtotal, 0, ',', '.')?></td>                                                    
                                                    <td>
                                                    <a href="<?php echo base_url();?>Penjualan/hapus_detail/<?php echo $d->DetailID ?>/<?php echo $penjualan->PenjualanID ?>"><button id="success" type="button" class="btn btn-danger">Delete</button></a>                                                    </td>
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
    </div>
  </div>
</div>



