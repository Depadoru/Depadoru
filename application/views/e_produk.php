<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Produk</h4>
                                    You can edit the Produk data here
                                </div>
      <div class="modal-body">

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <input type="hidden" id="ProdukIDh" name="ProdukIDh" value="<?= $produk->ProdukID ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Produk:  </label>
            <input type="text" class="form-control" name="NamaProduk" id="NamaProduk" placeholder="Nama Produk" value="<?= $produk->NamaProduk ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Harga: </label>
            <input type="text" class="form-control" name="Harga" id="Harga" placeholder="Harga" value="<?= $produk->Harga ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Stok: </label>
            <input type="text" class="form-control" name="Stok" id="Stok" placeholder="Stok" value="<?= $produk->Stok ?>">
        </div>

        </div>
      <div class="modal-footer">
        <a href="<?php echo base_url();?>Produk?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>


                </div>
            </div>
       </section>
<!-- Table head options end -->      