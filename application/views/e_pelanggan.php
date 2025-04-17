<!-- Table head options start -->
                <section class="section">
                    <div class="row" id="table-head">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Pelanggan</h4>
                                    You can edit the Pelanggan data here
                                </div>
      <div class="modal-body">

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <input type="hidden" id="PelangganIDh" name="PelangganIDh" value="<?= $pelanggan->PelangganID ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Pelanggan:  </label>
            <input type="text" class="form-control" name="NamaPelanggan" id="NamaPelanggan" placeholder="Nama Pelanggan" value="<?= $pelanggan->NamaPelanggan ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat: </label>
            <input type="text" class="form-control" name="Alamat" id="Alamat" placeholder="Alamat" value="<?= $pelanggan->Alamat ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NomorTelepon: </label>
            <input type="text" class="form-control" name="NomorTelepon" id="NomorTelepon" placeholder="Nomor Telepon" value="<?= $pelanggan->NomorTelepon ?>">
        </div>

        </div>
      <div class="modal-footer">
        <a href="<?php echo base_url();?>Pelanggan?>"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>


                </div>
            </div>
       </section>
<!-- Table head options end -->      