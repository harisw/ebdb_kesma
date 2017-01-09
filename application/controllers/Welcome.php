<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('ebdb');
	}

	public function index(){
		$this->load->view('login');
	}

	public function login(){
		$this->load->model('ebdb');
		$data =array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$query = $this->ebdb->login($data);
		if (sizeof($query)){
			$result = $query[0];
			$data = array(
				'username' => $result->username,
				'role' => $result->role
			);
			$this->session->set_userdata($data);
			if($result->role==3)
				redirect('welcome/mahasiswa');
			else{
				redirect('welcome/home');
			}
		}
		else{
			$this->session->set_flashdata('warning', 'Username atau password salah');
			redirect('/');
		}
	}

	public function gantipassword(){
			$data['pagename'] = "Ganti Password";
			$data['isi']="";
			$this->load->view('header',$data);
			$this->load->view('ganti_password');
			$this->load->view('footer');
	}

	public function do_gantipassword(){
		$user = $this->session->userdata('username');
		$oldpass = $this->input->post('old_pass');
		$newpass = $this->input->post('new_pass');

		$checkpass = $this->ebdb->ambilpassword($user);
		if($checkpass[0]->password == md5($oldpass)){
			$result = $this->ebdb->gantipassword($user, $newpass);
			$this->session->set_flashdata('password', 'ganti');
			redirect('welcome/home');
		}
		else{
			$this->session->set_flashdata('warning', 'Password lama yang anda masukkan salah');
			redirect('welcome/gantipassword');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function home(){
		if($this->session->flashdata('password') != null)	{
			$this->session->set_flashdata('ganti', 'done');
		}
		if($this->session->userdata('username')){
			if($this->session->userdata('role')!=3){
				$this->load->model('ebdb');
				$data['terdaftar'] = $this->ebdb->getcountmahasiswa();
				$data['isis']= $this->ebdb->getcountisi();
				$data['pengelola'] = $this->ebdb->getpengelolakaun();
				$data['pagename'] = "Control Panel";
				$data['isi']="";
				$this->load->view('header',$data);
				$this->load->view('dashboard');
				$this->load->view('footer');
			}
			else{
				redirect('welcome/mahasiswa');
			}
		}
		else{
			redirect('/');
		}
	}

	public function mahasiswa(){
		if($this->session->flashdata('ganti') != null){
			$data['ganti'] = 1;
			
		}
		else{
			$data['ganti'] = 0;
		}
		if ($this->session->userdata('role')==3) {
			$this->load->model('ebdb');
			$data['mahasiswa'] = $this->ebdb->getmahasiswa($this->session->userdata('username'));
			$data['pagename'] = "Data Mahasiswa";
			$data['isi'] = "Mahasiswa";

			$this->load->view('header', $data);
			$this->load->view('mahasiswa');
			$this->load->view('footer');
		}
		else{
			redirect('welcome/home');
		}
	}
	public function tambah(){
		if($this->session->userdata('username')) {
			$data['pagename'] = "Tambah Mahasiswa";
			$data['isi'] = "Mahasiswa";
            $data['x']=NULL;
			$this->load->view('header', $data);
			$this->load->view('tambah');
			$this->load->view('footer');
		}
		else{
			redirect('/');
		}
	}

	public function tambahmahasiswa(){
        $this->load->model('ebdb');
        $data =array(
            'awal' => $this->input->post('awal'),
            'akhir' => $this->input->post('akhir')
        );
		$data['x']=$this->ebdb->tambahmahasiswa($data);
		$error = $this->db->error();
        $this->session->set_flashdata('erronum',$error['code']+1);
        redirect('/welcome/tambah');
	}

    public function tambahsatumahasiswa(){
		$this->load->model('ebdb');
		$nrp = $this->input->post('nrp');
		$data['x']=$this->ebdb->tambahsatumahasiswa($nrp);
		$error = $this->db->error();
		$this->session->set_flashdata('erronum',$error['code']+1);
		redirect('/welcome/tambah');
    }

	public function lihat(){
		if($this->session->userdata('username')) {
			$this->load->model('ebdb');
			$data['mahasiswa'] = $this->ebdb->getnrpmahasiswa();
			$data['pagename'] = "Lihat Mahasiswa";
			$data['isi'] = "Mahasiswa";
			$this->load->view('header', $data);
			$this->load->view('lihat');
			$this->load->view('footer');
		}
		else{
			redirect('/');
		}
	}

	public function lihatdetail($nrp){
		if($this->session->userdata('role')==1 || $this->session->userdata('role')==2) {
			$this->load->model('ebdb');
			$real = base64_decode($nrp);
			$data['mahasiswa'] = $this->ebdb->getmahasiswa($real);
			$data['pagename'] = "Detail Mahasiswa";
			$data['isi'] = "Mahasiswa";
			$this->load->view('header', $data);
			$this->load->view('detail');
			$this->load->view('footer');
		}
		else{
			redirect('welcome/mahasiswa');
		}
	}

	public function penghasilan(){
		if($this->session->userdata('username')) {
			$data['pagename'] = "Penghasilan";
			$data['isi'] = "Grafik";
			$this->load->view('header', $data);
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		else{
			redirect('/');
		}
	}

	public function akunpengelola(){
		if($this->session->userdata('role')==1) {
			$data['pagename'] = "Tambah Akun Pengelola";
			$data['isi'] = "Kelola Akun";
			$data['x']=NULL;
			$this->load->view('header', $data);
			$this->load->view('akunpengelola');
			$this->load->view('footer');
		}
		else{
			redirect('/');
		}
	}

	public function tambahakunpengelola(){
		$this->load->model('ebdb');
		$data =array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$data['x']=$this->ebdb->tambahakunpengelola($data);
		$error = $this->db->error();
		$this->session->set_flashdata('erronum',$error['code']+1);
		redirect('/welcome/akunpengelola');
	}

	public function hapusakun(){
		if($this->session->userdata('role')==1 or $this->session->userdata('role')==2) {
			$data['pagename'] = "Hapus Akun";
			$data['isi'] = "Kelola Akun";
			$data['x']=NULL;
			$this->load->view('header', $data);
			$this->load->view('hapusakun');
			$this->load->view('footer');
		}
		else{
			redirect('/');
		}
	}

	public function typeahead(){
		$this->load->model('ebdb');
		$x = $this->ebdb->typeahead();
		$result = array();
		foreach($x as $row){
			$result[] = $row->username;
		}
		print_r(json_encode($result)) ;
	}

	public function hapusmahasiswa(){
		$username = $this->input->post('username');
		$this->load->model('ebdb');
		$query = $this->ebdb->hapusmahasiswa($username);
		redirect('welcome/hapusakun');
	}

	public function inputdatamahasiswa(){
		$data = array(
			'nrp'					=> $this->session->userdata('username'),
			'nama_lengkap' 			=> $this->input->post('a'),
			'tempat_lahir' 			=> $this->input->post('b'),
			'tanggal_lahir' 		=> date('Y-m-d',strtotime($this->input->post('c'))),
			'alamat_surabaya' 		=> $this->input->post('d'),
			'no_hp'		 			=> $this->input->post('e'),
			'jalur_diterima'		=> $this->input->post('f'),
			'beasiswa_sekarang' 	=> $this->input->post('g'),
			'biaya_ukt' 			=> $this->input->post('h'),
			'biaya_spi' 			=> $this->input->post('i'),
			'kebutuhan_bulan'		=> $this->input->post('j'),
			'nama_ayah' 			=> $this->input->post('k'),
			'pekerjaan_ayah'		=> $this->input->post('l'),
			'penghasilan_ayah'		=> $this->input->post('m'),
			'nama_ibu'	 			=> $this->input->post('n'),
			'pekerjaan_ibu'			=> $this->input->post('o'),
			'penghasilan_ibu'		=> $this->input->post('p'),
			'nama_wali' 			=> $this->input->post('q'),
			'pekerjaan_wali'		=> $this->input->post('r'),
			'penghasilan_wali'		=> $this->input->post('s'),
			'jumlah_saudara' 		=> $this->input->post('t'),
			'tagihan_listrik'		=> $this->input->post('u'),
			'tagihan_air' 			=> $this->input->post('v'),
			'tagihan_telepon'		=> $this->input->post('w'),
			'tagihan_pbb' 			=> $this->input->post('x'),
			'fasilitas_dimiliki'	=> $this->input->post('y'),
			'pernyataan_ukt'		=> $this->input->post('optionsRadios'),
			'alasan_ukt' 			=> $this->input->post('z'),
			'saran'		 			=> $this->input->post('saran')
		);
		$this->load->model('ebdb');
		$query = $this->ebdb->updatemahasiswa($data);
		redirect('welcome/mahasiswa');
	}

}
?>
