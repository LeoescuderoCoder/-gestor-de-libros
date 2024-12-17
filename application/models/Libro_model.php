<?php
class Libro_model extends CI_Model {
    public function obtener_libros() {
        return $this->db->get('libros')->result_array();
    }

    public function agregar_libro($data) {
        return $this->db->insert('libros', $data);
    }

    public function obtener_libro($id) {
        return $this->db->get_where('libros', ['id' => $id])->row_array();
    }

    public function actualizar_libro($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('libros', $data);
    }

    public function borrar_libro($id) {
        $this->db->where('id', $id);
        return $this->db->delete('libros');
    }

    public function get_generos() {
        $query = $this->db->get('generos');
        return $query->result_array();
    }

    public function get_autores() {
        $query = $this->db->get('autores');
        return $query->result_array();
    }

    public function get_libros() {
        $query = $this->db->get('libros');
        return $query->result_array();
    }

    public function get_libros_por_genero($genero_id){
    $this->db->select('*');
    $this->db->from('libros');
    $this->db->where('genero_id', $genero_id);
    $query = $this->db->get();
    return $query->result_array();
    }

    public function get_libros_por_autor($autor_id){
    $this->db->select('*');
    $this->db->from('libros');
    $this->db->where('autor_id', $autor_id);
    $query = $this->db->get();
    return $query->result_array();
    }

    public function buscar_libros($query) {
        $this->db->like('titulo', $query);
        $this->db->or_like('autor', $query);
        $this->db->or_like('genero', $query);
        $query = $this->db->get('libros');
        return $query->result_array();
    }
}
?>
