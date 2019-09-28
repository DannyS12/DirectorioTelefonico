<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grupocontacto_model extends CI_Model
{

    public $table = 'grupocontacto';
    public $id = 'IdGrupo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('IdGrupo,NombreGrupo,Descripcion');
        $this->datatables->from('grupocontacto');
        //add this line for join
        //$this->datatables->join('table2', 'grupocontacto.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('grupocontacto/read/$1'),'Read')." | ".anchor(site_url('grupocontacto/update/$1'),'Update')." | ".anchor(site_url('grupocontacto/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'IdGrupo');
        return $this->datatables->generate();
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
        $this->db->like('IdGrupo', $q);
	$this->db->or_like('NombreGrupo', $q);
	$this->db->or_like('Descripcion', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('IdGrupo', $q);
	$this->db->or_like('NombreGrupo', $q);
	$this->db->or_like('Descripcion', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
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
