<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Banyak Mahasiswa</h3>
                </div>
                <form action="<?php echo base_url();?>welcome/tambahmahasiswa" role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NRP Awal</label>
                            <input type="text" class="form-control" placeholder="NRP" name="awal" id="awal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">NRP Akhir</label>
                            <input type="text" class="form-control" placeholder="NRP" name="akhir" id="akhir" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Satu Mahasiswa</h3>
                </div>
                <form action="<?php echo base_url();?>welcome/tambahsatumahasiswa" role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NRP</label>
                            <input type="text" class="form-control" name="nrp" placeholder="NRP" id="nrp" required>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php if ($this->session->flashdata('erronum')==1063 && $x==NULL){ ?>
    <script type="text/javascript">
        alertify.error('Data yang anda input telah ada');
    </script>
<?php } else if($this->session->flashdata('erronum')==1 && $x==NULL)  {?>
    <script type="text/javascript">
        alertify.success('Berhasil menambahkan data');
    </script>
<?php }?>
<script>
    $(document).ready(function () {
        $("#awal,#akhir,#nrp").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#errmsg").html("Hanya NRP").show().fadeOut("slow");
                return false;
            }
        });
        $("#awal,#akhir,#nrp").attr('maxlength','10');
    });
</script>
