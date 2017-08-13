<?php

class Result_model extends MY_Model {

	public $belongs_to = array('test');
    
	public $protected_attributes = array('id');
	
	public $validate = array(
		array('field' => 'name', 
           	'label' => 'Name',
           	'rules' => 'required|trim'),

        array('field' => 'type', 
            'label' => 'Result',
            'rules' => 'required|trim'),

		array('field' => 'normal', 
        	'label' => 'Normal',
          	'rules' => 'trim'),

		array('field' => 'abnormal', 
           	'label' => 'Abnormal',
           	'rules' => 'trim'),

		array('field' => 'units', 
           	'label' => 'Units',
           	'rules' => 'trim'),

		array('field' => 'flag', 
           	'label' => 'Flag',
           	'rules' => 'trim')
    );
}