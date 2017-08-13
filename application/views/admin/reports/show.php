<!-- START: REPORT -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Report Details (#<?php echo $report->id; ?>)</strong></h3>

		<div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/patients/show/'.$report->patient->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Back to Patient'); ?>
			</div>
			<div class="btn btn-default">
			  	<?php echo anchor('admin/reports/update/'.$report->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>'); ?>
			</div>

			<div class="btn btn-default">
			  	<?php echo anchor('admin/reports/delete/'.$report->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>'); ?>
			</div>
		</div>
        <div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Name:</strong> <?php echo $report->patient->name; ?> (#<?php echo $report->patient->id; ?>)</p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Age/Sex:</strong> <?php echo display_age($report->patient->dob).'/'.$report->patient->gender; ?></p>
            </div>

            <div class="col-xs-12 col-sm-4">
                <p><strong>Date of Birth</strong> <?php echo $report->patient->dob; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Status:</strong> <?php echo display_status($report->status); ?></p>
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

<!-- START: SPECIMENS -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Specimens</strong></h3>

	    <div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/specimens/add/'.$report->id, '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>'); ?>
			</div>
		</div>
	    <div class="clearfix"></div>
	</div>

	<div class="panel-body">

		<?php echo display_alerts('specimen'); ?>

		<?php if (count($report->specimens) > 0): ?>

		<table class="table table-bordered">
		  <thead>
		        <tr>
		            <th>#</th>
		            <th>Name</th>
		            <th>Collection Date/Time</th>
		            <th>Received Date/Time</th>
		            <th class="options">Options</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach ($report->specimens as $specimen): ?>
		        <tr>
		            <th scope="row"><?php echo $specimen->id; ?></th>
		            <td><?php echo $specimen->name; ?></td>
		            <td><?php echo $specimen->collected_at; ?></td>
		            <td><?php echo $specimen->received_at; ?></td>
		            <td class="options">
		                <?php echo anchor('admin/specimens/show/'.$specimen->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('title' => 'More Details')); ?>
		                <?php echo anchor('admin/specimens/update/'.$specimen->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
		                <?php echo anchor('admin/specimens/delete/'.$specimen->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
		            </td>
		        </tr>
		        <?php endforeach ?>
		    </tbody>
		</table>

		<?php else: ?>

		<?php echo display_alert('There are no specimens currently added to this report.', 'danger'); ?>

		<?php endif ?>

	</div>
</div>
<!-- END: SPECIMENS -->