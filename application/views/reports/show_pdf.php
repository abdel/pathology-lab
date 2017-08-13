<!-- START: REPORT -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Report Details</strong></h3>
		<div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
                <p><strong>Patient ID:</strong> #<?php echo $report->patient->id; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Report Date/Time:</strong> <?php echo $report->created_at; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Name:</strong> <?php echo $report->patient->name; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Date of Birth</strong> <?php echo $report->patient->dob; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Status:</strong> <?php echo display_status($report->status); ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Age/Sex:</strong> <?php echo display_age($report->patient->dob).'/'.$report->patient->gender; ?></p>
            </div>
            
            <div class="col-xs-12 col-sm-4">
                <p><strong>Ordering Dr:</strong> <?php echo $report->ordering_dr; ?></p>
            </div>

            <div class="col-xs-12 col-sm-4">
                <p><strong>Physician Copy for:</strong> <?php echo $report->copy_for; ?></p>
            </div>
        </div>
	</div>
</div>
<!-- END: REPORT -->

<?php foreach ($report->specimens as $specimen): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title "><strong>SPEC #<?php echo $specimen->id; ?></strong></h3>
	</div>
	<div class="panel-body">
  		<div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Specimen:</strong> <?php echo $specimen->name; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Collection Date:</strong> <?php echo $specimen->collected_at; ?></p>
            </div>

            <div class="col-xs-12 col-sm-4">
                <p><strong>Received Date:</strong> <?php echo $specimen->received_at; ?></p>
            </div>

            <div class="col-xs-12 col-sm-4">
                <p><strong>Comments:</strong> <?php echo $specimen->comments; ?></p>
            </div>
        </div>

        <br>

        <?php $tests = $this->test->with('results')->get_many_by('specimen_id', $specimen->id); ?>
        <?php foreach ($tests as $test): ?>
				<?php if (count($test->results) > 0): ?>
				<table class="table table-bordered">
				  <thead>
				        <tr>
				            <th>Name</th>
				            <th class="text-center">Normal</th>
				            <th class="text-center">Abnormal</th>
				            <th class="text-center">Units</th>
				            <th class="text-center">Flag</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php foreach ($test->results as $result): ?>
				        <tr>
				            <td scope="row" width="80%"><?php echo $result->name; ?></td>
				            <td class="text-center" width="5%"><?php echo $result->normal; ?></td>
				            <td class="text-center" width="5%"><?php echo $result->abnormal; ?></td>
				            <td class="text-center" width="5%"><?php echo $result->units; ?></td>
				            <td class="text-center" width="5%"><?php echo format_flag($result->flag); ?></td>
				        </tr>
				        <?php endforeach ?>
				    </tbody>
				</table>
				<?php endif ?>

				<?php if ($test->comments): ?>
				<p><strong>Comments:</strong> <?php echo $test->comments; ?></p>
				<?php endif; ?>
		<?php endforeach; ?>

		<p><strong>Flag Key:</strong> L= Abnormal Low, H= Abnormal High, **= critical value</p>
	</div>
</div>
<?php endforeach ?>