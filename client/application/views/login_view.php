<!DOCTYPE html>
<html lang="">
<head>
	<title>Puskesmas Bikin Sehat</title>
	<link rel="icon" type="image/png" href="https://trustmedis.com/wp-content/uploads/2015/03/e-Puskesmas.png"></link>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<style>
		body 
		{
		    background-color: #303730;
		}
		.form-group
		{
			padding: 40px;
			width: 350px;
			background-color: #F7F7F7;
			margin: 0 auto 10px;
			border-radius: 2px;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			overflow: hidden;
			
		}
	</style>
</head>

<body>

     <div class="page-content">
    	<div class="row">
		  <div class="col-md-3"></div>

		  <div class="row">
          <div class="col-md-3 col-md-offset-1  panel-warning">
          <div class="box-large">
								  
		  <div class="container">
		  <div class="col-md-4">

			<!--judul-->
			<div class="page-header" style="color:#F5F5F5">
			  	<h1 class="text-center"><b>Halaman Login</b></h1>
			  	<h4 class="text-center">PUSKESMAS BIKIN SEHAT</h4>
			</div>
			
			<center>
			<font color="#006600">
				<?php //echo form_open('login/cekLogin'); ?>

					<?php //echo validation_errors(); ?>
					<div class="content-box-large">
					<div class="panel-body">
				  	<form class="form-horizontal" role="form">
						<div class="form-group">
							<h3><label for="">Username</label></h3>
							<input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">


							<h3><label for="">Password</label></h3>
							<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">

							<br>
							<button type="Submit" class="btn btn-primary">Login</button>

							<!-- SEMENTARA (PURA2 LOGIN) -->
							<br><br>
							<a class="btn btn-danger" href="<?php echo base_url('user') ?>">
								<font color="white">User</font>
							</a>
							<a class="btn btn-danger" href="<?php echo base_url('admin') ?>">
								<font color="white">Admin</font>
							</a>

						</div>
					
					</form>
					</div>
					</div>

				<?php //echo form_close(); ?>
			</font>
			</center>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>
