<div class="page-header">
	<div class="pull-left">
		<h1>Patients</h1>
		<p>List of patients currently registered to the system.</p>
	</div>
	<div class="pull-right">
		<div class="btn-group">
		  	<div class="btn btn-default">
		  		<?php echo anchor('admin/patients/add', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Patient</a>'); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php echo display_alerts('patient'); ?>

<?php if (count($patients) > 0): ?>

<table class="table table-bordered">
  <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
            <th class="options">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($patients as $patient): ?>
        <tr>
            <th scope="row"><?php echo $patient->id; ?></th>
            <td><?php echo $patient->name; ?></td>
            <td><?php echo display_gender($patient->gender); ?></td>
            <td><?php echo $patient->dob; ?></td>
            <td><?php echo $patient->phone; ?></td>
            <td class="options">
                <?php echo anchor('admin/patients/show/'.$patient->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('title' => 'More Details')); ?>
                <?php echo anchor('admin/patients/update/'.$patient->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
                <?php echo anchor('admin/patients/delete/'.$patient->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php else: ?>

<?php echo display_alert('There are no patients currently added to the system.', 'danger'); ?>

<?php endif ?>