<?php

class Operator_model extends MY_Model {

	public $before_create = array('before_create');
    public $before_update = array('before_update');

    public $protected_attributes = array('id');

	public $validate = array(
        'auth' => array(
            array('field' => 'username', 
                   'label' => 'Username',
                   'rules' => 'required|trim|min_length[5]|max_length[12]'),

            array('field' => 'password',
                   'label' => 'Password',
                   'rules' => 'required|trim|min_length[8]'),
        ),

        'add_form' => array(
            array('field' => 'level', 
                   'label' => 'Level',
                   'rules' => 'required|trim'),

            array('field' => 'name', 
                   'label' => 'Name',
                   'rules' => 'required|trim'),

            array('field' => 'username', 
                   'label' => 'Username',
                   'rules' => 'required|trim|min_length[5]|max_length[12]'),

            array('field' => 'password',
                   'label' => 'Password',
                   'rules' => 'required|trim|min_length[8]'),
        ),

        'update_form' => array(
            array('field' => 'level', 
                   'label' => 'Level',
                   'rules' => 'required|trim'),

            array('field' => 'name',
                   'label' => 'Name',
                   'rules' => 'required|trim'),

            array('field' => 'username', 
                   'label' => 'Username',
                   'rules' => 'required|trim|min_length[5]|max_length[12]'),

            array('field' => 'new_password',
                   'label' => 'New Password',
                   'rules' => 'trim|min_length[8]'),
        ),
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
}