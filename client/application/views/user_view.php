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
		
		.judultext{
			font-family: forte;
			font-size: 20;
			text-align: center;
			color: #FF7F50;
		}

		.futer{
			background-color: #1d1d16;
			text-align: center;
			width: 100%;
			padding-bottom: 10px;
			bottom: 0;
			position: fixed;
		}
	</style>

</head>

<body>

	<br><br>
	<div class="container" style="background-color: #303730">
	  <br>
	  <div class="page-header">
	  	<h1 class="text-center">Hello User</h1>
	  </div>
	  
	  <div class="row" style="">
	  	
	  	<div class="col-md-5">
	  		<a href="<?php echo base_url('user/daftar');?>">
	  		<div class="thumbnail">
	        	<div class="caption judultext">
	        		<br><br>
	        		<center>DAFTAR</center>
	        		<br><br>
	        	</div>
	        </div>
	        </a>
	  	</div>

	  	<div class="col-md-2"></div>

	    <div class="col-md-5">
	    	<a href="<?php echo base_url('user/antri');?>">
	  		<div class="thumbnail">
	        	<div class="caption judultext">
	        		<br><br>
	        		<center>LIHAT ANTRIAN</center>
	        		<br><br>
	        	</div>
	        </div>
	        </a>
	    </div>

	  </div>

	  <br><br>

	</div>
	<br><br>

	<!--Footer handmade(contact)-->
	<div class="futer">
		<br><a class="btn btn-danger" href="<?php echo base_url('login') ?>">
			<font color="white">Logout</font>
		</a><br>

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

