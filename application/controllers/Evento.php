<?php


  class Evento extends MY_Controller{

      public function __construct(){
          parent::__construct();

          $this->load->model('evento_model');
          //ATENÇÃO
          // $this->load->helper('url'); //colocado no config/autoload
      }

      public function index(){
          $dados['titulo']= "Manutenção de Eventos";
          $dados['lista'] = $this->evento_model->get();

          $this->template->load('template', 'evento/viewEvento', $dados);
      }

      public function remover($id){
          if(!$this->evento_model->remover($id)){
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
          $this->load->model('corrida_model');
          $this->load->model('atleta_model');

          //variaveis enviadas para a View
          $dados['titulo'] = "Cadastro de Eventos";

          //definição de regras para o formulário

          // echo $rule_nome;
          $this->form_validation->set_rules('nome', 'Nome', 'required');
          $this->form_validation->set_rules('idequipe', 'idequipe', 'required');
          $this->form_validation->set_rules('idcategoria', 'idcategoria', 'required');
          $this->form_validation->set_rules('corrida', 'corrida', 'required');
          $this->form_validation->set_rules('data', 'data', 'required');
          $this->form_validation->set_rules('kilometragem', 'kilometragem', 'required');

          //acao dinamica que sera enviada para a view
          $dados['acao'] = "evento/cadastrar/";

          $dados['registro'] = null; //Iniciar como null
          if($id!==null){
              $dados['acao']    .= $id; //concatenando o id
              $dados['registro'] = $this->evento_model->get($id);
          }
          //buscando a lista de estados
          $dados['listaEquipes'] = $this->evento_model->get();
          $dados['listaCategorias'] = $this->evento_model->get();
          $dados['listaEquipes'] = $this->evento_model->get();
          $dados['listaAtletas'] = $this->evento_model->get();

          //veririca se o form foi submetido e não houve erros de validação
          if($this->form_validation->run()===false){
              $this->template->load('template', 'evento/formEvento', $dados);
          }else{ //neste caso, form submetido e ok!

              if(!$this->evento_model->cadastrar($id)){
                  die("Erro ao tentar cadastrar os dados");
              }
              redirect('evento/index'); //redireciona o fluxo da aplicação
          }

      }
  }
 ?>
