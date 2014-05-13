<table class="table table-hover" id="table_result">
		<th> ID_Transaccion </th>
		<th> Cuenta </th>
		<th> Cantidad </th>
		<th> Sucursal </th>
		<th> Referencia </th>
		<th> Tipo Movimiento </th>
		<th> Fecha y hora </th>
		<th> Tarjeta </th>
	<?php 
		foreach ($bal as $row) {	
			$tipo = $row->tipo_mov;

			if ($tipo == '1')
			{
				echo "<tr class= 'success'>";
			}
			if ($tipo == '2') {
				echo "<tr class= 'danger'>";
			}
			echo "<td>".$row->id_transaccion."</td>";
			echo "<td>".$row->cuenta."</td>";
			echo "<td>".$row->cantidad."</td>";		
			echo "<td>".$row->sucursal."</td>";
			echo "<td>".$row->referencia."</td>";
			echo "<td>".$row->tipo_mov."</td>";
			echo "<td>".$row->fecha."</td>";
			echo "<td>".$row->tarjeta."</td>";
		}
		
	 ?>
</table>
<div id="saldo_total">
	<h1>Saldo total:
		<span id="saldo_t">
			<?php
				foreach ($saldo as $row) {
					echo "$".$row->saldo;
				}
			?>		
		</span>
	 </h1>
</div>