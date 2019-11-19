<?php


  class Atleta extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('atleta_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Atletas";
          $dados['lista'] = $this->atleta_model->get();

          $this->template->load('template', 'atleta/viewAtleta', $dados);
      }

      public function remover($id){
          if(!$this->atleta_model->remover($id)){
              die('Erro ao tentar remover');
          }
          redirect('atleta/index'); //redireciona o fluxo da aplicação
      }

      public function cadastrar($id=null){
          $this->load->helper('form');
          $this->load->library('form_validation');
          //load da model de estados
          $this->load->model('categoria_model');
          $this->load->model('equipe_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Atleta";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('idequipe', 'idequipe', 'required');
          $this->form_validation->set_rules('idcategoria', 'idcategoria', 'required');
          $this->form_validation->set_rules('documento', 'documento', 'required');
          $this->form_validation->set_rules('infoadicionais', 'infoadicionais', 'required');


          //acao dinamica que sera enviada para a view
          $dados['acao'] = "atleta/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->atleta_model->get($id);
          }
          //buscando a lista de estados
          $dados['listaEquipes'] = $this->equipe_model->get();
          $dados['listaCategorias'] = $this->categoria_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'atleta/formAtleta', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->atleta_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('atleta/index'); //redireciona o fluxo da aplicação
          }

      }
  }
 ?>
