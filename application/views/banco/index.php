<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MBANK index</title>

	<!-- bootstrap -->
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.min.css') ?> " rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.css') ?> " rel="stylesheet" type="text/css" />
		

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
							<a class="navbar-brand" id="home" href="<?= site_url('admin/home'); ?>">
								MBank
						    </a>
						</div>
						<div class="navbar-collapse collapse " style="height: 1px;">													
							<form class="navbar-form form-inline pull-right" role="form" method="POST" action="<?= site_url('login/verify_login'); ?>">
							  	<div class="form-group">
									<div class="form-group">
										<?php 
											if(isset($err))
											{
												echo "<h6>".$err."</h6>";
											}				
										?> 
									</div>
								</div>
							  	<div class="form-group">		
							    	<label class="sr-only" for="username">Nombre de Usuario</label>
							    	<input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
							  	</div>
							  	<div class="form-group">
							    	<label class="sr-only" for="password">Contraseña</label>	
							    	<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
							  	</div>					
							  	<button type="submit" class="btn btn-default">Iniciar Sesión</button>
							</form> 

		            	</div>											
					</div>
				</div>
				<div id="logo">		
					<a href="<?= site_url('Banco/banco_controller'); ?>">
						<img src="<?= base_url('/public/images/MbankLogo2.png') ?>">
					</a>
				</div>
		</div>		
		<div id="content">
			<div id="content_index">	
				<div id="description_page">
					<div id="description">
						<p>
							MBank es una empresa mexicana donde nuestros clientes podrán sentirse seguros de su dinero, ya que contamos con 
						</p>
					</div>
				</div>
				<div id="ads">
					<div id="description_ads">
						<p>
							Esta publicidad rifa
						</p>
					</div>					
				</div>
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