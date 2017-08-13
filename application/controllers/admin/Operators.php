<?php

class Operators extends MY_Controller {

	protected $models = array('operator');
	
	public function __construct()
	{
		parent::__construct();

		// Make sure only Admin Operators are allowed
		if ((!isLoggedIn() && !isoperator()) || (isLoggedIn() && !isOperator()))
		{
			redirect('/');
		}
		else if ((isLoggedIn() && isOperator() && !isAdminOperator()))
		{
			redirect('admin/reports');
		}
	}

	public function index()
	{
		// List all operators
		$this->data['operators'] = $this->operator->get_all();
	}

	public function add()
	{
		// Get rules from the model
		$this->form_validation->set_rules($this->operator->validate['add_form']);

		if ($this->form_validation->run() == TRUE)
        {
        	// Get form data
        	$details = array(
        		'level' => $this->input->post('level'),
        		'name' => $this->input->post('name'),
        		'username' => $this->input->post('username'),
        		'password' => $this->bcrypt->hash_password($this->input->post('password')),
			);

        	// Add a new operator with form data
			if ($this->operator->insert($details))
			{
				$this->session->set_flashdata('operator_message', 'Successfully added a new operator to the system.');

				redirect('admin/operators');
			}
			else
			{
				$this->session->set_flashdata('operator_error', 'Oops. Something went wrong while adding a new operator. Please try again.');
			}
        }
	}

	public function update($id)
	{
		// Get operator details
		$operator = $this->operator->get($id);

		// Make sure operator exists
		if ($operator)
		{
			$this->data['operator'] = $operator;

			// Get rules from the model
			$this->form_validation->set_rules($this->operator->validate['update_form']);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'level' => $this->input->post('level'),
	        		'name' => $this->input->post('name'),
	        		'username' => $this->input->post('username')
				);

	        	// Set new password if provided
	        	$new_password = $this->input->post('new_password');
	        	if ($new_password != null)
	        	{
	        		$details['password'] = $this->bcrypt->hash_password($new_password);
	        	}

	        	// Update operator with the form data
				if ($this->operator->update($operator->id, $details))
				{
					$this->session->set_flashdata('operator_message', 'Successfully updated Operator #'.$operator->id.' in the system.');

					redirect('admin/operators');
				}
				else
				{
					$this->session->set_flashdata('operator_error', 'Oops. Something went wrong while updating Operator #'.$operator->id.'. Please try again.');
				}
	        }
		}
		else
		{
			redirect('admin/operators');
		}
	}

	public function delete($id)
	{
		// Don't delete current operator
		if ($id != $this->session->id)
		{
			// Delete operator if they exist
			if ($this->operator->delete($id))
			{
				$this->session->set_flashdata('operator_message', 'Successfully removed Operator #'.$id.' from the system.');
			}
		}
		else
		{
			$this->session->set_flashdata('operator_error', 'Unable to delete the currently logged in user.');
		}

		redirect('admin/operators');
	}
}