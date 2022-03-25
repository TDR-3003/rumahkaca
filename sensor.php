<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['addsensor'])){
   $name = $_POST['name'];
   $type = $_POST['type'];
   $api_key = $_POST['api_key'];
   $value = 20;
   $wktu = date('Y-m-d  H:i:s');

    //query
    $sql = "INSERT INTO sensors (name, type, api_key, value, created_at) VALUES ('$name','$type','$api_key','$value','$wktu') ";

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

if(isset($_POST['delete'])){
    // var_dump($_POST['id']);
    $id = $_POST['id'];
    $sql = "DELETE FROM sensors WHERE id = '".$id."'";
    if(mysqli_query($conn,$sql)){
    echo '
        <div class="alert alert-danger" role="alert">
            Data Sensor Telah di Hapus!
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
    <h1 class="h3 mb-0 text-gray-800">Informasi Sensor</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Sensor</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="200px">Nama</th>
                        <th class="text-center">Type</th>
                        <th width="100px" class="text-center">Sensor</th>
                        <th width="250px" class="text-center">Tanggal Masuk</th>
                        <th width="200px" class="text-center"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahsensor"><i class="fas fa-laptop-code"></i> Tambah</a></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sensors = query("SELECT * FROM sensors order by 'id' asc ");
                        foreach ($sensors as $sensor) :
                    ?>
                    <tr>
                        <td><?= $sensor['name']; ?></td>
                        <td class="text-center"><?= $sensor['type']; ?></td>
                        <td class="text-center"><?= $sensor['value']; ?></td>
                        <td class="text-center"><?= $sensor['created_at']; ?></td>
                        <td class="text-center">
                        <form action="" method="post">
                            <button type="button" class="btn btn-success">Edit</button>
                            <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                            <input type="hidden" name="id" value="<?= $sensor['id'];?>">
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- modal insert -->
<div class="example-modal">
  <div id="tambahsensor" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Tambah Sensor Baru</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form action="" method="post" role="form">
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Name <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Nama Sensor" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Type <span class="text-red">*</span></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="type" placeholder="Type" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Api Key <span class="text-red">*</span></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="api_key" placeholder="Api" id="api_key" value="">
              </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-user btn-block" name="addsensor" value="add">Simpan</button>
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