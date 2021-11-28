<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("Postingan_model","postingan");
        $this->load->model("Peraturan_model","peraturan");
        $this->load->model("Anggota_Model","anggota");
	}
	public function index()
	{
		$data['postingan']= $this->postingan->getAll();
		$data['peraturan']= $this->peraturan->get5();
		$data['anggota']= $this->anggota->terbaru5();
		$this->load->view('front/index',$data);
	}

	public function postingan()
	{
		$data['postingan']= $this->postingan->getAll();
		$this->load->view('front/postingan',$data);
	}
	public function detailpostingan($id_postingan)
	{
		$data['postingan']= $this->postingan->getById($id_postingan);
		$this->load->view('front/detailpostingan',$data);
	}
}
