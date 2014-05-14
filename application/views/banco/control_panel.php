<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Panel de control</title>

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
			<div id="content_index">
				<div id="cp-options">
					<fieldset>
						<legend>Opciones</legend>	
						<div class="metro" id="balance">
							<a href="<?= site_url('/banco/banco_controller/money'); ?>">Consulta tu saldo</a>
						</div>
						<div class="metro" id="transfer">
							<a href="<?= site_url('/banco/banco_controller/goTransaction'); ?>">Realiza una transacción</a>
						</div>
					</fieldset>	
				</div>
				<div id="center">									
					<div class="pw-balance carousel slide" id="myCarousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="carousel-caption">
									<h3>
										Cuenta
									</h3>
									<h2>
										<?php											
											echo $cuenta;											
										?>
									</h2>
									<h3>
										<?php
											echo "Saldo Total: ";
											foreach ($saldo as $val) {
												echo $val->saldo;
											}
											
										?>
									</h3>
								</div>
							</div>
							<div class="item" id="someMov">
								<div class="carousel-caption">
									<h3 id="uMov">
										Ultimos movimientos
									</h3>
									<h2 id="noCuenta">
										<?php											
											echo $cuenta;											
										?>
									</h2>									
										<table>			
											<th>Cuenta</th>								
											<th>Cantidad</th>								
											<th>Tipo</th>								
											<th>Fecha</th>								
										<?php											
											foreach ($movimientos as $val) {
												$tipo = $val->tipo_mov;
												echo "<tr>";
												echo "<td>".$val->cuenta."</td>";
												echo "<td>".$val->cantidad."</td>";

												if ($tipo == '1')
												{
													echo "<td>Desposito</td>";
												}
												if ($tipo == '2') 
												{																							
													echo "<td>Retiro</td>";
												}

												echo "<td>".$val->fecha."</td>";
												echo "</tr>";
											}
											
										?>
										</table>
									
								</div>
							</div>
						</div>
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>					
				</div>
			</div>	
			<div id="smelse">
				<p>
					Esta empresa no se hace responsable por casos como: <br />
					Robo total de dinero <br /> 
					Clonacion de tarjetas <br />
					Compras fantasma, etc.
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

<script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
</script>

</html>