<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title.' Dengan Codeigniter' ?></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
<?php
if ($this->session->flashdata('alert')=='sukses_insert'){
    echo "<script>alert('Sukses Insert Data');</script>";
}else if ($this->session->flashdata('alert')=='sukses_edit'){
    echo "<script>alert('Sukses Edit Data');</script>";
}else if ($this->session->flashdata('alert')=='sukses_hapus'){
    echo "<script>alert('Sukses Hapus Data');</script>";
}

?>
<h2 style="text-align: center;margin-bottom: 30px"> Data Mahasiswa Dengan Codeigniter</h2>
<div class="container" style="margin-top: 20px;padding-left: 25px">
	<div class="col-md-12">
		<button class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambah">Tambah Data</button>
        <button class="btn btn-md btn-primary" onclick="location.href = '<?php echo site_url('Akun_C/logout') ?>';" >Logout</button>
        <div id="tambah" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"></button>
                        <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                    </div>
                    <?php echo form_open("home/add"); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label" for="nim">NIM</label>
                                <input type="text" name="nim" class="form-control" id="nim" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="telepon">Telepon</label>
                                <input type="text" name="telepon" class="form-control" id="telepon" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="container" style="margin-top: 20px">
	<div class="col-md-12">
		<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th> No</th>
					<th> NIM</th>
					<th> Nama </th>
					<th> Telepon</th>
					<th> Email</th>
					<th> Jurusan</th>
					<th> <center>Action</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($mahasiswa as $mhs) {
				?>
				<tr>
					<td><?php echo $no++;?></td>
					<td><?php echo $mhs->nim;?></td>
					<td><?php echo $mhs->nama; ?></td>
					<td><?php echo $mhs->telepon; ?></td>
					<td><?php echo $mhs->email; ?></td>
					<td><?php echo $mhs->jurusan; ?></td>			
					<td style="text-align: center;">
						<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit<?php echo $mhs->nim; ?>"><i class="glyphicon glyphicon-pencil"></i></button>
						<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus<?php  echo $mhs->nim; ?>"><i class="glyphicon glyphicon-trash"></i></button>
					</td>
				</tr>
                    <div id="edit<?php echo $mhs->nim; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                    <h4 class="modal-title">Edit Data Mahasiswa</h4>
                                </div>
                                <?php echo form_open("home/edit"); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label" for="nim">NIM</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $mhs->nim;?>" id="nim">
                                        <input type="hidden" name="nim" class="form-control" value="<?php echo $mhs->nim; ?>" id="nim" required>

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $mhs->nama;?>" id="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="telepon">Telepon</label>
                                        <input type="text" name="telepon" class="form-control" value="<?php echo $mhs->telepon;?>" id="telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input type="text" name="email" class="form-control" value="<?php echo $mhs->email;?>" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="jurusan">Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control" value="<?php echo $mhs->jurusan;?>" id="jurusan" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                    <input type="submit" class="btn btn-primary" name="edit" value="Edit">
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <div id="hapus<?php echo $mhs->nim;?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                    <h4 class="modal-title">Anda Ingin Menghapus?</h4>
                                    <?php echo form_open("home/hapus"); ?>
                                    <input type="hidden" name="nim" class="form-control" value="<?php echo $mhs->nim;?>" id="nim" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
                                    <input type="submit" class="btn btn-primary" name="hapus" value="Hapus">
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>


				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>