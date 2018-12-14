<html>

<head>
	<title>Puskesmas Bikin Sehat | Apoteker</title>
	<link rel="icon" type="image/png" href="https://trustmedis.com/wp-content/uploads/2015/03/e-Puskesmas.png"></link>

	<!--bootstrap-->
	<?php $this->load->view('template/css'); ?>

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
			<h1 class="text-center" style="color: #F8F8FF">Apoteker</h1>
		</div>

		<div class="text-center">
			<a class="btn btn-success" href="<?php echo base_url('apoteker/obat') ?>">
				<font color="white">Lihat Obat</font>
			</a><br><br>

			<div class="jumbotron" style="background-color: white">
				<table id="myTable" class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pasien</th>
							<th>Obat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($resep as $value): ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value->nama_pasien ?></td>
								<?php $obat = json_decode($this->curl->simple_get($this->API.'/detail_resep?id_detail_resep='.$value->id_detail_resep)); ?>
								<td>
									<ol>
										<?php foreach ($obat as $o): ?>
											<li><?= $o->nama_obat ?></li>
											<?php endforeach ?></td>
										</ol>
										<td>
											<a class="btn btn-warning" href="">Sudah</a>
										</td>
									</tr>
									<?php $no++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>

				</div>
				<br>

			</div>
			<br><br><br><br>

			<!-- FOOTER -->
			<?php $this->load->view('template/footer'); ?>

			<!-- Datatables JS -->
			<?php $this->load->view('template/js'); ?>
		</body>

		</html>