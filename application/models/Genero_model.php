<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genero_model extends CI_Model {
    public function obtener_generos() {
        $query = $this->db->get('generos');
        return $query->result_array();
    }
}
