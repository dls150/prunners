<?php

  class Relatorio extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('relatorio_model');
      }

      public function formCorridaPeriodo(){
          $dados['titulo'] = "Relatório Corridas por período";
          $this->load->helper('form');
          $this->load->library('form_validation');
          $this->template->load('template', 'relatorio/formCorridaPeriodo', $dados);
      }

      public function corridaPeriodo() {
          $ini   = $this->input->post('data_inicial');
          $fim   = $this->input->post('data_final');
          $dados['titulo'] = "Corridas por datas";
          $dados['data']   = $this->relatorio_model->getCorridaPeriodo($ini, $fim);
           echo '<pre>';
           print_r($dados);
           echo '</pre>';
          $this->load->library('MY_FPDF');
          $this->load->view('relatorio/corridaPeriodo', $dados);
      }

  }
 ?>
