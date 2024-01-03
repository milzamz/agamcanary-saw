<style>
    .just{
        text-align: justify;
        padding: 5px;
    }

	table th {
		text-align: center;
		background-color: gray;
	}

    .ket{
        text-align: left;
    }

	table td {
		text-align: left;
	}

    .nilai{
        text-align: center;
    }

</style>
<html>

<head>
	<title>Cetak Detail Kenari</title>
</head>

<body>
	<h2 style="text-align: center;">Agam Canary</h2>
	<h4 style="text-align: center;">Detail Hasil Kenari</h4>
	<h5 style="text-align: center;"><?="Tanggal Dicetak : ".date('d-m-Y');?></h5>
	<br><br>
    <table align="center" style="width: 500px;">
        <tr>
            <td>
            <table class="table" align="center" style="width: 500px;">
            <tr>
                <td rowspan="6" align="center" style="width: 200px;"><?php if($kenari[0]['gambar'] != null){?>
							<img src="<?=base_url('uploads/canary/'.$kenari[0]['gambar'])?>" style="width:200px">
						<?php } else {?>
							<img src="<?=base_url('uploads/canary/default.jpg')?>" style="width:200px">
						<?php } ?></td>
                <td>Nama</td>
                <td style="width: 10px;">:</td>
                <td><?=$kenari[0]['nama_kenari'];?></td>
            </tr>
            <tr>
                <td style="width: 40px;">Jenis</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['jenis']?></td>
            </tr>
            <tr>
             
                <td style="width: 40px;">JK</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['jenis_kelamin']== 1 ? "Jantan" : "Betina" ?></td>
            </tr>
            <tr>
                
                <td style="width: 40px;">Umur</td>
                <td style="width: 2px;">:</td>
                <td><?=$kenari[0]['umur_kenari']?> Bulan</td>
            </tr>
            <tr>
                
                <td colspan="3" style="width: 40px;">Keterangan</td>
            </tr>
            <tr>
                <td colspan="3" class="ket">
                    <?php if($kenari[0]['keterangan'] != null){
					 echo $kenari[0]['keterangan'];
                    } else {
							echo "Tidak ada keterangan...";
						 } ?>
                         </td>
            </tr>
        </table>
                         <br>
        <table border="1" style="table-layout: fixed; width:100%;" align="center">
            <tr style="background-color: gray;">
                <th>Kriteria</th>
                <th class="just">Deskripsi Nilai</th>
            </tr>
                <tr>
                    <td>Suara</td>
                    <td style="word-wrap: break-word" class="just"><?= ucfirst($detail[0]['des'])?></td>
                </tr>
                <tr>
                    <td>Postur</td>
                    <td style="word-wrap: break-word" class="just"><?=ucfirst($detail[1]['des'])?></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td style="word-wrap: break-word" class="just"><?=ucfirst($detail[2]['des'])?></td>
                </tr>
                <tr>
                    <td>Warna</td>
                    <td style="word-wrap: break-word" class="just"><?=ucfirst($detail[3]['des'])?></td>
                </tr>
        </table>
            </td>
        </tr>
    </table>
</body>

</html>
