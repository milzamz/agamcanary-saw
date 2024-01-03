<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Perangkingan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Perangkingan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
	<div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Perangkingan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Rekomendasi</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				  <div class="card">
			<div class="card-header">
				<div class="float-right">
				<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('kenari')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>  Tambah
					</a>
					<?php } ?>
					<a href="<?=site_url('penilaian/save')?>" class="btn btn-success">
						<i class="fa fa-print"></i>Simpan Data
					</a>
					<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){?>
						<a href="<?=site_url('laporan/cetakrank')?>" class="btn btn-dark">
							<i class="fa fa-print"></i>Cetak
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="card-body table-responsive">
                <table id="hasill" class="table table-striped">
					<thead>
						<tr>
							<th>Rangking</th>
							<th>Kenari</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($pref as $preferensi) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td>						
							<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"><?=$preferensi['nama_kenari']?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="container-fluid">
				  
  <div class="row">
    <div class="col-xs-12 col-md-4">
	<?php if($preferensi['gambar'] != null){?>
							<a data-toggle="modal" onclick="showgambar(<?= $preferensi['kenari_id']?>)" href="#modalgambar"><img src="<?=base_url('uploads/canary/'.$preferensi['gambar'])?>" style="width:200px" style="height: 200px;"></a>
						<?php } else {?>
							<a data-toggle="modal" onclick="showgambar(<?= $preferensi['kenari_id']?>)" href="#modalgambar"><img src="<?=base_url('uploads/canary/default.jpg')?>" style="width:200px" style="height: 200px;"></a>
						<?php } ?>
    </div>
    <div class="col-md-2">
      <div class="row">Nama Kenari</div>
      <div class="row">Jenis Kelamin</div>
      <div class="row">Kualitas</div>
    </div>
	<div class="col-md-2">
      <div class="row">: <?=$preferensi['nama_kenari']?></div>
      <div class="row">: <?= $preferensi['jenis_kelamin'] == 1 ? "Jantan" : "Betina"?></div>
      <div class="row">: <?php if ($preferensi['p'] > 0 && $preferensi['p'] <= 0.2) {
								echo "Tidak Bagus";
							} else if ($preferensi['p'] > 0.2 && $preferensi['p'] <= 0.4) {
								echo "Kurang Bagus";
							} elseif($preferensi['p'] > 0.4 && $preferensi['p'] <= 0.6){
								echo "Cukup Bagus";
							} elseif($preferensi['p'] > 0.6 && $preferensi['p'] <= 0.8){
								echo "Bagus";
							} elseif($preferensi['p'] > 0.8 && $preferensi['p'] <= 1){
								echo "Sangat Bagus";
							};?></div>
						</div>
						<div class="col-md-4">
						<div class="row">	
							<audio controls="true" class="audio">
							<source src="<?=base_url('uploads/canary/suara/'.$preferensi['kicau'])?>" type="audio/mpeg">
							</audio>
						</div>
						<div>
						<label style="color: chartreuse;"><?php if($preferensi['kicau'] == null) { echo "File audio belum di upload..!!";}?></label></div>          
						</div>
					</div>
					</div>
			  
              </div>
              <!-- /.card-body -->
            </div>
						
							</td>
							<td class="text-center"><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $preferensi['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
						</tr>
						<?php
                                    } ?>
					</tbody>
				</table>
			</div>
		</div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
				  <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              Rekomendasi Pasangan Berdasarkan Kriteria
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Suara</a>
                  <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Postur</a>
                  <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Warna</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
				  <div class="row">
					<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Jantan</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach($kjs as $js){?>
									<?php if ($js['C1'] < 0.4) { } else {?>
							<tr>
								<td><?= $js['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $js['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>

							<?php }} ?>
							</tbody>
						</table>
						</div>
						</div>
					<div class="col-sm-1">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">x</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kjs as $js){?>
							<tr>
								<td>x</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
						</div>
						</div>
						<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Betina</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kbs as $bs){?>
									<?php if ($bs['C1'] < 0.4){ } else {?>
							<tr>
								<td><?= $bs['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $bs['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>

							<?php }} ?>
							</tbody>
						</table>
						</div>
						</div>
					</div>  
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
				  <div class="row">
					<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Jantan</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kjp as $jp){?>
									<?php if ($jp['C2'] < 0.4){ } else {?>
							<tr>
								<td><?= $jp['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $jp['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>
							<?php }} ?>
							</tbody>
						</table>
						</div>
						</div>
					<div class="col-sm-1">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">x</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kjs as $js){?>
							<tr>
								<td>x</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
						</div>
						</div>
						<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Betina</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kbp as $bp){?>
									<?php if ($bp['C2'] < 0.4){ } else {?>
							<tr>
								<td><?= $bp['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $bp['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>
							<?php } } ?>
							</tbody>
						</table>
						</div>
						</div>
					</div>  
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
				  <div class="row">
					<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Jantan</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kjw as $jw){?>
									<?php if ($jw['C4'] < 0.4){ } else {?>
							<tr>
								<td><?= $jw['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $jw['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>
							<?php }} ?>
							</tbody>
						</table>
						</div>
						</div>
					<div class="col-sm-1">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">x</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kjs as $js){?>
							<tr>
								<td>x</td>
							</tr>
							<?php } ?>
							</tbody>
						</table>
						</div>
						</div>
						<div class="col">
					  <div class="table-responsive">
						  <table class="table table-hover table-sm ">
							<thead>
							<tr>
								<th scope="col">Betina</th>
								<th scope="col">Detail</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($kbw as $bw){?>
									<?php if ($bw['C4'] < 0.4){ } else {?>
							<tr>
								<td><?= $bw['nama_kenari']?></td>
								<td><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $bw['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
							</tr>
							<?php }} ?>
							</tbody>
						</table>
						</div>
						</div>
					</div>  
                  </div>
                </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
		
		
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->
<!-- <div class="modal fade" id="modaldetail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
						<h4 class="modal-title">Detail Nilai</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body" id="bodymodaldetail">
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div> -->
		<div class="modal fade" id="modaldetail"  role="dialog">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content" id="bodymodaldetail">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  <div class="modal fade" id="modalgambar">
        <div class="modal-dialog modal-dialog">
          <div class="modal-content" id="bodymodalgambar">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  

		<script>
            function showdetail(kenari_id)
            {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('penilaian/get_nilai');?>",
                    data: "kenari_id="+kenari_id,
                    dataType: "html",
                    success: function (response) {
                        $('#bodymodaldetail').empty();
                        $('#bodymodaldetail').append(response);
                    }
                });
            }
        </script>
		<script>
            function showgambar(kenari_id)
            {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('penilaian/get_gambar');?>",
                    data: "kenari_id="+kenari_id,
                    dataType: "html",
                    success: function (response) {
                        $('#bodymodalgambar').empty();
                        $('#bodymodalgambar').append(response);
                    }
                });
            }
        </script>
<script>
	$(function () {
		$("#hasill").DataTable({
			"responsive": true, 
		 	"lengthChange": true,
			"autoWidth": false,
			"columnDefs": [
    { "width": "5%", "targets": 0 }, { "width": "5%", "targets": 2 }, { "width": "90%", "targets": 1 }
  ],
			"language": {
			  "lengthMenu": 'Melihat <select>'+
			   '<option value="10">10</option>'+
			   '<option value="20">20</option>'+
			   '<option value="30">30</option>'+
			  '<option value="40">40</option>'+
			   '<option value="50">50</option>'+
			   '<option value="-1">All</option>'+
			   '</select> data',
			   "emptyTable": "Tidak ada Data!!"
			  },
			"buttons": [{
					'extend': 'copy',
					'exportOptions': {
						'columns': [0, 1, 2, 3, 4]
					}
				},
				{
					'extend': 'excel',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 1, 2, 3, 4]
					}
				}
				<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){ ?>
				,{
					'extend': 'pdf',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 1, 2, 3, 4]
					},
					'pageSize': 'A4'
				}
				<?php }?>
				,"colvis"
			],
			initComplete: function () {
				this.api().columns([1, 2, 3, 4, 5]).every(function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function (d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
		}).buttons().container().appendTo('#hasill_wrapper .col-md-6:eq(0)');
	});

</script>
<script>
		document.addEventListener('play', function(e){
    var audios = document.getElementsByTagName('audio');
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i] != e.target){
            audios[i].pause();
        }
    }
}, true);
		</script>




