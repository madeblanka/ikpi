<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('auth_helper');
        $this->load->model("Anggota_model","anggota");
        $this->load->model("Peraturan_model","peraturan");
		$this->load->model("Postingan_model", "postingan");
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

	public function postingan()
	{
		is_logged_in();
		$data['postingan'] = $this->postingan->terbaruArray();
		$this->load->view('admin/postingan/index', $data);
	}

	public function tambahpostingan()
	{
		is_logged_in();
		$this->load->view('admin/postingan/tambah');
	}

	public function addpostingan()
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->postingan->save()) {
				echo "<script>
				alert('Postingan Baru Telah Ditambahkan!');
				window.location.href='postingan';
				</script>";
			} else {
				echo "<script>
                alert('Gagal Menambahkan Postingan! Silahkan Hubungi Admin);
                window.location.href='tambahpostingan';
                </script>";
			}
		}
	}

	public function editpostingan($id_postingan)
	{
		is_logged_in();
		$data['postingan'] = $this->postingan->getbyId($id_postingan);
		$this->load->view('admin/postingan/edit', $data);
	}

	public function updatepostingan($id_postingan = null)
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->postingan->update($id_postingan)) {
				echo "<script>
				alert('Postingan Telah Diperbaharui!');
				window.location.href='postingan';
				</script>";
			} else {
				echo "<script>
                alert('Gagal Memperbaharui Postingan! Silahkan Hubungi Admin);
                window.location.href='editpostingan';
                </script>";
			}
		}
	}

	public function deletepostingan($id_postingan)
	{
		is_logged_in();
		$old_data = $this->db->get_where('postingan', ["id_postingan" => $id_postingan])->row_array();
		for ($i = 0; $i < 15; $i++) {
			$j = $i + 1;
			$temp_gambar = 'gambar' . $j;
			$old_image = $old_data[$temp_gambar];
			if ($old_image) {
				unlink(FCPATH . './postingan/' . $old_image);
			}
		}
		$this->db->delete('postingan', ['id_postingan' => $id_postingan]);
		echo "<script>
					alert('Postingan Telah Dihapus!');
					window.location.href='postingan';
					</script>";
		redirect('anggota/postingan');
	}
}
