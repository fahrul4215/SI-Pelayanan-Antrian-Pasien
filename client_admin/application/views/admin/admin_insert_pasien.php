<html>
<head>
	<title>Puskesmas Bikin Sehat | Admin</title>
	<link rel="icon" type="image/png" href="https://trustmedis.com/wp-content/uploads/2015/03/e-Puskesmas.png"></link>

	<!--bootstrap-->
	<?php $this->load->view('template/css'); ?>

	<style>
	body 
	{
		background-color: #272a1e;
		color: #F8F8FF;
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
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('admin') ?>">Pasien</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('poli') ?>">Poli</a>
			</li>
			<li class="nav-item">
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
			<h1 class="text-center" style="color: #F8F8FF">Tambah Pasien</h1>
			<h3 class="text-danger"><?= $this->session->flashdata('hasil'); ?></h3>
		</div>

		<?= form_open('admin/tambahPasien'); ?>
		<div>
			<label class="control-label col-2">Nama :</label>
			<div class="col-12">
				<input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" name="nama_pasien">
			</div>

			<label class="control-label col-2">Tanggal Lahir :</label>
			<div class="col-12">
				<input type="date" class="form-control" name="tgl_lahir" value="" placeholder="">
			</div>

			<label class="control-label col-2">Jenis Kelamin :</label>
			<div class="col-12">
				<select name="jenis_kelamin" class="form-control">
					<option value="L">Laki-Laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div>
			
			<label class="control-label col-2">Alamat :</label>
			<div class="col-12">
				<input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" name="alamat">
			</div>

			<label class="control-label col-2">Pekerjaan :</label>
			<div class="col-12">
				<input type="text" class="form-control" id="pekerjaan" placeholder="Masukkan Pekerjaan Anda" name="pekerjaan">
			</div>

			<label class="control-label col-2">No HP :</label>
			<div class="col-12">
				<input type="text" class="form-control" id="noHp" placeholder="Masukkan noHp Anda" name="no_hp">
			</div>

			<label class="control-label col-2">Jenis Kartu :</label>
			<div class="col-12">
				<select name="id_jenis_kartu" class="form-control">
					<?php foreach ($jenis_kartu as $value): ?>
						<option value="<?= $value->id_jenis_kartu ?>"><?= $value->nama_kartu ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<br>
			<label class="control-label col-2">Username :</label>
			<div class="col-12">
				<input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda" name="username">
			</div>

			<label class="control-label col-2">Password :</label>
			<div class="col-12">
				<input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda" name="password">
			</div>

			<br>
			<div class="text-center">
				<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				<a class="btn btn-danger" href="<?php echo base_url('admin') ?>">Batal</a>
			</div>

		</div>
		<?= form_close(); ?>
		
	</div>

	<!--FOOTER-->
	<?php $this->load->view('template/footer'); ?>

	<!-- JS -->
	<?php $this->load->view('template/js'); ?>
</body>
</html>