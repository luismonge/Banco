<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Transacciones</title>

	<!-- bootstrap -->
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.min.css') ?> " rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.css') ?> " rel="stylesheet" type="text/css" />
		
	<link rel="shortcut icon" href="<?php echo base_url('/public/images/MBankIcon.ico')?>">


	<script type="text/javascript" src="<?php echo base_url('/public/js/jquery.min.js') ?>"> </script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/css/main_css.css'); ?>">

</head>
<body>
	<div id="page">
		<div id="header">
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
					<!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
					<div class="container-fluid">
						<div class="navbar-header">
							
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" id="home" href="<?= site_url('banco/banco_controller/controlPanel'); ?>">
								<img src="<?php echo base_url('/public/images/MBankIcon.ico')?>" />
							</a>
						</div>
						<div class="navbar-collapse collapse" style="height: 1px;">														
							<ul class="nav pull-right">
									<a id="logout" class="navbar-brand" href="<?= site_url('/login/only_authenticaded_users/logout'); ?>">Cerrar Sesión</a>
		                    </ul>
		                    <div id="navContain">
								<span id="sss"> Bienvenido, </span>	
								<a href="<?= site_url('Banco/banco_controller/controlPanel'); ?>" id="sss"> 
									<?php 
										if($this->session->userdata('logged_in'))
										{
											$session_data = $this->session->userdata('logged_in');
											echo $session_data['username'];						 				   												
										}					
									?> 
								</a>
							</div>						
		            	</div>											
					</div>
				</div>
				<div id="logo">		
					<a href="<?= site_url('Banco/banco_controller/controlPanel'); ?>">
						<img src="<?= base_url('/public/images/MbankLogo2.png') ?>">
					</a>
				</div>
		</div>

		<div id="content">
			<div id="content_index">

				<form id="form_add" method="post" class="form" role="form" action=<?php echo site_url('banco/banco_controller/doTransaction'); ?>>
					<div id="form_content">		
						<div class="form-group">
							<div id="formulario">								
									<div class="c_content">
										<div class="content_left">
											<p>Cuenta Origen</p>
										</div>										
										<div class="content_right">											
											<label for="cuenta_origen" class="col-sm-offset-0 col-sm-3 control-label">Elige tu cuenta</label>
											<div class="col-sm-8">
												<select class="form-control" name="cuenta_origen">
												  <?php
												  	foreach ($cuentas as $row) {							
														echo "<option>";
														echo $row->no_cuenta;							
														echo "</option>";		
													}
												  ?>
												</select>
											</div>
										</div>										
									</div>
								
									<div class="c_content">
										
										<div class="content_left">
												<p>Cuenta Destino</p>
										</div>										
										<div class="content_right">											
											<label for="cuenta_destino" class="col-sm-offset-0 col-sm-3 control-label">Cuenta Destino</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="cuenta_destino" name="cuenta_destino" >
												</div>
										</div>	

									</div>
								
									<div class="c_content">
										

										<div class="content_left">
												<p>Cantidad</p>
										</div>										
										<div class="content_right">											
											<label for="cantidad" class="col-sm-offset-0 col-sm-3 control-label">Cantidad de la transferencia</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="cantidad" name="cantidad">
											</div>
										</div>	
									</div>
										
							    	<div id="buttons" class="col-sm-offset-9">
							      		<button id="btn_submit" type="submit" class="btn btn-success">Aceptar</button>	      		
							      		<a href="<?= site_url('banco/banco_controller/controlPanel'); ?>">
							      			<button type="button" id="btn_return" class="btn btn-primary">Regresar</button>
							      		</a>
							    	</div>
							
							</div>		
					  	</div>
					</div>			
				</form>
			</div>	
			<div id="smelse">
				<p>
					Esta empresa no se hace responsable por casos como: <br />
					robo total de dinero <br /> 
					clonacion de tarjetas <br />
					compras fantasma, etc.
				</p>
			</div>			
		</div>

		<div id="footer">
			<p>
				Equipo: <br />
				Martin Francisco Martinez Federico	<br />
				Luis Carlos Monge Castro <br />
				Jose Muñoz Valdez <br />
			</p>
		</div>
	</div>
</body>
<script src="<?php echo base_url('/public/js/bootstrap/bootstrap.min.js') ?>"></script>
</html>