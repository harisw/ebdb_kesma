<?php

Class Ebdb extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database('default', 'true');
    }

    public function login($data){
        $this->db->reconnect();
        $username = $data['username'];
        $password = $data['password'];
        $query = $this->db->query("SELECT username, role from user where username='".$username."'
                                        and password = md5('".$password."');");
        if($query)
        {
            return $query->result();
        }
        else
            return false;
    }

    public function ambilpassword($user_in){
      $this->db->reconnect();

      $query = $this->db->query("SELECT password from user where username = '".$user_in."';");

      return $query->result();
    }
    public function gantipassword($user_in, $pass){
        $this->db->reconnect();
        $query = $this->db->query("UPDATE user SET password = md5('".$pass."') WHERE username = '".$user_in."';");
    }

    public function tambahmahasiswa($data){
        $this->db->reconnect();
        $awal = $data['awal'];
        $akhir = $data['akhir'];
        $query = $this->db->query("CALL sp_tambahmhs('$awal','$akhir');");
    }
    public function tambahsatumahasiswa($data){
        $this->db->reconnect();
        $this->db->query("INSERT INTO USER VALUES('$data',MD5('$data'),3);");
        $this->db->query("INSERT INTO data_mahasiswa (nrp,status_isi) VALUES($data,0);");
    }

    public function getcountmahasiswa(){
        $this->db->reconnect();
        $query = $this->db->query("SELECT COUNT(*   ) AS total FROM USER WHERE role=3");
        if($query)
        {
            return $query->row()->total;
        }
        else
            return false;
    }

    public function getcountisi(){
        $this->db->reconnect();
        $query = $this->db->query("SELECT COUNT(*) AS isi FROM data_mahasiswa WHERE  status_isi=1");
        return $query->row()->isi;
    }

    public function getnrpmahasiswa(){
        $this->db->reconnect();
        $query = $this->db->query("SELECT nrp FROM data_mahasiswa;");
        return $query->result();
    }

    public function getpengelolakaun(){
        $this->db->reconnect();
        $query = $this->db->query("SELECT COUNT(*) as pengelola FROM USER WHERE role=2;");
        return $query ? $query->row()->pengelola : false;
    }

    public function tambahakunpengelola($data){
        $this->db->reconnect();
        $username = $data['username'];
        $password = $data['password'];
        $query = $this->db->query("INSERT INTO USER VALUES('$username',MD5('$password'),2);");
    }

    public function typeahead(){
        $this->db->reconnect();
        $query = $this->db->query("SELECT username FROM USER WHERE role=3");
        return $query->result();
    }

    public function hapusmahasiswa($data){
        $this->db->reconnect();
        $query = $this->db->query("CALL sp_hapusmahasiswa($data)");
    }

    public function getmahasiswa($data){
        $this->db->reconnect();
        $query = $this->db->query("SELECT * FROM data_mahasiswa WHERE nrp='$data'");
        return $query->result();
    }

    public function updatemahasiswa1($data){
        $this->db->reconnect();
        $nrp                = $data['nrp'];
        $nama_lengkap       = $data['nama_lengkap'];
		$tempat_lahir       = $data['tempat_lahir'];
        $tanggal_lahir      = $data['tanggal_lahir'];
        $alamat_surabaya    = $data['alamat_surabaya'];
        $no_hp              = $data['no_hp'];
        $jalur_diterima     = $data['jalur_diterima'];
        $beasiswa_sekarang  = $data['beasiswa_sekarang'];
        $biaya_ukt          = $data['biaya_ukt'];
        $biaya_spi          = $data['biaya_spi'];
        $kebutuhan_bulan    = $data['kebutuhan_bulan'];
        $nama_ayah          = $data['nama_ayah'];
        $pekerjaan_ayah     = $data['pekerjaan_ayah'];
        $penghasilan_ayah   = $data['penghasilan_ayah'];
        $nama_ibu           = $data['nama_ibu'];
        $pekerjaan_ibu      = $data['pekerjaan_ibu'];
        $penghasilan_ibu    = $data['penghasilan_ibu'];
        $nama_wali          = $data['nama_wali'];
        $pekerjaan_wali     = $data['pekerjaan_wali'];
        $penghasilan_wali   = $data['penghasilan_wali'];
        $jumlah_saudara     = $data['jumlah_saudara'];
        $query              = $this->db->query("UPDATE data_mahasiswa
                                                SET
                                                nama_lengkap='$nama_lengkap',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',
                                                alamat_surabaya='$alamat_surabaya',no_hp='$no_hp',jalur_diterima='$jalur_diterima',beasiswa_sekarang='$beasiswa_sekarang',
                                                biaya_ukt='$biaya_ukt',biaya_spi='$biaya_spi',kebutuhan_bulan='$kebutuhan_bulan',nama_ayah='$nama_ayah',
                                                pekerjaan_ayah='$pekerjaan_ayah',penghasilan_ayah='$penghasilan_ayah',nama_ibu='$nama_ibu',
                                                pekerjaan_ibu='$pekerjaan_ibu',penghasilan_ibu='$penghasilan_ibu',nama_wali='$nama_wali',
                                                pekerjaan_wali='$pekerjaan_wali',penghasilan_wali='$penghasilan_wali',jumlah_saudara='$jumlah_saudara'
                                                WHERE nrp='$nrp'");
    }

    public function updatemahasiswa2($data){
                $this->db->reconnect();
        $nrp                = $data['nrp'];
        $tagihan_listrik    = $data['tagihan_listrik'];
        $tagihan_air        = $data['tagihan_air'];
        $tagihan_telepon    = $data['tagihan_telepon'];
        $tagihan_pbb        = $data['tagihan_pbb'];
        $fasilitas_dimiliki = $data['fasilitas_dimiliki'];
        $transportasi_sby   = $data['transportasi_sby'];
        $foto_rumah         = $data['foto_rumah'];
        $pernyataan_ukt     = $data['pernyataan_ukt'];
        $alasan_ukt         = $data['alasan_ukt'];
        $saran              = $data['saran'];
        $query              = $this->db->query("UPDATE data_mahasiswa
                                                SET
                                                tagihan_listrik='$tagihan_listrik',tagihan_air='$tagihan_air',tagihan_telepon='$tagihan_telepon',
                                                tagihan_pbb='$tagihan_pbb',fasilitas_dimiliki='$fasilitas_dimiliki'
                                                    ,transportasi_surabaya='$transportasi_sby',tampak_depan_rumah='$foto_rumah',pernyataan_ukt='$pernyataan_ukt',
                                                alasan_ukt='$alasan_ukt',saran='$saran',status_isi='1'
                                                WHERE nrp='$nrp'");
    }
}
?>