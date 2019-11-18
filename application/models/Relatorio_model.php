<?php
  class Relatorio_model extends CI_Model{

      public function __construct(){ }

      public function getCorridaPeriodo($ini, $fim){
          $this->db->select('c.nomecorrida, c.data, c.kilometragem, c.regiao, c.infoadicionais');
          $this->db->from('corrida c');
          //$this->db->join('pessoa p', 'p.id=e.idpessoa');
          //$this->db->join('objeto o', 'o.id=e.idobjeto');
          //$this->db->join('tipo_objeto to', 'to.id=o.idtipoobjeto');

          $where = array('c.data>='=>$ini, 'c.data<='=>$fim);
          $this->db->where($where);
          $query = $this->db->get();
          return $query->result_array(); //todos os registros

      }
  }
 ?>
