<?php

class Specimen_model extends MY_Model {

	public $belongs_to = array('report');
	public $has_many = array('tests');

	public $protected_attributes = array('id');
	
	public $validate = array(
		array('field' => 'name', 
           	'label' => 'Name',
           	'rules' => 'required|trim'),

		array('field' => 'comments', 
        	'label' => 'Comments',
          	'rules' => 'trim'),

		array('field' => 'collected_at', 
           	'label' => 'Collection Date',
            'rules' => 'required|trim|valid_datetime',
           	'errors' => array(
               	'valid_datetime' => 'The %s field is invalid.')),

		array('field' => 'received_at', 
            'label' => 'Received Date',
            'rules' => 'required|trim|valid_datetime',
           	'errors' => array(
               	'valid_datetime' => 'The %s field is invalid.'))
    );
}