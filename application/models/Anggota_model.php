<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    private $_table = "anggota";
	
	public $nra;
    public $nama;
    public $sk;
    public $kip;
    public $alamat;
    public $email;
    public $password;
    public $notelp;
  
    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = $post["password"] == $user->password;
            // jika password benar dan dia admin
            if($isPasswordTrue){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['role' => 'Anggota']);
                $this->session->set_userdata(['nama' => $user->nama]);
                $this->session->set_userdata(['profile' => $user->profile]);
                return true;
            }

        }
        
        // login gagal
		return false;
    }
    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByIdresult($nra)
    {
        return $this->db->get_where($this->_table, ["nra" => $nra])->result();
    }
    
    public function getById($nra)
    {
        return $this->db->get_where($this->_table, ["nra" => $nra])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nra = $post["nra"];
        $this->brevet = $post["brevet"];
        $this->nama = $post["nama"];
        $this->sk = $post["sk"];
        $this->kip = $post["kip"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->notelp = $post["notelp"];
        $this->profile = $this->do_upload();
        return $this->db->insert($this->_table, $this);
        // return var_dump($this->profile);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->brevet = $post["brevet"];
        $this->sk = $post["sk"];
        $this->kip = $post["kip"];
        $this->alamat = $post["alamat"];
        $this->email = $post["email"];
        $this->password = $post["password"];
        $this->notelp = $post["notelp"];
         if (!empty($_FILES["profile"]["name"])) {
            $this->profile = $this->do_upload();
        } else {
            $this->profile = $post["old_profile"];
        }
        return $this->db->update($this->_table, $this, array('nra' => $post['nra']));
    }

    public function delete($nra)
    {
        return $this->db->delete($this->_table, array("nra" => $nra));
    }
    
     private function do_upload()
    {
        $config['upload_path']          = './anggota/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']				= 2048;
		$config['file_name']            = date('d-m-Y');
        $config['overwrite']			= true;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('profile')) {
        return $this->upload->data("file_name");
    } 
    $error = array('error' => $this->upload->display_errors());
        print_r($error);
        exit;
    }

    public function logout()
    {
        $this->session->unset_userdata('variable');
        $this->session->sess_destroy();
    }
}