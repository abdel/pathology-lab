<div class="page-header">
	<div class="pull-left">
		<h1>Reports</h1>
		<p>List of all reports currently added to the system.</p>
	</div>
	<div class="pull-right">
		<div class="btn-group">
		  	<div class="btn btn-default">
		  		<?php echo anchor('admin/reports/add', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Report</a>'); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php echo display_alerts('report'); ?>

<?php if (count($reports) > 0): ?>

<table class="table table-bordered">
  <thead>
        <tr>
            <th>#</th>
            <th>Patient</th>
            <th>Ordering Dr</th>
            <th>Status</th>
            <th class="options">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reports as $report): ?>
        <tr>
            <th scope="row"><?php echo $report->id; ?></th>
            <td><?php echo anchor('admin/patients/show/'.$report->patient->id, $report->patient->name); ?></td>
            <td><?php echo $report->ordering_dr; ?></td>
            <td><?php echo display_status($report->status); ?></td>
            <td class="options">
                <?php echo anchor('admin/reports/show/'.$report->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('title' => 'More Details')); ?>
                <?php echo anchor('admin/reports/update/'.$report->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
                <?php echo anchor('admin/reports/delete/'.$report->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php else: ?>

<?php echo display_alert('There are no reporrts currently added to the system.', 'danger'); ?>

<?php endif ?>