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
                <?php echo form_open_multipart('welcome/inputdatamahasiswa2'); ?>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>RATA-RATA TAGIHAN PER BULAN</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tagihan Listrik</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_listrik?>" id="ukt" name="tagihan_listrik" required>
                        </div>
                        <div class="form-group">
                            <label>Tagihan Air(JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_air?>" id="ukt" name="tagihan_air">
                        </div>
                        <div class="form-group">
                            <label>Tagihan Telepon(JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_telepon?>" id="ukt" name="tagihan_telepon">
                        </div>
                        <div class="form-group">
                            <label>Tagihan PBB</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_pbb?>" id="ukt" name="tagihan_pbb" required>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas yang dimiliki</label>
                            <textarea class="form-control" name="fasilitas_dimiliki" required><?php echo $data->fasilitas_dimiliki?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Transporasi yang digunakan</label>
                            <textarea class="form-control" name="transportasi_sby" required><?php echo $data->transportasi_surabaya?></textarea>
                        </div>

                        <!-- Input Foto Rumah -->
                        <div class="container">
                            <div class="row">    
                                <div class="col-xs-12 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">  
                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                    <div class="input-group image-preview">
                                        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                                        <span class="input-group-btn">
                                            <!-- image-preview-clear button -->
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                            </button>
                                            <!-- image-preview-input -->
                                            <div class="btn btn-default image-preview-input">
                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                <span class="image-preview-input-title">Browse</span>
                                                <input type="file" name="input-file-preview"/> <!-- rename it -->
                                            </div>
                                        </span>
                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>INFORMASI LAIN</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Apakah UKT yang dikenakan sudah sesuai dengan kondisi keluarga?</label>
                            <?php if($data->pernyataan_ukt){?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pernyataan_ukt" id="optionsRadios1" value="1" checked>
                                        YA
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pernyataan_ukt" id="optionsRadios2" value="0">
                                        TIDAK
                                    </label>
                                </div>
                            <?php } else { ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pernyataan_ukt" id="optionsRadios1" value="1">
                                        YA
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="pernyataan_ukt" id="optionsRadios2" value="0" checked>
                                        TIDAK
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea class="form-control" name="alasan_ukt" required><?php echo $data->alasan_ukt?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Evaluasi / Saran untuk UKT kedepanya</label>
                            <textarea class="form-control" name="saran" required><?php echo $data->saran?></textarea>
                        </div>
                    </div>
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
