<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Pengelola</h3>
                </div>
                <form action="<?php echo base_url();?>welcome/tambahakunpengelola" role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" placeholder="username" name="username" id="awal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" placeholder="password" name="password" id="akhir" required>
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

