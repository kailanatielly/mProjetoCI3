<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_model
 *
 * @author jairb
 */
class Usuario_model extends CI_Model {
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    function inserir($p){
        return $this->db->insert('user',$p); //user é o nome da tb no BD
    }
    
    function deletar($id){
        $this->db->where('idusuario',$id);
        return $this->db->delete('user');
    }
    
    function editar($id){
        $this->db->where('idusuario',$id);
        $result = $this->db->get('user');
        return $result->result();
    }
    
    function atualizar($p){
        $this->db->where('idusuario',$p['idusuario']);
        $this->db->set($p);
        return $this->db->update('user');
    }

    /**
     * Este método retorna a lista de usuarios.
     */
    function listar(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('nomeUsuario','ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
