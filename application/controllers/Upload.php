<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  public function index(){
      $dados['titulo']= "Upload de imagens";
    //  $dados['lista'] = $this->equipe_model->get();

      $this->template->load('template', 'viewUpload', $dados);
  }

public function upload_file(){
  $config['allowed_types'] = 'jpg|png';
  $config['upload_path'] = './uploads';
  $config['encrypt_name'] = true;
  $this->load->library('upload', $config);

  if ($this->upload->do_upload('image')) {
    // print_r($this->upload->data());
    redirect(upload);
  } else {
    echo ("Erro ao tentar enviar.");
  }

}

}


 ?>
