<style type="text/css">
.tg  {margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-c3ow{text-align:center;vertical-align:top}
.tg .tg-0pky{text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg-sort-header::-moz-selection{background:0 0}
.tg-sort-header::selection{background:0 0}.tg-sort-header{cursor:pointer}
.tg-sort-header:after{content:'';float:right;margin-top:7px;visibility:hidden}
.tg-sort-header:hover:after{visibility:visible}
.tg-sort-asc:after,.tg-sort-asc:hover:after,.tg-sort-desc:after{visibility:visible;opacity:.4}
</style>
<html>

<head>
	<title>Cetak Perankingan</title>
</head>

<body>
	<h2 style="text-align: center;">Agam Canary</h2>
	<h5 style="text-align: center;"><?="Tanggal Dicetak : ".date('d-m-Y');?></h5>
	<br><br>
	<table id="tg-vk2C8"  border="1px" align="center" class="tg" style="table-layout: fixed; width:80%">
		<colgroup>
			<col style="width: 220px">
			<col style="width: 100px">
			<col style="width: 25px">
			<col style="width: 250px">
		</colgroup>
		<tbody>
	<?php $no = 1; foreach($pref as $p){?>
			<tr>
				<td class="tg-0pky" rowspan="6"><img src="<?=base_url('uploads/canary/'.$p['gambar'])?>" style="width:200px" style="height: 200px;"></td>
				<td class="tg-0lax">Ranking</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?=$no++?></td>
			</tr>
			<tr>
				<td class="tg-0lax">Nama</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?=$p['nama_kenari']?></td>
			</tr>
			<tr>
				<td class="tg-0lax">Jenis Kelamin</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?=$p['jenis_kelamin'] == 1 ? "Jantan" : "Betina"?></td>
			</tr>
			<tr>
				<td class="tg-0lax">Umur</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?=$p['umur_kenari']?> bulan</td>
			</tr>
			<tr>
				<td class="tg-0lax">Kualitas</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?php if ($p['p'] >= 0.9) {
								echo "Sangat Bagus";
							} else if ($p['p'] >= 0.7) {
								echo "Bagus";
						
							}else if ($p['p'] >= 0.5) {
								echo "Cukup Bagus";
						
							}else if ($p['p'] >= 0.3) {
								echo "Kurang Bagus";
						
							}else if ($p['p'] >= 0.1) {
								echo "Tidak Bagus";
						
							}else if ($p['p'] < 0.1) {
								echo "Tidak Bagus";
						
							};?></td>
			</tr>
			<tr>
				<td class="tg-0lax">Keterangan</td>
				<td class="tg-0lax">:</td>
				<td class="tg-0lax"><?=$p['keterangan']?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>

</html>
