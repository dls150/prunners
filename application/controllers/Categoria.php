<?php


  class Categoria extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('categoria_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Categorias";
          $dados['lista'] = $this->categoria_model->get();

          $this->template->load('template', 'categoria/viewCategoria', $dados);
      }

      public function remover($id){
          if(!$this->categoria_model->remover($id)){
              die('Erro ao tentar remover');
          }
          redirect('categoria/index'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de estados
          $this->load->model('categoria_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Categorias";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('categoria', 'categoria', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "categoria/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->categoria_model->get($id);
          }

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'categoria/formCategoria', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->categoria_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('categoria/index'); //redireciona o fluxo da aplicação
          }


      }
  }
 ?>
