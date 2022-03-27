<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['addplant'])){
   $name = $_POST['name'];
   $description = $_POST['description'];
   $api_key = $_POST['api_key'];
   $status = "Baik";
   $value = 39.90;
   $wktu = date('Y-m-d  H:i:s');

    //query
    $sql = "INSERT INTO plants (name, description, api_key, value, status, created_at) VALUES ('$name','$description','$api_key','$value','$status','$wktu') ";

    if(mysqli_query($conn,$sql)){
        echo '
            <div class="alert alert-success" role="alert">
                Data Tanaman Berhasil di Tambah!
            </div>
        ';
    }else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kontrol Sistem</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Tanaman</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="200px">Nama</th>
                        <th>Waktu 1</th>
                        <th>Waktu 2</th>
                        <th class="text-center"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fas fa-laptop-code"></i> Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- modal insert -->
<div class="example-modal">
  <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Tanaman Baru</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" role="form">
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Name <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Nama Tanaman" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Deskripsi <span class="text-red">*</span></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="description" placeholder="Deskripsi" value=""></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-user btn-block" name="addplant" value="add">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div><!-- modal insert close -->


<?php include 'footer.php'; ?>

<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>