<?php

class Test_model extends MY_Model {

	public $belongs_to = array('specimen');
	public $has_many = array('results');

	public $protected_attributes = array('id');
	
	public $validate = array(
		array('field' => 'name', 
           	'label' => 'Name',
           	'rules' => 'required|trim'),

		array('field' => 'comments', 
        	'label' => 'Comments',
          	'rules' => 'trim')
    );
}