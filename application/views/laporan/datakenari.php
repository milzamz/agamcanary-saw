<style>
	table{
		border-collapse: collapse;
		table-layout: fixed;
		width: 100%;
	}

	table th{
		text-align: center;
		background-color: tan;
	}
	
	table td{
		width: 15%;
	}
</style>
<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h2 style="text-align: center;">Agam Canary</h2>
<h5 style="text-align: center;"><?="Tanggal Dicetak : ".date('d-m-Y');?></h5>
<br><br>
<div>
<h2 style="text-align: left;">Data Normalisasi</h2>
<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Umur</th>
							<th>JK</th>
							<th>Status</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data->nama_kenari?></td>
							<td><?= $data->jenis_kenari?></td>
							<td><?= $data->umur_kenari?></td>
							<td><?= $data->jenis_kelamin == 1 ? "Jantan" : "Betina" ?></td>
							<td><?= $data->status == 1 ? "Siap" : "Tidak" ?></td>
							<td><?= $data->keterangan?></td>
						</tr>
						<?php
                                    } ?>
					</tbody>
				</table>
</div>
<br><br>
<table border="1" align="center">
						<tr>
							<th class="no">#</th>
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
							<td	><?= $data->C1?></td>
							<td><?= $data->C2?></td>
							<td><?= $data->C3?></td>
							<td><?= $data->C4?></td>
                        </tr>
                        <?php
                                    } ?>
</table>
</body>
</html>
