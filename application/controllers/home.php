<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$dados['dados'] = $this->model_img->imagens();
		$this->load->view("view_header");
		$this->load->view('view_galeria', $dados);
		$this->load->view("view_footer");
	}

	public function carregar()
	{
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";
		// pasta onde será salvo
		$config['upload_path'] = './img/';
		// formatos
		$config['allowed_types'] = 'png|jpeg|jpg';
		// retira o espaço do nome
		$config['file_name'] = str_replace(' ', '_', $_FILES['imagem']['name']);
		// deixa tudo minusculp
		$config['file_name'] = strtolower($config['file_name']);

		$caminho = $config['upload_path'] . $config['file_name'];
		// echo $caminho;	
		$nome = $_FILES['imagem']['name'];	
		$nome=strtolower($_FILES['imagem']['name']);
		$nome=str_replace(' ', '_',$nome);

		echo $nome."<br>";
		echo $caminho;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		// do_upload tem a função de inserir o arquivo na pasta
		if (!$this->upload->do_upload('imagem')) {
			$this->load->view("view_header");
			$this->load->view('view_erro');
			$this->load->view("view_footer");
			// echo $this->upload->display_errors();
		} else {
			if ($this->model_img->inserir($caminho, $nome)) {
				// redireciona para a página atual, mantendo a url
				header('location:' . $_SERVER['HTTP_REFERER']);
			}
		}

	}

	public function deletar_imagem()
	{

		$id = $this->input->post('id');
		if ($this->input->post('id')) {
			// deleta o arquivo no pasta
			$dados = $this->model_img->dados_imagem($id);
			if (is_dir("img")) {
				foreach ($dados as $d) {
					echo $d['nome'];
					if (file_exists($d['caminho'])) {
						
						unlink($d['caminho']);
						$this->model_img->deletar_imagem($id);
						echo 'deletado';
						
					}
					else{
						echo '<br> não deletado';
					}
				}

			}

		}
		
		return;
	}

}