<?php
  class Evento_model extends CI_Model{
      private $tabelaNome;
      public function __construct(){
          $this->tabelaNome = 'evento';
          // $this->load->database(); //esta no autoload
      }
      // -- atleta -> nome, idcategoria
      // -- equipe -> equipe
      // -- corrida -> nomecorrida, data, kilometragem
      //
      // select e.idatleta, c.nomecorrida, c.data, c.kilometragem
      // from evento e
      // inner join atleta a on e.idatleta = a.idatleta
      // inner join corrida c on e.idcorrida = c.idcorrida;
      public function get($id=null){
          if($id==null){
              //$this->db->select('select e.idevento, a.nome');
              $this->db->select('e.idevento, a.nome, c.nomecorrida, c.data, c.kilometragem');
              $this->db->from('evento e');
              $this->db->join('atleta a', 'e.idatleta=a.idatleta');
              $this->db->join('corrida c', 'e.idcorrida=c.idcorrida');
              $query = $this->db->get();
              return $query->result_array(); //todos os registros
          }
          $query = $this->db->get_where($this->tabelaNome, array('idevento'=>$id));
          return $query->row_array(); //uma unica linha MATCH
      }

      public function remover($id){
          return $this->db->where(array('idevento'=>$id))->delete($this->tabelaNome);
      }

      public function cadastrar($id=null){
          $registro = $this->input->post();
          //criptografando a senha
          if($id==null){ //registro novo
              return $this->db->insert($this->tabelaNome, $registro);
          }
          return $this->db->where(array('idevento'=>$id))->update($this->tabelaNome,$registro);
      }
  }
 ?>
