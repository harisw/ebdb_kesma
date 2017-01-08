<?php $data=$mahasiswa[0]?>
<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                </i><?php echo $data->nama_lengkap." - ".$data->nrp?>
                <small class="pull-right">Date: <?php echo date("d/m/Y")?></small>
            </h2>
        </div>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <address>
                Tempat Lahir    : <?php echo $data->tempat_lahir?><br>
                Tanggal Lahir   : <?php echo $data->tanggal_lahir?><br>
                Alamat Surabaya : <?php echo $data->alamat_surabaya?><br>
                Nomor Handphone : <?php echo $data->no_hp?><br>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <td>Jalur Diterima</td>
                    <td><?php echo $data->jalur_diterima?></td>
                </tr>
                <tr>
                    <td>Beasiswa Sekarang</td>
                    <td><?php echo $data->beasiswa_sekarang?></td>
                </tr>
                <tr>
                    <td>Biaya UKT</td>
                    <td><?php echo $data->biaya_ukt?></td>
                </tr>
                <tr>
                    <td>Biaya SPI</td>
                    <td><?php echo $data->biaya_spi?></td>
                </tr>
                <tr>
                    <td>Kebutuhan per Bulan</td>
                    <td><?php echo $data->kebutuhan_bulan?></td>
                </tr>
                <tr>
                    <td>Nama Ayah</td>
                    <td><?php echo $data->nama_ayah?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td><?php echo $data->pekerjaan_ayah?></td>
                </tr>
                <tr>
                    <td>Penghasilan Ayah</td>
                    <td><?php echo $data->penghasilan_ayah?></td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td><?php echo $data->nama_ibu?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td><?php echo $data->pekerjaan_ibu?></td>
                </tr>
                <tr>
                    <td>Penghasilan Ibu</td>
                    <td><?php echo $data->penghasilan_ibu?></td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td><?php echo $data->nama_wali?></td>
                </tr>
                <tr>
                    <td>Pekerjaan Wali</td>
                    <td><?php echo $data->pekerjaan_wali?></td>
                </tr>
                <tr>
                    <td>Penghasilan Wali</td>
                    <td><?php echo $data->penghasilan_wali?></td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td><?php echo $data->jumlah_saudara?></td>
                </tr>
                <tr>
                    <td>tagihan Listrik</td>
                    <td><?php echo $data->tagihan_listrik?></td>
                </tr>
                <tr>
                    <td>Tagihan Air</td>
                    <td><?php echo $data->tagihan_air?></td>
                </tr>
                <tr>
                    <td>Tagihan Telepon</td>
                    <td><?php echo $data->tagihan_telepon?></td>
                </tr>
                <tr>
                    <td>Tagihan PBB</td>
                    <td><?php echo $data->tagihan_pbb?></td>
                </tr>
                <tr>
                    <td>Fasilitas Dimiliki</td>
                    <td><?php echo $data->fasilitas_dimiliki?></td>
                </tr>
                <?php if($data->pernyataan_ukt==1){ ?>
                <tr>
                    <td>Pernyataan UKT</td>
                    <td>YA</td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td>Pernyataan UKT</td>
                    <td>YA</td>
                </tr>
                <?php } ?>
                <tr>
                    <td>Alasan Ukt</td>
                    <td><?php echo $data->alasan_ukt?></td>
                </tr>
                <tr>
                    <td>Saran</td>
                    <td><?php echo $data->saran?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="clearfix"></div>
</div>