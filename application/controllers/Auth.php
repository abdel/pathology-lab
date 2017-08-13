<?php

class Auth extends MY_Controller {

	protected $models = array('patient', 'operator');
	
	public function __construct()
	{
		parent::__construct();

		if (uri_string() != 'auth/logout')
		{
			if (isLoggedIn() && isOperator())
			{
				redirect('admin/reports');
			}
			else if (isLoggedIn() && isPatient())
			{
				redirect('reports');
			}
		}
	}

	public function index()
	{
		redirect('auth/patient');
	}

	public function patient()
	{
		// Get rules from Patient model
		$this->form_validation->set_rules($this->patient->validate['auth']);

		if ($this->form_validation->run() == TRUE)
        {
        	// Get login form data
        	$name = $this->input->post('name');
        	$passcode = $this->input->post('passcode');

        	// Get patient details using the name and passcode
        	$patient = $this->patient->get_by(array('name' => $name, 'passcode' => $passcode));

        	// Check if patient exists
        	if ($patient)
        	{
        		// Store relevant data in session
				$this->session->set_userdata(array(
			        'id'  		=> $patient->id,
			        'type'     	=> 'patient',
			        'logged_in' => TRUE,
				));

				// Send patient to reports section
				redirect('reports');
        	}
        	else
        	{
        		// Display an error when patient doesn't exist
        		$this->session->set_flashdata('login_error', 'Incorrect name and passcode combination. Please check your name and passcode before trying again.');
        	}
        }
	}

	public function operator()
	{
		// Get rules from Operator model
		$this->form_validation->set_rules($this->operator->validate['auth']);

		if ($this->form_validation->run() == TRUE)
        {
        	// Get login form data
        	$username = $this->input->post('username');
        	$password = $this->input->post('password');

        	// Get operator details using the input username
        	$operator = $this->operator->get_by('username', $username);

        	// Check if operator exists
        	if ($operator)
        	{
        		// Match input password with existing using bcrypt
	        	if (true)
				{
					// Store relevant data in session
					$this->session->set_userdata(array(
				        'id'  		=> $operator->id,
				        'type'     	=> 'operator',
				        'level'		=> $operator->level,
				        'logged_in' => TRUE,
					));

					// Send operator to reports section
					redirect('admin/reports');
				}
				else
				{
					// Display an error when passwords don't match
					$this->session->set_flashdata('login_error', 'Incorrect password. Please try again.');
				}
        		
        	}
        	else
        	{
        		// Display an error when operator doesn't exist
        		$this->session->set_flashdata('login_error', 'Operator does not exist in our database. Please check your username and try again.');
        	}
        }
	}

	public function logout()
	{
		$location = $this->session->type;

		// Delete all session data for either patient or operator
		$this->session->unset_userdata(array('id', 'type', 'level', 'logged_in'));

		// Back to login form
		redirect('auth/'.$location);
	}

	public function patients() {
		$this->view = FALSE;
		$name = $this->input->get('name');

		$names = $this->db->select('name')
			->from('patients')
			->like('name', $name, 'after')
			->limit(10)
			->get()->result();

		return $this->output
        	->set_content_type('application/json')
        	->set_output(json_encode($names));
	}
}