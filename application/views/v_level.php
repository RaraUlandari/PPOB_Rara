<div class="block-header">
    <h2>Data Level</h2>
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
                        <th>#</th><th>Id</th><th>Nama Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=0;
                        foreach ($data_level as $level) {
                            $no++;
                            echo'<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$level->id_level.'</td>
                                    <td>'.$level->nama_level.'</td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div><!--/content-panel -->
    </div><!-- /col-md-12 -->
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>