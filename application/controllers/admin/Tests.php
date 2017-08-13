<?php

class Tests extends MY_Controller {

	protected $models = array('operator', 'specimen', 'test');

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

	public function add($specimen_id)
	{
		// Get specimen details
		$specimen = $this->specimen->get($specimen_id);
		$this->data['specimen'] = $specimen;
		
		// Make sure this specimen exists
		if ($specimen)
		{
			// Get rules from the model
			$this->form_validation->set_rules($this->test->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'specimen_id' => $specimen->id,
	        		'name' => $this->input->post('name'),
	        		'comments' => $this->input->post('comments')
				);

	        	// Add a new test with form data
				if ($this->test->insert($details))
				{
					$this->session->set_flashdata('test_message', 'Successfully added a new test to Specimen #'.$specimen->id.'.');

					redirect('admin/specimens/show/'.$specimen->id);
				}
				else
				{
					$this->session->set_flashdata('test_error', 'Oops. Something went wrong while adding a new test. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('test_error', 'The specimen you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function show($id)
	{
		// Get test, including specimen & tests
		$test = $this->test->with('specimen')->with('results')->get($id);

		if ($test)
		{
			$this->data['test'] = $test;
		}
		else
		{
			$this->session->set_flashdata('test_error', 'The test you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function update($id)
	{
		// Get test details
		$test = $this->test->with('specimen')->get($id);

		// Make sure test exists
		if ($test)
		{
			$this->data['test'] = $test;

			// Get rules from Operator model
			$this->form_validation->set_rules($this->test->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'name' => $this->input->post('name'),
	        		'comments' => $this->input->post('comments')
				);

	        	// Update test with the form data
				if ($this->test->update($test->id, $details))
				{
					$this->session->set_flashdata('test_message', 'Successfully updated Test #'.$test->id.' for Specimen #'.$test->specimen->id.'.');

					redirect('admin/specimens/show/'.$test->specimen->id);
				}
				else
				{
					$this->session->set_flashdata('test_error', 'Oops. Something went wrong while updating Test #'.$test->id.'. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('test_error', 'The test you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function delete($id)
	{
		// Delete test if it exists	
		if ($this->test->delete($id))
		{
			$this->session->set_flashdata('test_message', 'Successfully removed Test #'.$id.' from the system.');
		}
		else
		{
			$this->session->set_flashdata('test_error', 'The test you were looking for does not exsit. Please try again.');
		}

		redirect_prev();
	}

}