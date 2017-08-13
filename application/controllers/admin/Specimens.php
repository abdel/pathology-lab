<?php

class Specimens extends MY_Controller {

	protected $models = array('operator', 'report', 'specimen');

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

	public function add($report_id)
	{
		// Get report details
		$report = $this->report->get($report_id);
		$this->data['report'] = $report;
		
		// Make sure this report exists
		if ($report)
		{
			// Get rules from the model
			$this->form_validation->set_rules($this->specimen->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'report_id' => $report->id,
	        		'name' => $this->input->post('name'),
	        		'comments' => $this->input->post('comments'),
	        		'collected_at' => $this->input->post('collected_at'),
	        		'received_at' => $this->input->post('received_at'),
				);

	        	// Add a new specimen with form data
				if ($this->specimen->insert($details))
				{
					$this->session->set_flashdata('specimen_message', 'Successfully added a new specimen to Report #'.$report->id.'.');

					redirect('admin/reports/show/'.$report->id);
				}
				else
				{
					$this->session->set_flashdata('specimen_error', 'Oops. Something went wrong while adding a new specimen. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('specimen_error', 'The report you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function show($id)
	{
		// Get specimen, including report & tests
		$specimen = $this->specimen->with('report')->with('tests')->get($id);

		if ($specimen)
		{
			$this->data['specimen'] = $specimen;
		}
		else
		{
			$this->session->set_flashdata('specimen_error', 'The specimen you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function update($id)
	{
		// Get specimen details
		$specimen = $this->specimen->with('report')->get($id);

		// Make sure specimen exists
		if ($specimen)
		{
			$this->data['specimen'] = $specimen;

			// Get rules from Operator model
			$this->form_validation->set_rules($this->specimen->validate);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'name' => $this->input->post('name'),
	        		'comments' => $this->input->post('comments'),
	        		'collected_at' => $this->input->post('collected_at'),
	        		'received_at' => $this->input->post('received_at'),
				);

	        	// Update specimen with the form data
				if ($this->specimen->update($specimen->id, $details))
				{
					$this->session->set_flashdata('specimen_message', 'Successfully updated Specimen #'.$specimen->id.' for Report #'.$specimen->report->id.'.');

					redirect('admin/reports/show/'.$specimen->report->id);
				}
				else
				{
					$this->session->set_flashdata('specimen_error', 'Oops. Something went wrong while updating Specimen #'.$specimen->id.'. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('report_error', 'The specimen you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function delete($id)
	{
		// Delete specimen if it exists	
		if ($this->specimen->delete($id))
		{
			$this->session->set_flashdata('specimen_message', 'Successfully removed Specimen #'.$id.' from the system.');
		}
		else
		{
			$this->session->set_flashdata('specimen_error', 'The specimen you were looking for does not exsit. Please try again.');
		}

		redirect_prev();
	}

}