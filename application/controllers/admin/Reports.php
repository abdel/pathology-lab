<?php

class Reports extends MY_Controller {

	protected $models = array('operator', 'patient', 'report');

	public function __construct()
	{
		parent::__construct();

		// Make sure only operators are allowed
		if ((!isLoggedIn() && !isPatient()) || (isLoggedIn() && !isOperator()))
		{
			redirect('/');
		}

		if (uri_string() == 'admin')
		{
			redirect('admin/reports');
		}
	}

	public function index()
	{
		// Pass all reports to view
		$this->data['reports'] = $this->report->with('patient')->get_all();
	}

	public function add($patient_id = null)
	{
		// Pass patient id to view
		$this->data['patient_id'] = $patient_id;

		// Get rules from the model
		$this->form_validation->set_rules($this->report->validate['add_form']);

		if ($this->form_validation->run() == TRUE)
        {
        	// Get form data
        	$details = array(
        		'patient_id' => $this->input->post('patient_id'),
        		'status' => $this->input->post('status'),
        		'ordering_dr' => $this->input->post('ordering_dr'),
        		'copy_for' => $this->input->post('copy_for')
			);

        	$patient = $this->patient->get($details['patient_id']);

        	// Make sure this patient exists
        	if ($patient)
        	{
        		// Add a new report with form data
				if ($this->report->insert($details))
				{
					$this->session->set_flashdata('report_message', 'Successfully added a new report for Patient #'.$patient->id.'.');

					redirect('admin/reports');
				}
				else
				{
					$this->session->set_flashdata('report_error', 'Oops. Something went wrong while adding a new report. Please try again.');
				}
        	}
        	else
        	{
        		$this->session->set_flashdata('report_error', 'The Patient ID does not exist in the system. Please check the ID before trying again.');
        	}
        }
	}

	public function show($id)
	{
		// Get report, including patient & specimens
		$report = $this->report->with('patient')->with('specimens')->get($id);

		if ($report)
		{
			$this->data['report'] = $report;
		}
		else
		{
			$this->session->set_flashdata('report_error', 'The report you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function update($id)
	{
		// Get report details
		$report = $this->report->with('patient')->get($id);

		// Make sure report exists
		if ($report)
		{
			$this->data['report'] = $report;

			// Get rules from the model
			$this->form_validation->set_rules($this->report->validate['update_form']);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
		    	$details = array(
		    		'status' => $this->input->post('status'),
		    		'ordering_dr' => $this->input->post('ordering_dr'),
		    		'copy_for' => $this->input->post('copy_for')
				);

	    		// Add a new report with form data
				if ($this->report->update($report->id, $details))
				{
					$this->session->set_flashdata('report_message', 'Successfully updated Report #'.$report->id.' for Patient #'.$report->patient->id.'.');

					redirect('admin/reports');
				}
				else
				{
					$this->session->set_flashdata('report_error', 'Oops. Something went wrong while adding a new report. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('report_error', 'The report you were looking for does not exsit. Please try again.');

			redirect_prev();
		}
	}

	public function delete($id)
	{
		// Delete report if it exists
		if ($this->report->delete($id))
		{
			$this->session->set_flashdata('report_message', 'Successfully removed Report #'.$id.' from the system.');
		}
		else
		{
			$this->session->set_flashdata('report_error', 'The report you were looking for does not exsit. Please try again.');
		}

		redirect_prev();
	}

}