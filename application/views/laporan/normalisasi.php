<style>
	table {
		border-collapse: collapse;
		table-layout: fixed;
		width: auto;
	}

	table th {
		text-align: center;
		background-color: tan;
	}

	table td {
		width: 15%;
	}

</style>
<html>

<head>
	<title>Cetak Normalisasi</title>
</head>

<body>
	<h2 style="text-align: center;">Agam Canary</h2>
	<h5 style="text-align: center;"><?="Tanggal Dicetak : ".date('d-m-Y');?></h5>
	<br><br>
	<div>

		<table border="1" align="center">
			<tr>
				<th colspan="6">Data Normalisasi</th>
			</tr>
			<tr>
				<th style="width: 10%;">#</th>
				<th>Nama Kenari</th>
				<th>K1</th>
				<th>K2</th>
				<th>K3</th>
				<th>K4</th>
			</tr>
			<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
			<tr>
				<td style="width: 5%;"><?= $no++?>.</td>
				<td align="center"><?= $data->nama_kenari?></td>
				<td><?= $data->C1?></td>
				<td><?= $data->C2?></td>
				<td><?= $data->C3?></td>
				<td><?= $data->C4?></td>
			</tr>
			<?php
                                    } ?>
		</table>

	</div>	
</body>

</html>
