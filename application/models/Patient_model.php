<?php

class Patient_model extends MY_Model {

	public $before_create = array('before_create');
	public $before_update = array('before_update');

	public $has_many = array('reports');

	public $protected_attributes = array('id');
	
	public $validate = array(
		'auth' => array(
			array('field' => 'name', 
               'label' => 'Name',
               'rules' => 'required|trim'),

			array('field' => 'passcode', 
	        	'label' => 'Passcode',
	      		'rules' => 'required|trim'),
		),

		'form' => array(
			array('field' => 'name', 
               		'label' => 'Name',
               	'rules' => 'required|trim'),

			array('field' => 'gender', 
	        	'label' => 'Gender',
	          	'rules' => 'required|trim'),

			array('field' => 'dob', 
	               'label' => 'Date of Birth',
	               'rules' => 'required|trim|valid_date',
	               'errors' => array(
	               		'valid_date' => 'The %s field is invalid.')),

			array('field' => 'country', 
	               'label' => 'Country',
	               'rules' => 'required|trim'),

			array('field' => 'phone', 
	               'label' => 'Phone Number',
	               'rules' => 'required|trim|min_length[10]|max_length[16]|valid_phone',
	               'errors' => array(
	               		'valid_phone' => 'The %s field is invalid.')),

			array('field' => 'email', 
               		'label' => 'Email Address',
               		'rules' => 'required|trim|valid_email'),

			array('field' => 'passcode', 
	               'label' => 'Passcode',
	               'rules' => 'required|trim'),

			array('field' => 'medications', 
	               'label' => 'Medications',
	               'rules' => 'trim'),
		)
    );

    protected function before_create($patient)
    {
        $patient['created_at'] = date('Y-m-d H:i:s');
        return $patient;
    }

    protected function before_update($patient)
    {
    	$patient['updated_at'] = date('Y-m-d H:i:s');
        return $patient;
    }

    protected function after_delete($patient)
    {
    	return $patient;
    }
}