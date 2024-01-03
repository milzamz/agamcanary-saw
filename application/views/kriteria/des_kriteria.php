<div class="content-header">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
<div class="flash-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>


	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0">Deskripsi Kriteria</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
					<li class="breadcrumb-item active">Kriteria</li>
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
			</div>
			</div>
			<div class="card-body table-responsive">
				<div class="row">

					<div class="col-4 mx-auto" style="margin-bottom: 10px;" style="text-align: center;">
						<select style="text-align: center;" name="jenis_kelamin" id="desc" class="form-control">
							<option value="0">- Pilih Kriteria -</option>
							
							<?php foreach($row->result() as $key => $data){?>
							<option value="<?=$data->id_kriteria?>"><?=$data->nama_kriteria?></option>
							<?php } ?>
						</select>
					</div>
					</div>
					
				<table class="table  table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Kriteria</th>
							<th>Nilai</th>
							<th>Deskripsi</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody id="deskriteria">

					</tbody>
				</table>
			</div>
			<div class="card-footer">
			
			
		</div>
		</div>
	</div>
	<!--/. container-fluid -->
</section>
<!-- /.content -->



<!-- Modal -->
<div class="modal fade" id="modaleditdes">
        <div class="modal-dialog">
          <div class="modal-content" id="bodymodaleditdes">
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


	  <script>
            function showdetail(id_detail)
            {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('kriteria/modaleditdesc');?>",
                    data: "id_detail="+id_detail,
                    dataType: "html",
                    success: function (response) {
                        $('#bodymodaleditdes').empty();
                        $('#bodymodaleditdes').append(response);
                    }
                });
            }
        </script>


<script>
	$( document ).ready(function() {
	$.ajax({
                    type: "GET",
                    url: "<?=site_url('kriteria/tampil_des');?>",
                    dataType: "html",
                    success: function (response) {
                        $('#deskriteria').empty();
                        $('#deskriteria').append(response);
                    }
                })
});
</script>


<script>
            $('#desc').on('change', function(){
				$.ajax({
                    type: "post",
                    url: "<?=site_url('kriteria/get_des');?>",
                    data: "id_kriteria="+this.value,
                    dataType: "html",
                    success: function (response) {
                        $('#deskriteria').empty();
                        $('#deskriteria').append(response);
                    }
                })
			})
                
</script>
