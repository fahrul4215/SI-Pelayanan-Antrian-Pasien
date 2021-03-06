<html>

<head>
	<title>Puskesmas Bikin Sehat | Apoteker</title>
	<link rel="icon" type="image/png" href="https://trustmedis.com/wp-content/uploads/2015/03/e-Puskesmas.png"></link>

	<!--bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!--Navbar sm kyk modal(daftar)-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		body 
		{
			background-color: #272a1e;
		}

		.judul{
			background-image: url(https://istyle.id/wp-content/uploads//2017/04/FUJIFILM-X-T10-1.jpg);
			position: center;
		}

		.judultext{
			font-family: forte;
			font-size: 40;
		}

		.form-group
		{
			padding: 40px;
			width: 350;
			background-color: black;
			margin: 0 auto 10px;
			border-radius: 2px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			overflow: hidden;	
		}

		.futer{
			background-color: #FF7F50;
			color: black;
			text-align: center;
		}
	</style>

</head>

<body>

	<!--navbar-->
	<nav class="navbar navbar-expand-sm bg-light navbar-light justify-content-center" data-offset-top="0">
<<<<<<< HEAD:client_admin/application/views/apoteker/apoteker_obat_create.php
		<ul class="nav navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin') ?>">Pasien</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('poli') ?>">Poli</a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('apoteker') ?>">Apoteker</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Whatsapp</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('login/logout') ?>">Logout</a>
			</li>

		</ul>
	</nav>

	<div class="container">
		<div class="page-header">
			<h1 class="text-center" style="color: #F8F8FF">Obat</h1>
			<h3 class="text-danger"><?= $this->session->flashdata('hasil'); ?></h3>
		</div>

		<div class="jumbotron" style="background-color: white">
			<?= form_open('apoteker/obat_create'); ?>
			<label class="control-label col-sm-2">Nama :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Masukkan Nama Obat" name="nama_obat">
			</div>

			<label class="control-label col-sm-2">Jumlah Obat :</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" placeholder="Masukkan Jumlah Stok" name="jumlah">
			</div>

			<label class="control-label col-sm-2">Kadaluwarsa :</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" placeholder="Masukkan Tanggal Kadaluwarsa" name="exp_date">
			</div>

			<label class="control-label col-sm-2">Jenis Obat :</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" placeholder="Masukkan Jenis Obat" name="jenis_obat">
			</div>

			<div class="text-center">
				<input type="submit" class="btn btn-success" name="submit" value="Tambah">
				<a class="btn btn-danger" href="<?php echo base_url('apoteker/obat') ?>">Batal</a>
			</div>
			<?= form_close(); ?>
		</div><br>

=======
	  <ul class="nav navbar-nav">
	  	<li class="nav-item active">
	      <a class="nav-link" href="<?php echo base_url('admin') ?>">Pasien</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="<?php echo base_url('apoteker') ?>">Apoteker</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="#">Whatsapp</a>
	    </li>
	    <li class="nav-item">
	      <a class="nav-link" href="<?php echo base_url('login') ?>">Logout</a>
	    </li>

	  </ul>
	</nav>

	<div class="container">
	  <div class="page-header">
	  	<h1 class="text-center" style="color: #F8F8FF">Pasien</h1>
	  </div>

	  <div class="text-center">
	  	<a class="btn btn-primary" href="<?php echo base_url('admin/tambahPasien') ?>">
	  		<font color="white">Tambah Pasien</font>
	  	</a><br><br>

	  	<div class="jumbotron" style="background-color: white">
	  		<table class="table table-striped">
		  	<thead>
		  		<tr>
		  			<th>ID_Pasien</th>
		  			<th>Nama</th>
		  			<th>No HP</th>
		  			<th>Alamat</th>
		  			<th>Aksi</th>

		  		</tr>
		  	</thead>
		  	<tbody>
		  		<tr>
		  			<td>1</td>
		  			<td>John</td>
		  			<td>Doe</td>
		  			<td>batuk</td>
		  			<td>
		  				<a class="btn btn-danger" href="">Riwayat</a>
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>2</td>
		  			<td>Mary</td>
		  			<td>Moe</td>
		  			<td>mary@example.com</td>
		  			<td>
		  				<a class="btn btn-warning" href="">Riwayat</a>
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>3</td>
			        <td>July</td>
			        <td>Dooley</td>
			        <td>july@example.com</td>
			        <td>
		  				<a class="btn btn-primary" href="">Riwayat</a>
		  			</td>
			    </tr>
			</tbody>
		</table>
	  	</div>

	  </div>
	  <br>
	  
>>>>>>> 59893faaa1667038daa12c9d443525c2112332e6:client/application/views/admin_view.php
	</div>
	<br><br><br><br>

	<!--Footer handmade(contact)-->
	<div class="futer">

		<br>
		<font style="font-family:times new roman; font-size: 15;" class="text-center">
			THIS IS FOOTER
		</font>
		
		<br><br>
		<p><span class="badge badge-secondary">contact :</span></p>
		<font>instagram | @lalalalla </font><br>
		<font>twitter | @lililili</font>
		<br><br>
	</div>

</body>

</html>