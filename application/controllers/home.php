<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->load->view("view_header");
		$this->load->view('view_home');
		$this->load->view("view_footer");
	}

	public function searching(){
		echo json_encode($this->model_nomes->pesquisar($this->input->post("nome")));
		return;
	}

}
