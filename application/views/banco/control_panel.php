<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Panel de control</title>

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
							<a class="navbar-brand" id="home" href="<?= site_url('banco/banco_controller/controlPanell'); ?>">
								MBank
						    </a>
						</div>
						<div class="navbar-collapse collapse" style="height: 1px;">														
							<ul class="nav pull-right">
									<a id="logout" class="navbar-brand" href="<?= site_url('/login/only_authenticaded_users/logout'); ?>">Cerrar Sesión</a>
		                    </ul>
		                    <div id="navContain">
								<span id="login"> Usted a iniciado sesión como: </span>	
								<a href="#"> 
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
				<div id="center">						
						<div id="query">	
								<a href="<?= site_url('/banco/banco_controller/money'); ?>">					
									<p>
										Consulta tu saldo
									</p>					
								</a>
						</div>					
						<div id="moves">	
							<a href="<?= site_url('/banco/banco_controller/goTransaction'); ?>">
								<p>
									Realizar una transaccion				
								</p>							
							</a>
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