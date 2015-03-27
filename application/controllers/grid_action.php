<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class grid_action extends CI_Controller {

    
    function __construct()
	{
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
                
                 $this->load->helper("form");
               $this->load->model("gridAction_model");
		
	}


public function loadTeacherDesignationData() {

    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
    $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'DesignationName';
    $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
    $start = $limit * $page - $limit;
    $start = ($start < 0) ? 0 : $start;

    $where = "";
    $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
    $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
    $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;

    if ($_POST['_search'] == 'true') {
        $ops = array(
            'eq' => '=',
            'ne' => '<>',
            'lt' => '<',
            'le' => '<=',
            'gt' => '>',
            'ge' => '>=',
            'bw' => 'LIKE',
            'bn' => 'NOT LIKE',
            'in' => 'LIKE',
            'ni' => 'NOT LIKE',
            'ew' => 'LIKE',
            'en' => 'NOT LIKE',
            'cn' => 'LIKE',
            'nc' => 'NOT LIKE'
        );
        foreach ($ops as $key => $value) {
            if ($searchOper == $key) {
                $ops = $value;
            }
        }
        if ($searchOper == 'eq')
            $searchString = $searchString;
        if ($searchOper == 'bw' || $searchOper == 'bn')
            $searchString .= '%';
        if ($searchOper == 'ew' || $searchOper == 'en')
            $searchString = '%' . $searchString;
        if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
            $searchString = '%' . $searchString . '%';

        $where = "$searchField $ops '$searchString' ";
    }

    if (!$sidx)
        $sidx = 1;
    $count = $this->db->count_all_results('TeacherDesignation');
    if ($count > 0) {
        $total_pages = ceil($count / $limit);
    } else {
        $total_pages = 0;
    }

    if ($page > $total_pages)
        $page = $total_pages;

    $query = $this->gridAction_model->getAllTeacherDesignation($start, $limit, $sidx, $sord, $where);

    $responce = new stdClass;

    $responce->page = $page;
    $responce->total = $total_pages;
    $responce->records = $count;
    $i = 0;

    foreach ($query as $row) {
        $responce->rows[$i]['id'] = $row->DesignationId;
        $responce->rows[$i]['cell'] = array($row->DesignationId, $row->DesignationName, $row->Description, $row->Status);
        $i++;
    }
    echo json_encode($responce);
}

public function crudTeacherDesignation() {

    $oper = $this->input->post('oper');
    $id = $this->input->post('id');
    $DesignationId = $this->input->post('DesignationId');
    $DesignationName = $this->input->post('DesignationName');
    $Description = $this->input->post('Description');
    $Status = $this->input->post('Status');

    switch ($oper) {
        case 'add':
            $data = array('DesignationId' => $DesignationId, 'DesignationName' => $DesignationName, 'Description' => $Description, 'Status' => $Status);
            $this->gridAction_model->insert_teacherDesignation($data);
            break;
        case 'edit':
            $data = array('DesignationId' => $DesignationId, 'DesignationName' => $DesignationName, 'Description' => $Description, 'Status' => $Status);
            $this->gridAction_model->update_teacherDesignation($DesignationId, $data);
            break;
        case 'del':
            $this->gridAction_model->delete_teacherDesignation($DesignationId);
            break;
    }
}

}