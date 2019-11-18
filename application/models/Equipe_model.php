<?php
  class Equipe_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'equipe';
          // $this->load->database();
      }

      public function get($id=null){
          if($id==null){
              $query = $this->db->get($this->tabelaNome);
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('idequipe'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('idequipe'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //criptografando a senha
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('idequipe'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
