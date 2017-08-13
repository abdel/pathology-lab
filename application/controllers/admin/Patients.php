<?php

class Patients extends MY_Controller {

	protected $models = array('operator', 'patient');
	
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
		// List all patients
		$this->data['patients'] = $this->patient->get_all();
	}

	public function add()
	{
		// Get rules from the model
		$this->form_validation->set_rules($this->patient->validate['form']);

		if ($this->form_validation->run() == TRUE)
        {
        	// Get form data
        	$details = array(
        		'name' => $this->input->post('name'),
				'gender' => $this->input->post('gender'),
				'dob' => $this->input->post('dob'),
				'country' => $this->input->post('country'),
				'phone' => $this->input->post('phone'),
				'passcode' => $this->input->post('passcode'),
				'email' => $this->input->post('email'),
				'medications' => $this->input->post('medications')
			);

        	// Add a new patient with form data
			if ($this->patient->insert($details))
			{
				$this->session->set_flashdata('patient_message', 'Successfully added a new patient to the system.');

				redirect('admin/patients');
			}
			else
			{
				$this->session->set_flashdata('patient_error', 'Oops. Something went wrong while adding a new patient. Please try again.');
			}
        }
	}

	public function show($id)
	{
		// Get patient and their reports
		$patient = $this->patient->with('reports')->get($id);

		if ($patient)
		{
			$this->data['patient'] = $patient;
		}
		else
		{
			$this->session->set_flashdata('patient_error', 'The patient you were looking for does not exsit. Please try again.');
			
			redirect('admin/patients');
		}
	}

	public function update($id)
	{
		// Get patient details
		$patient = $this->patient->get($id);

		// Make sure patient exists
		if ($patient)
		{
			$this->data['patient'] = $patient;

			// Get rules from the model
			$this->form_validation->set_rules($this->patient->validate['form']);

			if ($this->form_validation->run() == TRUE)
	        {
	        	// Get form data
	        	$details = array(
	        		'name' => $this->input->post('name'),
					'gender' => $this->input->post('gender'),
					'dob' => $this->input->post('dob'),
					'country' => $this->input->post('country'),
					'phone' => $this->input->post('phone'),
					'passcode' => $this->input->post('passcode'),
					'email' => $this->input->post('email'),
					'medications' => $this->input->post('medications')
				);

	        	// Update patient with the form data
				if ($this->patient->update($patient->id, $details))
				{
					$this->session->set_flashdata('patient_message', 'Successfully updated Patient #'.$patient->id.' in the system.');
					redirect('admin/patients');
				}
				else
				{
					$this->session->set_flashdata('patient_error', 'Oops. Something went wrong while updating Patient #'.$patient->id.'. Please try again.');
				}
	        }
		}
		else
		{
			$this->session->set_flashdata('patient_error', 'The patient you were looking for does not exsit. Please try again.');

			redirect('admin/patients');
		}
	}

	public function delete($id)
	{
		// Delete patient if they exist
		if ($this->patient->delete($id))
		{
			$this->session->set_flashdata('patient_message', 'Successfully removed Patient #'.$id.' from the system.');
		}
		else
		{
			$this->session->set_flashdata('patient_error', 'The patient you were looking for does not exsit. Please try again.');
		}

		redirect('admin/patients');
	}
}