<div class="content-header">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
	<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-1">
				<h1 class="m-0">Kenari</h1>
			</div><!-- /.col -->
			<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<div class="col-sm-1 mt-1">
					<button type="button" class="btn btn-block btn-success btn-xs" data-toggle="modal" href="#modalhelp">Bantuan</button>
					</div>
					<?php } ?>
			<div class="col-sm-10">
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
					<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
					<a href="<?=site_url('kenari/add')?>" class="btn btn-primary">
						<i class="fa fa-user-plus"></i>Tambah
					</a>
					<?php } ?>
					<!-- <form action="<?=site_url('kenari/new')?>" method="post">
					<input type="date" name="tanggal" id="tanggal">
						<button type="submit">submit</button>
				</form> -->
				</div>

			</div>
			<div class="card-body table-responsive">
				<table id="kenari" class="table table-bordered table-striped">
					
					<thead>
						<tr>
							<th style="vertical-align: middle;" rowspan="2">#</th>
							<th style="vertical-align: middle;"  rowspan="2">Nama</th>
							<th style="vertical-align: middle;"  rowspan="2">Jenis</th>
							<th style="vertical-align: middle;"  rowspan="2">Umur <small class="text-muted">(bulan)</small></th>
							<th style="vertical-align: middle;"  rowspan="2">JK</th>
							<th style="vertical-align: middle;"  rowspan="2">Status</th>
							<th style="vertical-align: middle;"  rowspan="2">Induk</th>
						<th colspan="3" style="text-align: center;">Tanggal Input</th>
						<?php if($this->fungsi->user_login()->level == 1 || 3){?>
							<th style="vertical-align: middle;"  rowspan="2" style="text-align:center">Action</th>
							<?php } ?>
						</tr>
						<tr>
							
							<th>Tgl</th>
							<th>Bln</th>
							<th>Thn</th>
							
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td><?= $data->nama_kenari?></td>
							<td><?= $data->jen?></td>
							<td><?= $data->k?></td>
							<td><?= $data->jenis_kelamin == 1 ? "Jantan" : "Betina" ?></td>
							<td><?= $data->status == 1 ? "Siap" : "Tidak" ?></td>
							<td><?= $data->induk1?> x <?= $data->induk2?></td>
							<td style="text-align: right;"><?= $data->tgl?></td>
							<td style="text-align: center;"><?php switch($data->bln){
								case "1":
									echo "Januari";
									break;
								case "2":
									echo "Februari";
									break;
								case "3":
									echo "Maret";
									break;
								case "4":
									echo "April";
									break;
								case "5":
									echo "Mei";
									break;
								case "6":
									echo "Juni";
									break;
								case "7":
									echo "Juli";
									break;
								case "8":
									echo "Agustus";
									break;
								case "9":
									echo "September";
									break;
								case "10":
									echo "Oktober";
									break;
								case "11":
									echo "November";
									break;
								case "12":
									echo "Desember";
									break;
							}
							?></td>
							<td style="text-align: left;"><?= $data->thn?></td>
							<td class="text-center" width="200px">
							<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
								<a href="<?php 
								if($data->status == 1){
									echo site_url('kenari/bobot/'.$data->kenari_id);
								} else {
									echo site_url('kenari/gagal');
								};
								?>" class="btn btn-success btn-xs">
									<i class="fa fa-plus"></i>
									Process
								</a>
								
								<a href="<?=site_url('kenari/edit/'.$data->kenari_id)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil-alt"></i>
								</a>

								<a href="<?=site_url('kenari/del/'.$data->kenari_id)?>"
									class="btn btn-danger btn-xs tombol-hapus">
									<i class="fa fa-trash"></i>
								</a>
								</form>
								<?php } ?>
								<a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showgambar(<?= $data->kenari_id?>)" href="#modalgambar"><i class="fa fa-eye"></i>Detail</a>
							</td>
						</tr>
						<?php
                                    } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Nama</th>
							<th>Jenis</th>
							<th>Umur</th>
							<th>JK</th>
							<th>Status</th>
							<th>Induk</th>
							<th></th>
							<th></th>
							<th></th>
							<?php if($this->fungsi->user_login()->level == 1 || 3){?>
							<th style="text-align:center">Action</th>
							<?php } ?>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>

<div class="modal fade" id="modalgambar">
        <div class="modal-dialog">
          <div class="modal-content" id="bodymodalgambar">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

	  <div class="modal fade" id="modalhelp">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Bantuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>1. Klik tombol tambah untuk menambahkan data kenari.</p>
              <p>2. Klik tombol pensil pada tabel untuk mengedit data kenari.</p>
              <p>3. Klik tombol tempat sampah pada tabel untuk menghapus data kenari.</p>
              <p>4. Klik tombol process untuk menambahkan nilai kenari.</p>
              <p>5. Klik tombol detail untuk melihat keterangan, foto dan audio kenari.</p>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

	  <script>
            function showgambar(kenari_id)
            {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('kenari/get_detail');?>",
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
			$('#modalgambar').on('hide.bs.modal', function () { //Change #myModal with your modal id
      $('audio').each(function(){
        this.pause(); // Stop playing
        this.currentTime = 0; // Reset time
      }); 
})
		</script>

<script>
	$(function () {
		$("#kenari").DataTable({
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
			"columnDefs": [
				{ orderable: false, targets: [1,10] }
			],
			"columnDefs": [
				{"className": "dt-center", "targets": "_all"}
			],
			"buttons": [{
					'extend': 'copy',
					'exportOptions': {
						'columns': [0, 2, 3, 4, 5, 6, 7, 8,9]
					}
				},
				{
					'extend': 'excel',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 2, 3, 4, 5, 6, 7, 8,9]
					}
				},
				{
					'extend': 'pdf',
					'title': 'Data Kenari',
					'filename': 'Data Kenari',
					'exportOptions': {
						'columns': [0, 2, 3, 4, 5, 6, 7, 8, 9]
					},
					customize: function (doc) {
						doc.content[1].table.widths = ['5%', '10%', '10%', '10%', '10%',
							'10%', '10%', '10%', '10%' 
						];
						
						doc.styles.tableBodyEven.alignment = 'center';
						doc.styles.tableBodyOdd.alignment = 'center';
					},
					'pageSize': 'A4'
				},
				"colvis"
			],
			initComplete: function () {
				this.api().columns([1,2, 3, 4, 5, 6, 7, 8]).every(function () {
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
		}).buttons().container().appendTo('#kenari_wrapper .col-md-6:eq(0)');
	});

</script>
