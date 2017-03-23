<script type="text/javascript">

  $(document).ready(function(){
      $("#myModal").modal('show');
  });
</script>


<?php if($ganti == 1) {?>
  <div id="myModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <h4>Password has been changed</h4>
              </div>
          </div>
      </div>
  </div>
<?php } ?>

<?php $data = $mahasiswa[0]; ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="<?php echo base_url()?>welcome/inputdatamahasiswa1" method="post" role="form">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>DATA DIRI</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" class="form-control" placeholder="<?php echo $data->nrp?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_lengkap?>" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?php echo $data->tempat_lahir?>" name="tempat_lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="<?php $date = new DateTime($data->tanggal_lahir); echo $date->format('m/d/Y'); ?>" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat di Surabaya</label>
                            <input type="text" class="form-control" value="<?php echo $data->alamat_surabaya?>" name="alamat_surabaya" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="text" class="form-control" value="<?php echo $data->no_hp?>" id="hp" name="no_hp" required>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>DATA PERKULIAHAN</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Jalur Diterima</label>
                            <select class="form-control select2" style="width: 100%;" name="jalur_diterima" required>
                                <option value="<?php echo $data->jalur_diterima?>"><?php echo $data->jalur_diterima?></option>
                                <option value="SNMPTN">SNMPTN</option>
                                <option value="SNMPTN">SBMPTN</option>
                                <option value="PKM">PKM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Beasiswa yang sekarang didapat</label>
                            <textarea class="form-control" name="beasiswa_sekarang" required><?php echo $data->beasiswa_sekarang?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Biaya UKT</label>
                            <input type="text" class="form-control" value="<?php echo $data->biaya_ukt?>" id="ukt" name="biaya_ukt" required>
                        </div>
                        <div class="form-group">
                            <label>Biaya SPI (JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->biaya_spi?>" id="spi" name="biaya_spi" >
                        </div>
                        <div class="form-group">
                            <label>Total Kebutuhan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->kebutuhan_bulan?>" id="bulan" name="kebutuhan_bulan" required>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>DATA KELUARGA</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_ayah?>" name="nama_ayah" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_ayah?>" name="pekerjaan_ayah" required>
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_ayah?>" id="ukt" name="penghasilan_ayah" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_ibu?>" name="nama_ibu" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_ibu?>" name="pekerjaan_ibu" required>
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_ibu?>" id="ukt" name="penghasilan_ibu" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Wali (JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_wali?>" name="nama_wali" >
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Wali</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_wali?>" name="pekerjaan_wali" >
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_wali?>" id="ukt" name="penghasilan_wali" >
                        </div>
                        <div class="form-group">
                            <label>Jumlah Saudara</label>
                            <input type="number" class="form-control" value="<?php echo $data->jumlah_saudara?>" id="ukt" name="jumlah_saudara" required >
                        </div>
                    </div>
                    <div class="box-header with-border">
                    <?php if ($data->status_isi) { ?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    <?php }else {?>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $('#datepicker').datepicker({
        autoclose: true
    });
    $(document).ready(function () {
        $("#ukt,#spi,#bulan,#hp").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#errmsg").html("Hanya NRP").show().fadeOut("slow");
                return false;
            }
        });
    });
</script>
