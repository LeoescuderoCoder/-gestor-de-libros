<?php
class Libros extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Genero_model');
        $this->load->model('Libro_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['generos'] = $this->Genero_model->obtener_generos();
        $data['autores'] = $this->Libro_model->get_autores();

        $data['libros'] = $this->Libro_model->get_libros();

        $this->load->view('libros/lista',$data);
    }

    public function filtrar($tipo, $id) { 
        if ($tipo == 'genero') {
            $data['libros'] = $this->Libro_model->get_libros_por_genero($id);
        } elseif ($tipo == 'autor') {
            $data['libros'] = $this->Libro_model->get_libros_por_autor($id);
        }

        $data['generos'] = $this->Genero_model->obtener_generos();
        $data['autores'] = $this->Libro_model->get_autores();

        $this->load->view('libros/libros_index',$data);
    }

    public function crear() {
        if ($this->input->post()) {
            $data = [
                'titulo' => $this->input->post('titulo'),
                'autor' => $this->input->post('autor'),
                'genero' => $this->input->post('genero'),
                'anio_publicacion' => $this->input->post('anio_publicacion')
            ];
            $this->Libro_model->agregar_libro($data);
            redirect('libros');
        }
        $this->load->view('libros/crear');
    }

    public function editar($id) {
        $data['libro'] = $this->Libro_model->obtener_libro($id);
        if ($this->input->post()) {
            $data_actualizada = [
                'titulo' => $this->input->post('titulo'),
                'autor' => $this->input->post('autor'),
                'genero' => $this->input->post('genero'),
                'anio_publicacion' => $this->input->post('anio_publicacion')
            ];
            $this->Libro_model->actualizar_libro($id, $data_actualizada);
            redirect('libros');
        }
        $this->load->view('libros/editar', $data);
    }

    public function borrar($id) {
        $this->Libro_model->borrar_libro($id);
        redirect('libros');
    }

    public function buscar() {
        $query = $this->input->get('query');
        $data['libros'] = $this->Libro_model->buscar_libros($query);
        $this->load->view('libros/libros_index', $data);
    }
}
?>
