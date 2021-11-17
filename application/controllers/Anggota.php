<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Anggota_model","anggota");
        $this->load->model("Peraturan_model","peraturan");
	}

	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	public function comingsoon()
	{
		$this->load->view('admin/404');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}
	public function logout()
	{
		$this->anggota->logout();
		redirect('anggota/login');
	}
	public function loginaction()
	{
		// jika form login disubmit
        if ($this->input->post()) {
            if ($this->anggota->doLogin()) {
                redirect('anggota/peraturan');
                
            } else {
                echo "<script>
                alert('Username atau Password yang anda masukan Salah!');
                window.location.href='login';
                </script>";
            }
        }
	}

	public function register()
	{
		$this->load->view('admin/register');
	}

	public function registeraction()
	{
		if($this->anggota->save())
		{
			echo "<script>
                alert('Pendaftaran Berhasil! Silahkan Login');
                window.location.href='login';
                </script>";
		}else
		{
			echo "<script>
                alert('Pendaftaran gagal! Silahkan Hubungi Admin!');
                window.location.href='';
                </script>";
		};
	}
	public function anggota()
	{
		$data['anggota'] = $this->anggota->getAll();
		$this->load->view('admin/anggota/index',$data);	
	}
	
	public function profileanggota($nra = null)
	{
		$data['anggota'] = $this->anggota->getByIdresult($nra);
		$this->load->view('admin/anggota/profile',$data);
	}
	
	public function anggotaedit($nra)
	{
		$data['anggota'] = $this->anggota->getById($nra);
		$this->load->view('admin/anggota/edit',$data);	
	}

	public function updateanggota($nra = null)
	{
		if ($this->input->post()) {
            if ($this->anggota->update($nra)) {
                echo "<script>
                alert('Anggota Telah Diperbaharui!');
                window.location.href='anggota';
                </script>";
                
            } else {
                echo "<script>
                alert('Gagal Memperbaharui Anggota! Silahkan Hubungi Admin);
                window.location.href='editanggota';
                </script>";
            }
        }
	}

	public function peraturan()
	{
		$data['peraturan'] = $this->peraturan->terbaru();
		$this->load->view('admin/peraturan/index',$data);
	}
	
	public function tambahperaturan()
	{
		$this->load->view('admin/peraturan/tambah');
	}
	
	public function editperaturan($id_peraturan)
	{
		$data['peraturan'] = $this->peraturan->getbyId($id_peraturan);
		$this->load->view('admin/peraturan/edit',$data);
	}
	public function pendingperaturan()
	{
		$data["peraturan"] = $this->peraturan->menunggu();
		$this->load->view('admin/peraturan/pending',$data);
	}
	public function addperaturan()
	{
		if ($this->input->post()) {
            if ($this->peraturan->save()) {
                echo "<script>
                alert('Peraturan Baru Telah Ditambahkan!');
                window.location.href='peraturan';
                </script>";
                
            } else {
                echo "<script>
                alert('Gagal Menambahkan Peraturan! Silahkan Hubungi Admin);
                window.location.href='tambahperaturan';
                </script>";
            }
        }
	}
	public function updateperaturan($id_peraturan =null)
	{
		if ($this->input->post()) {
            if ($this->peraturan->update($id_peraturan)) {
                echo "<script>
                alert('Peraturan Telah Diperbaharui!');
                window.location.href='peraturan';
                </script>";
                
            } else {
                echo "<script>
                alert('Gagal Memperbaharui Peraturan! Silahkan Hubungi Admin);
                window.location.href='editperaturan';
                </script>";
            }
        }
	}
}
