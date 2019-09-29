<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactos_model extends CI_Model
{

    public $table = 'contactos';
    public $tablejoin = 'grupocontacto';
    public $id = 'IdContacto';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('IdContacto', $q);
	$this->db->or_like('Nombre', $q);
	$this->db->or_like('TelefonoFijo', $q);
	$this->db->or_like('Celular', $q);
	$this->db->or_like('Direccion', $q);
	$this->db->or_like('Email', $q);
	$this->db->or_like('FechaNacimiento', $q);
	$this->db->or_like('Foto', $q);
	$this->db->or_like('IdGrupo', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('IdContacto', $q);
	$this->db->or_like('Nombre', $q);
	$this->db->or_like('TelefonoFijo', $q);
	$this->db->or_like('Celular', $q);
	$this->db->or_like('Direccion', $q);
	$this->db->or_like('Email', $q);
	$this->db->or_like('FechaNacimiento', $q);
	$this->db->or_like('Foto', $q);
	$this->db->or_like('NombreGrupo', $q);
	$this->db->limit($limit, $start);

        $this->db->select('*');
       $this->db->from($this->table);
       $this->db->join($this->tablejoin,'IdGrupo','IdGrupo');


        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
