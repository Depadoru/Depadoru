<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Kasir UKK</title>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/assets/vendors/sweetalert2/sweetalert2.min.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" />
    <link 
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css">
		<link
			href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/assets/css/bootstrap.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/assets/vendors/iconly/bold.css" />

		<link
			rel="stylesheet"
			href="<?php echo base_url();?>assets/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css"
		/>
		<link
			rel="stylesheet"
			href="<?php echo base_url();?>assets/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css"
		/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/assets/css/app.css" />
		<link
			rel="shortcut icon"
			href="<?php echo base_url();?>assets/dist/assets/images/favicon.svg"
			type="image/x-icon"
		/>
	</head>

	<body>
		<div id="app">
			<div id="sidebar" class="active">
				<div class="sidebar-wrapper active">
					<div class="sidebar-header">
						<div class="d-flex justify-content-between">
							<div class="logo">
								<a href="index.html"
									>UKK Kasir</a>
							</div>
							<div class="toggler">
								<a href="#" class="sidebar-hide d-xl-none d-block"
									><i class="bi bi-x bi-middle"></i
								></a>
							</div>
						</div>
					</div>
					<div class="sidebar-menu">
						<ul class="menu">

								<li class="sidebar-item">
									<a href="<?php echo base_url();?>Dashboard" class="sidebar-link">
										<i class="bi bi-grid-fill"></i>
										<span>Dashboard</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>Pelanggan" class="sidebar-link">
										<i class="bi bi-person-square"></i>
										<span>Pelanggan</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>Produk" class="sidebar-link">
										<i class="bi bi-box-seam"></i>
										<span>Produk</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>Penjualan" class="sidebar-link">
										<i class="bi bi-cart4"></i>
										<span>Penjualan</span>
									</a>
								</li>
								<li class="sidebar-item">
									<a href="<?php echo base_url();?>Userdata" class="sidebar-link">
										<i class="bi bi-person-badge"></i>
										<span>Userdata</span>
									</a>
								</li>
						</ul>
					</div>



			</div>
			<div id="main">
				<header class="mb-3">
					<a href="#" class="burger-btn d-block d-xl-none">
						<i class="bi bi-justify fs-3"></i>
					</a>
				</header>