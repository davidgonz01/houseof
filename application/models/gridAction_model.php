<?php

class gridAction_model extends CI_Model {
    
    	function __construct()
    {
        parent::__construct();
        /* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */
    }

//public function __construct() {
  //  $this->load->database();
//}

function getAllTeacherDesignation($start, $limit, $sidx, $sord, $where) {

    $this->db->select('DesignationId,DesignationName,Description,Status');
    $this->db->limit($limit);
    //if ($where != NULL)
    //    $this->db->where($where, NULL, FALSE);
    //$this->db->order_by($sidx, $sord);
    $query = $this->db->get('TeacherDesignation', $limit, $start);

    return $query->result();
}

function insert_teacherDesignation($data) {
    return $this->db->insert('TeacherDesignation', $data);
}

function update_teacherDesignation($id, $data) {
    $this->db->where('DesignationId', $id);
    return $this->db->update('TeacherDesignation', $data);
}

function delete_teacherDesignation($id) {
    $this->db->where('DesignationId', $id);
    $this->db->delete('TeacherDesignation');
}
}