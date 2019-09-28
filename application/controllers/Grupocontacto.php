<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupocontacto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grupocontacto_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'grupocontacto/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'grupocontacto/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'grupocontacto/index.html';
            $config['first_url'] = base_url() . 'grupocontacto/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Grupocontacto_model->total_rows($q);
        $grupocontacto = $this->Grupocontacto_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'grupocontacto_data' => $grupocontacto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('grupocontacto/grupocontacto_list', $data);
        $this->load->view('footer');
    }

    public function read($id)
    {
        $row = $this->Grupocontacto_model->get_by_id($id);
        if ($row) {
            $data = array(
		'IdGrupo' => $row->IdGrupo,
		'NombreGrupo' => $row->NombreGrupo,
		'Descripcion' => $row->Descripcion,
	    );
            $this->load->view('header');
            $this->load->view('grupocontacto/grupocontacto_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('grupocontacto'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Registrar',
            'action' => site_url('grupocontacto/create_action'),
	    'IdGrupo' => set_value('IdGrupo'),
	    'NombreGrupo' => set_value('NombreGrupo'),
	    'Descripcion' => set_value('Descripcion'),
	);
        $this->load->view('header');
        $this->load->view('grupocontacto/grupocontacto_form', $data);
        $this->load->view('footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NombreGrupo' => $this->input->post('NombreGrupo',TRUE),
		'Descripcion' => $this->input->post('Descripcion',TRUE),
	    );

            $this->Grupocontacto_model->insert($data);
            $this->session->set_flashdata('message', 'Registro realizado exitosamente!');
            redirect(site_url('grupocontacto'));
        }
    }

    public function update($id)
    {
        $row = $this->Grupocontacto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Actualizar',
                'action' => site_url('grupocontacto/update_action'),
		'IdGrupo' => set_value('IdGrupo', $row->IdGrupo),
		'NombreGrupo' => set_value('NombreGrupo', $row->NombreGrupo),
		'Descripcion' => set_value('Descripcion', $row->Descripcion),
	    );
            $this->load->view('header');
            $this->load->view('grupocontacto/grupocontacto_form', $data);
            $this->load->view('footer');

        } else {
            $this->session->set_flashdata('message', 'Registro no existe');
            redirect(site_url('grupocontacto'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('IdGrupo', TRUE));
        } else {
            $data = array(
		'NombreGrupo' => $this->input->post('NombreGrupo',TRUE),
		'Descripcion' => $this->input->post('Descripcion',TRUE),
	    );

            $this->Grupocontacto_model->update($this->input->post('IdGrupo', TRUE), $data);
            $this->session->set_flashdata('message', 'Registro actualizado exitosamente!');
            redirect(site_url('grupocontacto'));
        }
    }

    public function delete($id)
    {
        $row = $this->Grupocontacto_model->get_by_id($id);

        if ($row) {
            $this->Grupocontacto_model->delete($id);
            $this->session->set_flashdata('message', 'Registro eliminado exitosamente');
            redirect(site_url('grupocontacto'));
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('grupocontacto'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('NombreGrupo', 'nombregrupo', 'trim|required');
	$this->form_validation->set_rules('Descripcion', 'descripcion', 'trim|required');

	$this->form_validation->set_rules('IdGrupo', 'IdGrupo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
