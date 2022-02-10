<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Carro
 *
 * @author User
 */
class Carro extends CI_Controller {
    //put your code here
        function __construct() {
        parent::__construct();
        if (!$this->session->userdata('estou_logado')) {
            redirect('Login');
        }
        $this->load->model('Carro_model', 'carro');
        $this->load->model('Pessoa_model', 'pessoa');
        //'carro' é um alias/apelido para 'Carro_model'
    }

    public function index() {
        $dados['carros'] = $this->carro->listar();
        $dados['pessoas'] = $this->pessoa->listar();
        $this->load->view('carro', $dados);
    }

    public function inserir() {
        //este lado do BD = Este lado da View/Form
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['portas'] = $this->input->post('portas');
        $dados['cor'] = $this->input->post('cor');
        $dados['placa'] = $this->input->post('placa');
        $dados['idPessoa'] = $this->input->post('idPessoa');
        
        $result = $this->carro->inserir($dados);
        if($result == true){
            redirect('carro');
        }else{
            redirect('carro');
        }
    }
    
    public function excluir($car) {
        $result = $this->carro->deletar($car);
        if($result == true){
            //msg true
            redirect('carro');
        }else{
            //msg err
            redirect('carro');
        }
    }
    
    public function editar($car) {
        $dados['carro'] = $this->carro->editar($car);
        $dados['pessoas'] = $this->pessoa->editar($car);
        $this->load->view('carroEditar', $dados);
    }
    
    public function atualizar() {
        //este lado do BD = Este lado da View/Form
        $dados['marca'] = $this->input->post('marca');
        $dados['modelo'] = $this->input->post('modelo');
        $dados['portas'] = $this->input->post('portas');
        $dados['cor'] = $this->input->post('cor');
        $dados['placa'] = $this->input->post('placa');
        $dados['idPessoa'] = $this->input->post('idPessoa');
        
        if($this->carro->atualizar($dados) == true){
            //msg true
            redirect('carro');
        }else{
            //msg err
            redirect('carro');
        }
    }

}
