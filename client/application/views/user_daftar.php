<html>

<head>
	<title>Puskesmas Bikin Sehat</title>
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

		.judul{
			background-image: url(https://istyle.id/wp-content/uploads//2017/04/FUJIFILM-X-T10-1.jpg);
			position: center;
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

	<!--GALLERY-->
	<br><br>
	<div class="container" style="background-color: #303730">
	  <br>
	  <div class="page-header">
	  	<h1 class="text-center">Daftar Berobat ke Puskesmas</h1>
	  </div>
	  
	  <div class="row" style="">
	  	
	  	<div class="col-md-3"></div>

	    <div class="col-md-6">
	    	<div class="thumbnail" style="color: black">

	    		<form class="form-horizontal" action="/action_page.php">
		    		
		    		<div class="form-group">
				      <label class="control-label col-sm-2">ID user :</label>
				      <div class="col-sm-10">
				        <input type="text" class="form-control" id="id" placeholder="Masukkan id_user" name="id">
				      </div>
					</div>

					<div class="form-group">
				      <label class="control-label col-sm-2">Tanggal :</label>
				      <div class="col-sm-7">          
				        <input type="date" class="form-control" id="tgl" name="tgl">
				      </div>
					</div>
					
					<div class="form-group">
				      <label class="control-label col-sm-2">Keluhan:</label>
				      <div class="col-sm-10">
				      	<div class="input-group">
	    					<div class="checkbox">
	    						<label><input type="checkbox" value="">Option 1</label>
	    					</div>
	    					<div class="checkbox">
	    						<label><input type="checkbox" value="">Option 2</label>
	    					</div>
	    					<div class="checkbox">
	    						<label><input type="checkbox" value="">Option 3</label>
	    					</div>
	    				</div>
				      </div>
					</div>

				</form>

	        	<center><button type="Submit" class="btn btn-primary">Daftar</button></center>
	        	<br>

	        </div>
	    </div>

	  </div>

	  <center><a class="btn btn-danger" href="<?php echo base_url('user') ?>">
	  	Kembali
	  </a></center>

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

</body>

</html>