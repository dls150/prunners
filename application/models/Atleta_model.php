<?php
  class Atleta_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'atleta';
          // $this->load->database(); //esta no autoload
      }

      public function get($id=null){
          if($id==null){
              $this->db->select('a.idatleta, a.nome, e.equipe, c.categoria, a.documento, a.infoadicionais');
              $this->db->from('atleta a');
              $this->db->join('equipe e', 'e.idequipe=a.idequipe');
              $this->db->join('categoria c', 'c.idcategoria=a.idcategoria');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('idatleta'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('idatleta'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //criptografando a senha
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('idatleta'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
