<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Tambah User</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="<?=site_url('dashboard')?>">Home</a></li>
								<li class="breadcrumb-item"><a href="<?=site_url('user')?>">User</a></li>
								<li class="breadcrumb-item active">Tambah User</li>
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
                                <a href="<?=site_url('user')?>" class="btn btn-warning">
                                    <i class="fa fa-user-plus"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 offset-4">
                                    <?php //validation_errors(); ?>
                                    <form action="" method="post">
                                        <div class="form-group ">
                                            <label>Nama *</label>
                                            <input type="text"  name="fullname" value="<?= set_value('fullname')?>" class="form-control 
                                            <?php 
                                            if(form_error('fullname') == true){
                                                echo "is-invalid";}
                                            ?>">
                                                
                                            <?= form_error('fullname') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username *</label>
                                            <input type="text" name="username" value="<?= set_value('username')?>" class="form-control  <?php 
                                            if(form_error('username') == true){
                                                echo "is-invalid";}
                                            ?>">
                                            <?= form_error('username') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password *</label>
                                            <input type="password" name="password" value="<?= set_value('password')?>" class="form-control <?php 
                                            if(form_error('password') == true){
                                                echo "is-invalid";}
                                            ?>">
                                            <?= form_error('password') ?>
                                        </div>
                                        <div class="form-group <?= form_error('passconf') ? 'has_error' : null ?>">
                                            <label>Password Confirmation *</label>
                                            <input type="password" name="passconf" class="form-control  <?php 
                                            if(form_error('passconf') == true){
                                                echo "is-invalid";}
                                            ?>">
                                            <?= form_error('passconf') ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat </label>
                                            <textarea name="alamat" class="form-control"><?= set_value('alamat')?></textarea>
                                        </div>
                                        <div class="form-group <?= form_error('level') ? 'has_error' : null ?>">
                                            <label>Level *</label>
                                            <select name="level" class="form-control  <?php 
                                            if(form_error('level') == true){
                                                echo "is-invalid";}
                                            ?>">
                                                <option value="">- Pilih -</option>
                                                <option value="1"<?= set_value('level') == 1 ? "selected" : null?>>Pegawai</option>
                                                <option value="2"<?= set_value('level') == 2 ? "selected" : null?>>Admin</option>
                                                <?php if ($this->fungsi->user_login()->level == 3){?>
                                                <option value="3"<?= set_value('level') == 3 ? "selected" : null?>>Superadmin</option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('level') ?>
                                        </div>
                                        <div class="form-group justify-content-center">
                                            <button type="submit" class="btn btn-success btn-flat">Save</button>
                                            <button type="Reset" class="btn btn-danger btn-flat">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					<!--/. container-fluid -->
			</section>
			<!-- /.content -->