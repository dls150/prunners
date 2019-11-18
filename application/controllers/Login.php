<?php

  class Login extends CI_Controller{

      public function __construct(){
          parent::__construct();
          // $this->load->database(); //lê o banco de dados

          $this->load->helper('form');
      }

      public function index(){
          $this->load->view("login");
      }

      public function validar(){
          $dados = $this->input->post();
          $dados['senha'] = md5($dados['senha']);

          $this->db->select('id, email, permissao');
          $query = $this->db->get_where('usuario', $dados);
          //echo $query->num_rows();
          if($query->num_rows()==1){
              $registro = $query->row_array();
              $this->session->set_userdata('logado', $registro);
              redirect(atleta);
          }else{
              $dados['msg'] = "Opss, dados incorretos. Tente novamente.";
              $this->load->view("login", $dados);
          }
      }

      public function logout(){
          $this->session->unset_userdata('logado', array());
          redirect('login');
      }
  }
 ?>
