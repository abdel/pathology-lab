<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><strong>Patient Details</strong> </h3>
        <div class="pull-right">
            <div class="btn btn-default">
                <?php echo anchor('admin/patients/update/'.$patient->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>', array('title' => 'Update Details')); ?>
            </div>
            <div class="btn btn-default">
                <?php echo anchor('admin/patients/delete/'.$patient->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>', array('title' => 'Delete')); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
	<div class="panel-body">
  		<div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Name:</strong> <?php echo $patient->name; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Age/Sex: </strong> <?php echo display_age($patient->dob).'/'.$patient->gender; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Date of Birth: </strong> <?php echo $patient->dob; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Phone Number: </strong> <?php echo $patient->phone; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Email Address: </strong> <?php echo $patient->email; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Medications: </strong> <?php echo $patient->medications; ?></p>
            </div>
  		</div>
   	</div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title pull-left"><strong>Reports</strong></h3>
        <div class="pull-right">
            <div class="btn btn-default">
                <?php echo anchor('admin/reports/add/'.$patient->id, '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>'); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <?php echo display_alerts('report'); ?>

        <?php if (count($patient->reports) > 0): ?>

        <table class="table table-bordered">
          <thead>
                <tr>
                    <th>#</th>
                    <th>Ordering Dr</th>
                    <th>Status</th>
                    <th class="options">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patient->reports as $report): ?>
                <tr>
                    <th scope="row"><?php echo $report->id; ?></th>
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

        <?php echo display_alert('There are no reports currently for this patient.', 'danger'); ?>

        <?php endif ?>
    </div>
</div>