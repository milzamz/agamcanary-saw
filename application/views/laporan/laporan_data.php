<div class="content-header">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
	<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Kenari</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Kenari</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card">
        <div class="card-header">
				<h3 class="card-title"></h3>
				<div class="float-right">
					<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('penilaian/preferensi')?>" class="btn btn-light">
						<i class="fa fa-plus"></i>  Tambah
					</a>
					<a href="<?=site_url('laporan/clear_data')?>" class="btn btn-danger tombol-hapus">
						<i class="fa fa-broom"></i>  Bersihkan Data
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
                                    foreach($hasil as $preferensi) { ?>
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
							<a data-toggle="modal" onclick="showgambar(<?= $preferensi['kenari_id']?>)" href="#modalgambar"><img src="<?=base_url('uploads/canary/'.$preferensi['gambar'])?>" style="width:200px"></a>
						<?php } else {?>
							<a data-toggle="modal" onclick="showgambar(<?= $preferensi['kenari_id']?>)" href="#modalgambar"><img src="<?=base_url('uploads/canary/default.jpg')?>" style="width:200px"></a>
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
      <div class="row">: <?php if ($preferensi['nilai_p'] > 0 && $preferensi['nilai_p'] <= 0.2) {
								echo "Tidak Bagus";
							} else if ($preferensi['nilai_p'] > 0.2 && $preferensi['nilai_p'] <= 0.4) {
								echo "Kurang Bagus";
							} elseif($preferensi['nilai_p'] > 0.4 && $preferensi['nilai_p'] <= 0.6){
								echo "Cukup Bagus";
							} elseif($preferensi['nilai_p'] > 0.6 && $preferensi['nilai_p'] <= 0.8){
								echo "Bagus";
							} elseif($preferensi['nilai_p'] > 0.8 && $preferensi['nilai_p'] <= 1){
								echo "Sangat Bagus";
							};?></div>
						</div>
						<div class="col-md-4">	
						<div class="row">
							<audio controls="true" class="audio">
							<source src="<?=base_url('uploads/canary/suara/'.$preferensi['kicau'])?>" type="audio/mpeg">
							</audio>
						</div>
						<div class="row"><label style="color: chartreuse;"><?php if($preferensi['kicau'] == null) { echo "File audio belum di upload..!!";}?></label></div>          
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
