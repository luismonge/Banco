<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Consulta de saldo</title>

	<!-- bootstrap -->
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.min.css') ?> " rel="stylesheet" type="text/css" />	
	<link href="<?php echo base_url('/public/css/bootstrap/bootstrap.css') ?> " rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?php echo base_url('/public/images/MBankIcon.ico')?>">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/css/main_css.css'); ?>">
	<script type="text/javascript" src="<?php echo base_url('/public/js/jquery.min.js') ?>"> </script>
	<script type="text/javascript" src="<?php echo base_url('/public/js/reload_div.js') ?>"></script>

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
							<div class="nav pull-right logout">
									<a id="sss" class="navbar-brand" href="<?= site_url('/login/only_authenticaded_users/logout'); ?>">Cerrar Sesión</a>
		                    </div>
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
			<div id="content_index_2">

				<div id="table_content" class="table-responsive">
					<table class="table table-hover" id="tabla">
						<th> No.Cuenta </th>				
						<?php 						
							foreach ($cuentas as $row) {							
								echo "<tr class='active'>";
									echo "<td class='row' id=".$row->no_cuenta.">".$row->no_cuenta."</td>";									
							}
							
						 ?>
					</table>
					<div id="table_balance" class="table-responsive">
								
					</div>
				</div>
				
			</div>		
			<div id="smelse">

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