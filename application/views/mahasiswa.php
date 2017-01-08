<?php $data = $mahasiswa[0]; ?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="<?php echo base_url()?>welcome/inputdatamahasiswa" method="post" role="form">
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
                            <input type="text" class="form-control" value="<?php echo $data->nama_lengkap?>" name="a" required>
                        </div>
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" value="<?php echo $data->tempat_lahir?>" name="b" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <div class="input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="<?php $date = new DateTime($data->tanggal_lahir); echo $date->format('m/d/Y'); ?>" name="c" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat di Surabaya</label>
                            <input type="text" class="form-control" value="<?php echo $data->alamat_surabaya?>" name="d" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone</label>
                            <input type="text" class="form-control" value="<?php echo $data->no_hp?>" id="hp" name="e" required>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>DATA PERKULIAHAN</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Jalur Diterima</label>
                            <select class="form-control select2" style="width: 100%;" name="f" required>
                                <option value="<?php echo $data->jalur_diterima?>"><?php echo $data->jalur_diterima?></option>
                                <option value="SNMPTN">SNMPTN</option>
                                <option value="SNMPTN">SBMPTN</option>
                                <option value="PKM">PKM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Beasiswa yang sekarang didapat</label>
                            <textarea class="form-control" name="g" required><?php echo $data->beasiswa_sekarang?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Biaya UKT</label>
                            <input type="text" class="form-control" value="<?php echo $data->biaya_ukt?>" id="ukt" name="h" required>
                        </div>
                        <div class="form-group">
                            <label>Biaya SPI (JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->biaya_spi?>" id="spi" name="i" >
                        </div>
                        <div class="form-group">
                            <label>Total Kebutuhan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->kebutuhan_bulan?>" id="bulan" name="j" required>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>DATA KELUARGA</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_ayah?>" name="k" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ayah</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_ayah?>" name="l" required>
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_ayah?>" id="ukt" name="m" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_ibu?>" name="n" required>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Ibu</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_ibu?>" name="o" required>
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_ibu?>" id="ukt" name="p" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Wali (JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->nama_wali?>" name="q" >
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan Wali</label>
                            <input type="text" class="form-control" value="<?php echo $data->pekerjaan_wali?>" name="r" >
                        </div>
                        <div class="form-group">
                            <label>Penghasilan per Bulan</label>
                            <input type="text" class="form-control" value="<?php echo $data->penghasilan_wali?>" id="ukt" name="s" >
                        </div>
                        <div class="form-group">
                            <label>Jumlah Saudara</label>
                            <input type="number" class="form-control" value="<?php echo $data->jumlah_saudara?>" id="ukt" name="t" required >
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>RATA-RATA TAGIHAN PER BULAN</b></h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tagihan Listrik</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_listrik?>" id="ukt" name="u" required>
                        </div>
                        <div class="form-group">
                            <label>Tagihan Air(JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_air?>" id="ukt" name="v">
                        </div>
                        <div class="form-group">
                            <label>Tagihan Telepon(JIKA ADA)</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_telepon?>" id="ukt" name="w">
                        </div>
                        <div class="form-group">
                            <label>Tagihan PBB</label>
                            <input type="text" class="form-control" value="<?php echo $data->tagihan_pbb?>" id="ukt" name="x" required>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas yang dimiliki</label>
                            <textarea class="form-control" name="y" required><?php echo $data->fasilitas_dimiliki?></textarea>
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
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                                        YA
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="0">
                                        TIDAK
                                    </label>
                                </div>
                            <?php } else { ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
                                        YA
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="0" checked>
                                        TIDAK
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea class="form-control" name="z" required><?php echo $data->alasan_ukt?></textarea>
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