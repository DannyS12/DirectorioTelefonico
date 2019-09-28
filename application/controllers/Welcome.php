<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        /*$this->load->model('C_model');
        $this->load->library('form_validation');*/
        $this->load->helper('url');
    }


	public function index()
	{
		$this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
	}

    public function grupos()
	{
		$this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
	}

    public function contactos()
	{
		$this->load->view('header');
        $this->load->view('welcome_message');
        $this->load->view('footer');
	}


}
