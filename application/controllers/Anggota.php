<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{

		parent::__construct();		
		
		if(empty($this->session->userdata('user'))) {
            redirect('login');
        }

		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Anggota_Model');
		$this->load->model('Kontak_model');
	}

	public function index()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);
		$this->load->view('anggota/index',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		session_destroy();
		redirect('anggota');
	}

	public function edit_profile()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/edit_profile',$data);

		} else {
			$update = $this->Anggota_Model->update_profile($nim);

			if ($update){
				redirect('anggota/success');
			} else echo "Update Gagal";
		}
	}

	public function change_password()
	{
		$nim = $this->session->userdata('user');
		$data['anggota'] = $this->Anggota_Model->get_id($nim);

		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/change_password',$data);
		} else {
			$update = $this->Anggota_Model->change_password($nim);

			if ($update){
				redirect('anggota/success');
			} else echo "Update Gagal";
		}	
	}

	public function add_contact()
	{ 
		$data['nim'] = $this->session->userdata('user');
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->load->view('anggota/add_contact',$data);
		} else {
			$insert = $this->Anggota_Model->add_contact($data['nim']);
			if ($insert){
				 echo json_encode(array("status" => TRUE));
			} else echo "Update Gagal";
		}	
	}

	public function get_contact_ajax()
	{
		$nim = $this->session->userdata('user');
		$data = $this->Kontak_model->get_id($nim);

		$html='';
		foreach ($data as $kontak) {
			$html.= "<tr> <td>".$kontak->JENIS_KONTAK."</td>"."<td>".$kontak->DETIL_KONTAK."</td></tr>";
		}

		echo $html;
	}

	public function success()
	{
		$this->load->view('anggota/success');
	}




}
