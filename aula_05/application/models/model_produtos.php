    <?php

class model_produtos extends CI_Model
{
    public $Descricao;
    public $Preco;
    public $Quantidade;

    public function produtos($tip)
    {
        if ($tip == "produtos") {
            return $this->db->get('produtos')->result_array();
        }
        else if ($tip == "preco") {
            $this->db->order_by("preco", "cres");
            return $this->db->get('produtos')->result_array();
        }
        else {
            $this->db->order_by("quantidade", "DESC");
            return $this->db->get('produtos')->result_array();
        }
    }

    public function inserir($desc, $preco, $qtde)
    {
        $this->Descricao = $desc;
        $this->Preco = $preco;
        $this->Quantidade = $qtde;

        $this->db->insert("produtos", $this);
    }

    public function editar($id,$n_desc,$n_preco,$n_qtde)
    {
        $dados = [
            "descricao"=>$n_desc,
            "preco"=>$n_preco,
            "quantidade"=>$n_qtde
        ];
        $this->db->where("id",$id);
        $this->db->update("produtos",$dados);
    }

    public function buscar($id)
    {
        $this->db -> where("id ", $id);
        return $this->db->get("produtos")->result();
    }

    public function remover($id){
        $this->db->where("id",$id);
        return $this->db->delete("produtos");
    }
}
?>