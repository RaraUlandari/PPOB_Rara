<div class="block-header">
    <h2>Tarif</h2>
</div>
<div class="row clearfix">
    <div class="panel">
        <div class="panel-heading">
            <a href="#tambah" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus">Tambah</span></a>
        </div>
        <div class="body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th><th>Daya</th><th>Tarif (/kwh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=0;
                        foreach ($data_tarif as $tarif) {
                            $no++;
                            echo'<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$tarif->daya.'</td>
                                    <td>'.$tarif->tarifperkwh.'</td>
                                    <td><a href="#update_tarif" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$tarif->id_tarif.')">Update</a>
                                        <a href='.base_url('index.php/tarif/delete_tarif/'.$tarif->id_tarif).' class="btn btn-danger"
                                        onclick="return confirm(\'Apa Anda Yakin??\')">Hapus</a>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div><!--/content-panel -->
    </div><!-- /col-md-12 -->
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!-- tambah -->
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Tarif</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/tarif/create_tarif')?>" method="post" enctype="multipart/form-data">
          Daya 
          <input type="number" class="form-control" name="daya">
          <br>
          tarifperkwh 
          <input type="number" class="form-control" name="tarifperkwh">
          <br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- update -->
<div class="modal fade" id="update_admin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update admin</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/admin/update_admin')?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_admin" id="id_admin">
          Nama admin 
          <input id="nama_admin" type="text" name="nama_admin" class="form-control"><br>
          Username 
          <input type="text" class="form-control" name="username" id="username">
          <br>
          Password
          <input type="password" class="form-control" name="password" id="password">
          <br>
          <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
function tm_detail(id_admin){
  $.getJSON("<?=base_url()?>index.php/admin/get_detail/"+id_admin,function(data){
    $("#id_admin").val(data['id_admin']);
    $("#nama_admin").val(data['nama_admin']);
    $("#username").val(data['username']);
    $("#password").val(data['password']);
  });
}
</script>