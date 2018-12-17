<html>

<head>
	<title>Puskesmas Bikin Sehat</title>
	<link rel="icon" type="image/png" href="https://trustmedis.com/wp-content/uploads/2015/03/e-Puskesmas.png"></link>

	<?php $this->load->view('template/css'); ?>

	<!--Navbar sm kyk modal(daftar)-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

	<!--bootstrap-->


	<style>
	body 
	{
		background-color: #FF7F50;
		color: #F8F8FF;
	}
	.affix {
		top: ;
		width: 100%;
		z-index: 9999 !important;
	}
	.affix ~ .container{
		position: relative;
		top: 50px;
	}

	.judultext{
		background-image: url(https://istyle.id/wp-content/uploads//2017/04/FUJIFILM-X-T10-1.jpg);
		position: center;
		color: #000;
	}

	.futer{
		background-color: #1d1d16;
		text-align: center;
		left: 0;
		width: 100%;
		padding-bottom: 10px;
	}

</style>

</head>

<body>

	<div class="row" style="background-color: #303730">

		<div class="col-md-3" style="background-color: #fff">
			<div class="thumbnail">
				<div class="caption judultext">
					<br><br>
					<center>Antrian Poli Gigi</center>
					<center><strong><?=  (!$poli_gigi) ? 0 : $poli_gigi[0]->no_antrian; ?></strong></center>
					<br><br>
				</div>
			</div>
		</div>

		<div class="col-md-1"></div>

		<div class="col-md-4" style="background-color: #fff">
			<div class="thumbnail">
				<div class="caption judultext">
					<br><br>
					<center>Antrian Poli Umum</center>
					<center><strong><?=  (!$poli_umum) ? 0 : $poli_umum[0]->no_antrian; ?></strong></center>
					<br><br>
				</div>
			</div>
		</div>

		<div class="col-md-1"></div>

		<div class="col-md-3" style="background-color: #fff">
			<div class="thumbnail">
				<div class="caption judultext">
					<br><br>
					<center>Antrian Poli KIA - KB</center>
					<center><strong><?=  (!$poli_kia) ? 0 : $poli_kia[0]->no_antrian; ?></strong></center>
					<br><br>
				</div>
			</div>
		</div>

	</div>
	<!--GALLERY-->
	<br><br>
	<div class="container" style="background-color: #303730">
		<br>
		<div class="page-header">
			<h1 class="text-center">Daftar Berobat ke Puskesmas</h1>
			<h3 class="text-danger"><?= $this->session->flashdata('hasil'); ?></h3>
		</div>

		<div class="row" style="">

			<div class="col-md-3"></div>

			<div class="col-md-6">
				<div class="thumbnail" style="color: black">

					<?=  form_open('user/daftar'); ?>

					<div class="form-group">
						<label class="control-label col-sm-2">ID user :</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="id_pasien" value="<?= $this->session->userdata('id_pasien'); ?>" readonly>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Poli :</label>
						<div class="col-sm-10">          
							<select name="id_poli" class="form-control">
								<?php foreach ($DaftarPoliPasien as $p): ?>
									<option value="<?= $p->id_poli ?>"><?= $p->nama ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<center>
						<input type="submit" class="btn btn-primary" name="daftar" value="Daftar">
					</center><br> 
					<center><a class="btn btn-danger" href="<?php echo base_url('user') ?>">
						Kembali
					</a></center>
					<?=  form_close(); ?>

					<br>

				</div>
			</div>

		</div>


		<br><br>

	</div>
	<br><br>

	<!--Footer handmade(contact)-->
	<div class="futer">
		<br>
		<font style="font-family:times new roman; font-size: 25;">
			PUSKESMAS BIKIN SEHAT
		</font>
		<font>
			<br>Jl. Kebenaran no 1, Malang
			<br>Jawa Timur, Indonesia
		</font>
		
		<br><br><br>
		<p><span class="badge badge-secondary">Open at :</span></p>
		<font style="color: #F8F8FF">Senin - Jumat</font><br>
		<font style="color: #F8F8FF">08.00 - 15.00 WIB</font><br>
	</div>

	<!-- Datatables JS -->
	<?php $this->load->view('template/js'); ?>
</body>

</html>