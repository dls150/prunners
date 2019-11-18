<?php
  class Cidade_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'cidade';
          // $this->load->database(); //esta no autoload
      }

      public function get($id=null){
          if($id==null){
              $this->db->select('c.idcidade, c.nome, e.nome as estado');
              $this->db->from('cidade c');
              $this->db->join('estado e', 'c.idestado=e.idestado');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('idcidade'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('idcidade'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //criptografando a senha
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('idcidade'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
