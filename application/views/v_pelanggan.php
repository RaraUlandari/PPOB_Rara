<div class="block-header">
    <h2>Data Pelanggan</h2>
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
                        <th>#</th><th>Nama Pelanggan</th><th>Username</th><th>Password</th><th>Nomor kwh</th><th>Alamat</th><th>Daya</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=0;
                        foreach ($data_pelanggan as $pelanggan) {
                            $no++;
                            echo'<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$pelanggan->nama_pelanggan.'</td>
                                    <td>'.$pelanggan->username.'</td>
                                    <td>'.$pelanggan->password.'</td>
                                    <td>'.$pelanggan->nomor_kwh.'</td>
                                    <td>'.$pelanggan->alamat.'</td>
                                    <td>'.$pelanggan->daya.'</td>
                                    <td><a href="#update_pelanggan" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$pelanggan->id_pelanggan.')">Update</a>
                                        <a href='.base_url('index.php/pelanggan/delete_pelanggan/'.$pelanggan->id_pelanggan).' class="btn btn-danger"
                                        onclick="return confirm(\'Apa Anda Yakin??\')">Hapus</a>
                                    </td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div><!--/content-panel -->
    </div><!-- /col-md-12 -->
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>