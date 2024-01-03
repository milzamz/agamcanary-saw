<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Preferensi</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Preferensi</li>
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
				<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('kenari')?>" class="btn btn-primary">
						<i class="fa fa-plus"></i>  Tambah
					</a>
					<?php } ?>
					<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){?>
						<a href="<?=site_url('laporan/cetakrank')?>" target="_blank" class="btn btn-dark">
							<i class="fa fa-print"></i>Cetak
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="card-body table-responsive">
                <table id="hasill" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kenari</th>
							<th>Jenis Kelamin</th>
							<th>Preferensi</th>
							<th>Kesimpulan Kualitas</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($pref as $preferensi) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $preferensi['nama_kenari']?></td>
							<td><?= $preferensi['jenis_kelamin'] == 1 ? "Jantan" : "Betina"?></td>
							<!-- <td><?= number_format($preferensi['p'], 3,'.','')?></td> -->
							<td><?= $preferensi['p'] + 0?></td>
							<td><?php if ($preferensi['p'] > 0 && $preferensi['p'] <= 0.2) {
								echo "Tidak Bagus";
							} else if ($preferensi['p'] > 0.2 && $preferensi['p'] <= 0.4) {
								echo "Kurang Bagus";
							} elseif($preferensi['p'] > 0.4 && $preferensi['p'] <= 0.6){
								echo "Cukup Bagus";
							} elseif($preferensi['p'] > 0.6 && $preferensi['p'] <= 0.8){
								echo "Bagus";
							} elseif($preferensi['p'] > 0.8 && $preferensi['p'] <= 1){
								echo "Sangat Bagus";
							};?></td>
							<td class="text-center"><a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showdetail(<?= $preferensi['kenari_id']?>)" href="#modaldetail"><i class="fa fa-eye"></i>Detail</a></td>
						</tr>
						<?php
                                    } ?>
					</tbody>
			
					<tfoot>
						<tr>
							<th>Rangking</th>
							<th>Nama Kenari</th>
							<th>Jenis Kelamin</th>
							<th>Preferensi</th>
							<th>Kesimpulan Kualitas</th>
							<th>Action</th>
						</tr>
					</tf>
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
	$(function () {
		$("#hasill").DataTable({
			"responsive": true, 
		 	"lengthChange": true,
			"autoWidth": false,
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
						'columns': [0, 2, 3, 4]
					}
				},
				{
					'extend': 'excel',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 2, 3, 4]
					}
				}
				<?php if($this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 3){ ?>
				,{
					'extend': 'pdf',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 2, 3, 4]
					},
					'pageSize': 'A4'
				}
				<?php }?>
				,"colvis"
			],
			initComplete: function () {
				this.api().columns([1,2, 3, 4]).every(function () {
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
			$('#modaldetail').on('hide.bs.modal', function () { //Change #myModal with your modal id
      $('audio').each(function(){
        this.pause(); // Stop playing
        this.currentTime = 0; // Reset time
      }); 
})
		</script>




