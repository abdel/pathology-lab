<?php

class Reports extends MY_Controller {

	protected $models = array('report', 'patient', 'test', 'result');

	public function __construct()
	{
		parent::__construct();

		if (!isLoggedIn() && !isPatient())
		{
			redirect('auth/patient');
		}
		elseif (isLoggedIn() && isOperator())
		{
			redirect('admin/reports');
		}

		// Load PDF and PHPMailer
		$this->load->library('pdf');
		$this->load->library('MY_PHPMailer');
	}

	public function index()
	{
		// Pass patient's reports to view
		$this->data['reports'] = $this->report->with('patient')->get_many_by('patient_id', $this->session->id);
	}

	public function show($id, $type = 'web')
	{
		// Pass patient's reports to view
		$report = $this->report->with('patient')->with('specimens')->get_by(array('id' => $id, 'patient_id' => $this->session->id));

		// Make sure report exists
		if ($report)
		{
			// Display online version
			if ($type == 'web')
			{
				$this->data['report'] = $report;
			}
			else
			{
				$this->view = FALSE;

				// Render PDF layout
				$this->pdf->load_view('layouts/pdf', array('content' => 'reports/show_pdf', 'report' => $report));
				$this->pdf->render();

				// Download PDF
				if ($type == 'pdf')
				{
					$this->pdf->stream("report_".$id.".pdf");
				}
				
				// Send Email
				else if ($type == 'mail')
				{
					// Get PHPMailer
					$mail = $this->_mail();

					// Add patient's details
					$mail->addAddress($report->patient->email, $report->patient->name);

					// Attach PDF file
					$mail->addStringAttachment($this->pdf->output(), 'report_'.$id.'.pdf');

					if (!$mail->send())
					{
						$this->session->set_flashdata('report_error', 'An error occured while sending your medical report. <strong>Message:</strong> '.$mail->ErrorInfo);
					} 
					else 
					{
						$this->session->set_flashdata('report_message', 'Successfully sent your report via email in a PDF format.');
					}

					redirect('reports/show/'.$id);
				}
			}
			
		}
		else
		{
			$this->session->set_flashdata('report_error', 'The report you were looking for does not exist. Please try again.');

			redirect('reports');
		}
	}

	public function _mail()
	{
		$mail = new PHPMailer();
       	$mail->isSMTP();
       	$mail->SMTPAuth = true;
       	$mail->SMTPSecure = 'ssl';
       	// $mail->SMTPDebug = 2;  // Debugging purposes only

       	// SMTP Details
       	$mail->Host = 'smtp.gmail.com';
       	$mail->Username = 'abdelm.is@gmail.com';
       	$mail->Password = 'zdcsmjfhokcrljld';
       	$mail->Port = 465;
		
		// Sender
		$mail->setFrom('lab@crossover.com', 'Pathology Lab');

		// Message Details
		$mail->Subject = 'Report from Pathology Lab';
		$mail->Body    = "Hello,\n\nAttached is your medical report from the Pathology Lab in PDF format.\n\nBest regards,\nPathology Lab";

		return $mail;
	}
}