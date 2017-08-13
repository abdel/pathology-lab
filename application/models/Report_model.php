<?php

class Report_model extends MY_Model {

	public $before_create = array('before_create');
	public $before_update = array('before_update');

	public $belongs_to = array('patient');
	public $has_many = array('specimens');

	public $protected_attributes = array('id');
	
	public $validate = array(
		'add_form' => array(
			array('field' => 'patient_id', 
		       	'label' => 'Patient ID',
		       	'rules' => 'required|trim'),

			array('field' => 'status', 
		    	'label' => 'Status',
		      	'rules' => 'required|trim'),

			array('field' => 'ordering_dr', 
		       'label' => 'Ordering Dr',
		       'rules' => 'required|trim'),

			array('field' => 'copy_for', 
		           'label' => 'Physician Copy for',
		           'rules' => 'trim')
		),

		'update_form' => array(
			array('field' => 'status', 
		    	'label' => 'Status',
		      	'rules' => 'required|trim'),

			array('field' => 'ordering_dr', 
		       'label' => 'Ordering Dr',
		       'rules' => 'required|trim'),

			array('field' => 'copy_for', 
		           'label' => 'Physician Copy for',
		           'rules' => 'trim')
		),
    );

    protected function before_create($report)
    {
        $report['created_at'] = date('Y-m-d H:i:s');
        return $report;
    }

    protected function before_update($report)
    {
    	$report['updated_at'] = date('Y-m-d H:i:s');
        return $report;
    }
}