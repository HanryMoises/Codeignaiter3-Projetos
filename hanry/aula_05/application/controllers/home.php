<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function index()
	{
		if (!isset($_SESSION["tip"])) {
			$_SESSION["tip"] = "produtos";
		}
		$produtos["produtos"] = $this->model_produtos->produtos($_SESSION["tip"]);
		// echo "<pre>";
		// echo "</pre>";
		$this->load->library('session');
		$this->load->view('view_header');
		$this->load->view('view_home', $produtos);
		$this->load->view('view_footer');
	}
	public function resultado($n)
	{
		if ($n == "preco") {
			$_SESSION["tip"] = "preco";
			$this->index();
		}
		else if ($n == "quantidade") {
			$_SESSION["tip"] = "quantidade";
			$this->index();
		}
		else if ($n == "home") {
			$_SESSION["tip"] = "quantidade";
			$this->index();
		}
	}

	public function inserir()
	{
		$desc = $this->input->post("desc");
		$preco = $this->input->post("preco");
		$qtde = $this->input->post("qtde");
		$this->model_produtos->inserir($desc, $preco, $qtde);
		return;
	}

	public function editar()
	{
		$id=$this->input->post("id");
		$n_desc=$this->input->post("desc");
		$n_preco=$this->input->post("preco");
		$n_qtde=$this->input->post("qtde");
		$this->model_produtos->editar($id,$n_desc, $n_preco, $n_qtde);
		return;
	}

	public function buscar()
	{
		$data=$this->model_produtos->buscar($this->input->post("id"));	
		// transforma o array em string usando Json
		echo json_encode($data);
		return;
	}	

	public function remover(){
		echo $this->input->post("id");
		$this->model_produtos->remover($this->input->post("id"));
		return;
	}

}
