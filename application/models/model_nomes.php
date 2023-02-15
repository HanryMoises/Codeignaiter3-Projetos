<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nomes extends CI_Model {

	public function pesquisar($nome)
	{	
		$this->db->select("nome")->from("nomes");
        // testando a sintaxe do where
		$this->db->like("nome",$nome,"after");  
        return $this->db->get()->result_array();
	}


}