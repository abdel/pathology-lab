<?php

class Results extends MY_Controller {

	protected $models = array('operator', 'test', 'result');

	public function __construct()
	{
		parent::__construct();

		// Make sure only operators are allowed
		if ((!isLoggedIn() && !isPatient()) || (isLoggedIn() && !isOperator()))
		{
			redirect('/');
		}
	}

	public function index()
	{
		redirect('admin/reports');
	}

	public function add($test_id)
	{
		// Get test details
		$test = $this->test->get($test_id);
		$this->data['test'] = $test;
		
		// Make sure this test exists
		if ($test)
		{
			// Get rules from the model
			$this->form_validation->set_rules($this->result->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'test_id' => $test->id,
	        		'name' => $this->input->post('name'),
	        		'type' => $this->input->post('type'),
	        		'normal' => $this->input->post('normal'),
	        		'abnormal' => $this->input->post('abnormal'),
	        		'flag' => $this->input->post('flag'),
	        		'units' => $this->input->post('units')
				);

	        	// Add a new result with form data
				if ($this->result->insert($details))
				{
					$this->session->set_flashdata('result_message', 'Successfully added a new result to Test #'.$test->id.'.');

					redirect('admin/tests/show/'.$test->id);
				}
				else
				{
					$this->session->set_flashdata('result_error', 'Oops. Something went wrong while adding a new result. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('result_error', 'The test you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function update($id)
	{
		// Get result details
		$result = $this->result->with('test')->get($id);

		// Make sure result exists
		if ($result)
		{
			$this->data['result'] = $result;

			// Get rules from Operator model
			$this->form_validation->set_rules($this->result->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'name' => $this->input->post('name'),
	        		'type' => $this->input->post('type')
				);

	        	if ($details['type'] == 'V')
	        	{
	        		$details['normal'] = $this->input->post('normal');
	        		$details['abnormal'] = $this->input->post('abnormal');
	        		$details['flag'] = $this->input->post('flag');
	        		$details['units'] = $this->input->post('units');
	        	}

	        	// Update result with the form data
				if ($this->result->update($result->id, $details))
				{
					$this->session->set_flashdata('result_message', 'Successfully updated Result #'.$result->id.' for Test #'.$result->test->id.'.');

					redirect('admin/tests/show/'.$result->test->id);
				}
				else
				{
					$this->session->set_flashdata('result_error', 'Oops. Something went wrong while updating Result #'.$result->id.'. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('result_error', 'The result you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function delete($id)
	{
		// Delete result if it exists	
		if ($this->result->delete($id))
		{
			$this->session->set_flashdata('result_message', 'Successfully removed Result #'.$id.' from the system.');
		}
		else
		{
			$this->session->set_flashdata('result_error', 'The test you were looking for does not exsit. Please try again.');
		}

		redirect_prev();
	}

}