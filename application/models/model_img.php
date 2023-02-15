<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_img extends CI_Model {
    public function inserir($caminho,$nome){
        $dados=[
            'caminho'=>$caminho,
            'nome'=>$nome
        ];
        return $this->db->insert('imagens',$dados);
    }
    public function imagens(){
        return $this->db->get('imagens')->result_array();
    }   
    public function deletar_imagem($id){
        $this->db->where('id',$id);
        return $this->db->delete('imagens');
    }
    public function dados_imagem($id){
        $this->db->where('id',$id);
        return $this->db->get('imagens')->result_array();

    }
}