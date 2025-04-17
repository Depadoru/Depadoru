<div class="page-heading">
					<h3>Dashboard</h3>
				</div>
				<div class="page-content">
					<section class="row">
						<div class="col-12 col-lg-9">
							<div class="row">
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-3 py-4-5">
											<div class="row">
												<div class="col-md-4">
													<div class="stats-icon purple">
														<i class="iconly-boldProfile"></i>
													</div>
												</div>
												<div class="col-md-8">
													<h6 class="text-muted font-semibold">
														Produk
													</h6>
													<h6 class="font-extrabold mb-0"><?= $total_produk ?></h6>  <!-- Dynamic musician count -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-3 py-4-5">
											<div class="row">
												<div class="col-md-4">
													<div class="stats-icon blue">
														<i class="iconly-boldBookmark"></i>
													</div>
												</div>
												<div class="col-md-8">
													<h6 class="text-muted font-semibold">Pelanggan</h6>
													<h6 class="font-extrabold mb-0"><?= $total_pelanggan ?></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
									<div class="card">
										<div class="card-body px-3 py-4-5">
											<div class="row">
												<div class="col-md-4">
													<div class="stats-icon green">
														<i class="iconly-boldUser"></i>
													</div>
												</div>
												<div class="col-md-8">
													<h6 class="text-muted font-semibold">Penjualan</h6>
													<h6 class="font-extrabold mb-0"><?= $total_penjualan  ?></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-6 col-lg-3 col-md-6">
								<div class="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon red">
													<i class="iconly-boldWallet"></i>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">Pendapatan</h6>
												<h6 class="font-extrabold mb-0">Rp <?= number_format($total_harga, 0, ',', '.') ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							</div>

							<a href="<?php echo base_url();?>Login/logout" role="button">
								<button type="button" class="btn btn-danger">Log Out</button>
							</a>
							<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
						</div>
						<div class="col-12 col-lg-3">
							<div class="card">
								<div class="card-body py-4 px-6">
									<div class="d-flex align-items-center">
										<div class="avatar avatar-xl">
											<img src="<?php echo base_url();?>assets/dist/assets/images/faces/1.jpg" alt="Face 1" />
										</div>
										<div class="ms-3 name">
											<h5 class="font-bold"><?= $this->session->userdata('username')?></h5>
											<h6 class="text-muted mb-0"><?= $this->session->userdata('email')?></h6>
										</div>
									</div>
								</div>
							</div>
						
						</div>
					</section>
				</div>