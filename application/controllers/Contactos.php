<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contactos_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'contactos/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contactos/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contactos/index.html';
            $config['first_url'] = base_url() . 'contactos/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Contactos_model->total_rows($q);
        $contactos = $this->Contactos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contactos_data' => $contactos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('contactos/contactos_list', $data);
    }

    public function read($id)
    {
        $row = $this->Contactos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'IdContacto' => $row->IdContacto,
		'Nombre' => $row->Nombre,
		'TelefonoFijo' => $row->TelefonoFijo,
		'Celular' => $row->Celular,
		'Direccion' => $row->Direccion,
		'Email' => $row->Email,
		'FechaNacimiento' => $row->FechaNacimiento,
		'Foto' => $row->Foto,
		'IdGrupo' => $row->IdGrupo,
	    );
            $this->load->view('contactos/contactos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contactos'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contactos/create_action'),
	    'IdContacto' => set_value('IdContacto'),
	    'Nombre' => set_value('Nombre'),
	    'TelefonoFijo' => set_value('TelefonoFijo'),
	    'Celular' => set_value('Celular'),
	    'Direccion' => set_value('Direccion'),
	    'Email' => set_value('Email'),
	    'FechaNacimiento' => set_value('FechaNacimiento'),
	    'Foto' => set_value('Foto'),
	    'IdGrupo' => set_value('IdGrupo'),
	);
        $this->load->view('contactos/contactos_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nombre' => $this->input->post('Nombre',TRUE),
		'TelefonoFijo' => $this->input->post('TelefonoFijo',TRUE),
		'Celular' => $this->input->post('Celular',TRUE),
		'Direccion' => $this->input->post('Direccion',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'FechaNacimiento' => $this->input->post('FechaNacimiento',TRUE),
		'Foto' => $this->input->post('Foto',TRUE),
		'IdGrupo' => $this->input->post('IdGrupo',TRUE),
	    );

            $this->Contactos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contactos'));
        }
    }

    public function update($id)
    {
        $row = $this->Contactos_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contactos/update_action'),
		'IdContacto' => set_value('IdContacto', $row->IdContacto),
		'Nombre' => set_value('Nombre', $row->Nombre),
		'TelefonoFijo' => set_value('TelefonoFijo', $row->TelefonoFijo),
		'Celular' => set_value('Celular', $row->Celular),
		'Direccion' => set_value('Direccion', $row->Direccion),
		'Email' => set_value('Email', $row->Email),
		'FechaNacimiento' => set_value('FechaNacimiento', $row->FechaNacimiento),
		'Foto' => set_value('Foto', $row->Foto),
		'IdGrupo' => set_value('IdGrupo', $row->IdGrupo),
	    );
            $this->load->view('contactos/contactos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contactos'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('IdContacto', TRUE));
        } else {
            $data = array(
		'Nombre' => $this->input->post('Nombre',TRUE),
		'TelefonoFijo' => $this->input->post('TelefonoFijo',TRUE),
		'Celular' => $this->input->post('Celular',TRUE),
		'Direccion' => $this->input->post('Direccion',TRUE),
		'Email' => $this->input->post('Email',TRUE),
		'FechaNacimiento' => $this->input->post('FechaNacimiento',TRUE),
		'Foto' => $this->input->post('Foto',TRUE),
		'IdGrupo' => $this->input->post('IdGrupo',TRUE),
	    );

            $this->Contactos_model->update($this->input->post('IdContacto', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('contactos'));
        }
    }

    public function delete($id)
    {
        $row = $this->Contactos_model->get_by_id($id);

        if ($row) {
            $this->Contactos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('contactos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contactos'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Nombre', 'nombre', 'trim|required');
	$this->form_validation->set_rules('TelefonoFijo', 'telefonofijo', 'trim|required');
	$this->form_validation->set_rules('Celular', 'celular', 'trim|required');
	$this->form_validation->set_rules('Direccion', 'direccion', 'trim|required');
	$this->form_validation->set_rules('Email', 'email', 'trim|required');
	$this->form_validation->set_rules('FechaNacimiento', 'fechanacimiento', 'trim|required');
	$this->form_validation->set_rules('Foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('IdGrupo', 'idgrupo', 'trim|required');

	$this->form_validation->set_rules('IdContacto', 'IdContacto', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
