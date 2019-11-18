<?php


  class Corrida extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('corrida_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Corridas";
          $dados['lista'] = $this->corrida_model->get();

          $this->template->load('template', 'corrida/viewCorrida', $dados);
      }

      public function remover($id){
          if(!$this->corrida_model->remover($id)){
              die('Erro ao tentar remover');
          }
          redirect('corrida/index'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de estados
          $this->load->model('corrida_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Corridas";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('nomecorrida', 'nomecorrida', 'required');
          $this->form_validation->set_rules('data', 'data', 'required');
          $this->form_validation->set_rules('kilometragem', 'kilometragem', 'required');
          $this->form_validation->set_rules('regiao', 'regiao', 'required');
          $this->form_validation->set_rules('infoadicionais', 'infoadicionais', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "corrida/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->corrida_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'corrida/formCorrida', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->corrida_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('corrida/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
