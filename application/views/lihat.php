<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Mahasiswa </h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>NRP</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($mahasiswa as $row) {?>
                        <tr>
                            <td><?php echo $row->nrp?></td>
                            <td><a href="<?php echo base_url()."welcome/lihatdetail/".base64_encode($row->nrp) ?>" target="_blank" class="btn btn-xs btn-primary">Lihat Detail</a></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>