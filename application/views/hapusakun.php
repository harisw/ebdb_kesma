<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">User</h3>
                </div>
                <form action="<?php echo base_url();?>welcome/hapusmahasiswa" role="form" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input class="form-control input-lg" type="text" placeholder="Ketikan Username" name="username" id="search ">
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
<script>
    var site_url = "<?php echo base_url(); ?>";
    var mahasiswa = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: {
            url: site_url+'welcome/typeahead'
            /*filter: function (countries) {
                return $.map(countries, function (country) {
                    return {
                        name: country
                    };
                });
            }*/
        }
    });

    mahasiswa.initialize();

    $('.form-control').typeahead(null, {
        displayKey: 'name',
        source: mahasiswa.ttAdapter()
    });
</script>