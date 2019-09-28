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
	    $this->load->library('datatables');

        //$this->load->helper('url');
        //$this->load->library('session',);
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('grupocontacto/grupocontacto_list');
        $this->load->view('footer');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Grupocontacto_model->json();
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
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grupocontacto'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
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
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grupocontacto'));
        }
    }

    public function update($id)
    {
        $row = $this->Grupocontacto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grupocontacto/update_action'),
		'IdGrupo' => set_value('IdGrupo', $row->IdGrupo),
		'NombreGrupo' => set_value('NombreGrupo', $row->NombreGrupo),
		'Descripcion' => set_value('Descripcion', $row->Descripcion),
	    );
            $this->load->view('header');
            $this->load->view('grupocontacto/grupocontacto_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
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
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grupocontacto'));
        }
    }

    public function delete($id)
    {
        $row = $this->Grupocontacto_model->get_by_id($id);

        if ($row) {
            $this->Grupocontacto_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grupocontacto'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
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
