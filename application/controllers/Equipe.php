<?php


  class Equipe extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('equipe_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Equipes";
          $dados['lista'] = $this->equipe_model->get();

          $this->template->load('template', 'equipe/viewEquipe', $dados);
      }

      public function remover($id){
          if(!$this->equipe_model->remover($id)){
              die('Erro ao tentar remover');
          }
          redirect('equipe/index'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de estados
          $this->load->model('equipe_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Equipes";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('equipe', 'equipe', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "equipe/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->equipe_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'equipe/formEquipe', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->equipe_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('equipe/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
