<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Rating Kecocokan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Rating Kecocokan</li>
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
					<a href="<?=site_url('bobot/clear_data')?>" class="btn btn-danger tombol-hapus">
						<i class="fa fa-broom"></i>  Bersihkan Data
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="card-body table-responsive">
			<table id="ratingkecocokan" class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Kode Kenari</th>
							<th>Nama Kenari</th>
							<th>Jenis Kelamin</th>
							<th>K1</th>
							<th>K2</th>
							<th>K3</th>
							<th>K4</th>
							<th colspan="3" style="text-align: center;">Tanggal Input</th>
							<?php if($this->fungsi->user_login()->level == 1 || 3){?>
							<th style="text-align:center">Action</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
                                    foreach($row->result() as $key => $data) { ?>
						<tr>
							<td><?= $no++?>.</td>
							<td>A<?= $data->kenari_id?></td>
							<td><?= $data->nama_kenari?></td>
							<td><?= $data->jenis_kelamin == 1 ? "Jantan" : "Betina" ?></td>
							<td><?= $data->K1?></td>
							<td><?= $data->K2?></td>
							<td><?= $data->K3?></td>
							<td><?= $data->K4?></td>
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
								<td  style="text-align: left;"><?= $data->thn?></td>
							<td style="text-align: center;" width="160px">
							<?php if($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 3){?>
							<a href="<?=site_url('bobot/edit/'.$data->kenari_id)?>"  class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil-alt"></i> 
                                </a>
								<a href="<?=site_url('bobot/del/'.$data->kenari_id)?>" class="btn tombol-hapus btn-danger btn-xs">
									<i class="fa fa-trash"></i> 
								</a>
                                </form>
								<?php }?>
								<a class="btn btn-primary btn-xs" data-toggle="modal" onclick="showgambar(<?= $data->kenari_id?>)" href="#modalgambar"><i class="fa fa-eye"></i>Detail</a>
							</td>
						</tr>
						<?php
                                    } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Kode Kenari</th>
							<th>Nama Kenari</th>
							<th>Jenis Kelamin</th>
							<th>K1</th>
							<th>K2</th>
							<th>K3</th>
							<th>K4</th>
							<th>Tanggal</th>
							<th>Bulan</th>
							<th>Tahun</th>
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
<!-- /.content -->
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
	  <script>
			$('#modalgambar').on('hide.bs.modal', function () { //Change #myModal with your modal id
				$('audio').each(function(){
					this.pause(); // Stop playing
					this.currentTime = 0; // Reset time
				}); 
			})
		</script>
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
	$(function () {
		$("#ratingkecocokan").DataTable({
		"responsive": true, 
		"sLengthMenu": "Show _MENU_ entries",
		"language": {
			  "lengthMenu": 'Display <select>'+
			   '<option value="10">10</option>'+
			   '<option value="20">20</option>'+
			   '<option value="30">30</option>'+
			  '<option value="40">40</option>'+
			   '<option value="50">50</option>'+
			   '<option value="-1">All</option>'+
			   '</select> records',
			   "emptyTable": "Tidak ada Data!!"
			  },
		"lengthChange": true,
		"autoWidth": false,
		"columnDefs": [
				{ orderable: false, targets: 10 }
			],
		buttons: [{
			'extend' : 'copy', 
			'title' : 'Data Rating Kecocokan',
			'filename' : 'Nilai Kenari',
			'exportOptions' : {
				'columns' : [0,1,2,3,4,5,6,7,8,9,10]
			}
		}, 
		{
			'extend' : 'excel', 
			'title' : 'Data Rating Kecocokan',
			'filename' : 'Nilai Kenari',
			'exportOptions' : {
				'columns' : [0,1,2,3,4,5,6,7,8,9,10]
			}
		},
		{
			'extend' : 'pdf', 
			'messageTop': "Data Rating Kecocokan",
			'title' : 'Agam Canary',
			'filename' : 'Nilai Kenari',
			'download' : 'open',
			'exportOptions' : {
				'columns' : [0,1,2,3,4,5,6,7,8,9,10]
			},
			customize: function(doc) {
  doc.content[1].margin = [ 205, 0, 0, 0 ] //left, top, right, bottom
  doc.content[2].margin = [ 40, 20, 40, 0 ] //left, top, right, bottom
  doc.content[2].table.widths = ['5%', '20%', '20%', '5%', '5%', '5%', '5%', '5%', '5%', '15%','8%'];
},
			'pageSize' : 'A4'
		},
		"colvis"],
		initComplete: function () {
            this.api().columns([1,2,3,8,9,10]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
	}).buttons().container().appendTo('#ratingkecocokan_wrapper .col-md-6:eq(0)');
	});
	</script>

