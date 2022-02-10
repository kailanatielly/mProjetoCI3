<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

class Carro_model extends CI_Model {
  function __construct() {
        parent::__construct();
    }
    
    function inserir($car){
        return $this->db->insert('carro',$car);
    }
    
    function deletar($car){
        $this->db->where('idCarro',$car);
        return $this->db->delete('carro');
    }
    
    function editar($car){
        $this->db->where('idCarro',$car);
        $result = $this->db->get('carro');
        return $result->result();
    }
    
    function atualizar($car){
        $this->db->where('idCarro',$car['idCarro']);
        $this->db->set($car);
        return $this->db->update('carro');
    }

    /**
     * Este método retorna a lista de carros.
     */
    function listar(){
        $this->db->select('*');
        $this->db->from('carro');
        $this->db->order_by('idCarro','ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
