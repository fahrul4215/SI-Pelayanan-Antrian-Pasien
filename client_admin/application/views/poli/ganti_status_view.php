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
		color: #000;
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
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('admin') ?>">Pasien</a>
			</li>
			<li class="nav-item active">
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

		<?= form_open('poli/GantiStatus/'.$this->uri->segment(3)); ?>
		<div class="">
			<div class="jumbotron" style="background-color: white">
				<input type="hidden" name="id_registrasi" value="<?= $this->uri->segment(3) ?>">

				<label class="control-label col-2">Poli :</label>
				<div class="col-10">
					<input type="text" class="form-control" name="nama_poli" value="<?= $registrasi[0]->nama ?>" readonly>
				</div>
				<label class="control-label col-2">No Antrian :</label>
				<div class="col-10">
					<input type="text" class="form-control" name="no_antrian" value="<?= $registrasi[0]->no_antrian ?>" readonly>
				</div>
				<label class="control-label col-2">Nama :</label>
				<div class="col-10">
					<input type="text" class="form-control" name="nama_pasien" value="<?= $registrasi[0]->nama_pasien ?>" readonly>
				</div>

				<br>
				<table id="myTable" class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Obat</th>
							<th>Jenis Obat</th>
							<th>Stok Obat</th>
							<th>Jumlah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($obat as $value): ?>
							<tr>
								<input type="hidden" name="id_obat" value="<?= $value->id_obat ?>">
								<td><?= $no ?></td>
								<td><?= $value->nama_obat ?></td>
								<td><?= $value->jenis_obat ?></td>
								<td><?= $value->jumlah ?></td>
								<td>
									<input type="number" class="form-control" name="jumlah" placeholder="Jumlah Obat untuk Pasien">
								</td>
								<td>
									<input type="submit" class="btn btn-primary" name="tambahObat" value="Tambahkan">
								</td>
							</tr>
							<?php $no++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="text-center">
			<a class="btn btn-danger" href="<?php echo base_url('poli') ?>">Kembali</a>
		</div>

		<?= form_close(); ?>
		
	</div>

	<!--FOOTER-->
	<?php $this->load->view('template/footer'); ?>

	<!-- JS -->
	<?php $this->load->view('template/js'); ?>
</body>
</html>