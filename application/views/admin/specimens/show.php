<!-- START: SPECIMEN -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>SPEC #<?php echo $specimen->id; ?> for Report #<?php echo $specimen->report->id; ?></strong></h3>

		<div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/reports/show/'.$specimen->report->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Back to Specimens', array('title' => 'Report Details')); ?>
			</div>
			<div class="btn btn-default">
			  	<?php echo anchor('admin/specimens/update/'.$specimen->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
			</div>

			<div class="btn btn-default">
			  	<?php echo anchor('admin/specimens/delete/'.$specimen->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
			</div>
		</div>
        <div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Specimen:</strong> <?php echo $specimen->name; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Collection Date/Time:</strong> <?php echo $specimen->collected_at; ?></p>
            </div>

            <div class="col-xs-12 col-sm-4">
                <p><strong>Received Date/Time:</strong> <?php echo $specimen->received_at; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Comments:</strong> <?php echo $specimen->comments; ?></p>
            </div>
        </div>
	</div>
</div>
<!-- END: SPECIMEN -->

<!-- START: TESTS -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Tests Ordered</strong></h3>

	    <div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/tests/add/'.$specimen->id, '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>'); ?>
			</div>
		</div>
	    <div class="clearfix"></div>
	</div>

	<div class="panel-body">

		<?php echo display_alerts('test'); ?>

		<?php if (count($specimen->tests) > 0): ?>

		<table class="table table-bordered">
		  <thead>
		        <tr>
		            <th>#</th>
		            <th>Name</th>
		            <th class="options">Options</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach ($specimen->tests as $test): ?>
		        <tr>
		            <th scope="row"><?php echo $test->id; ?></th>
		            <td><?php echo $test->name; ?></td>
		            <td class="options">
		                <?php echo anchor('admin/tests/show/'.$test->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>', array('title' => 'More Details')); ?>
		                <?php echo anchor('admin/tests/update/'.$test->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
		                <?php echo anchor('admin/tests/delete/'.$test->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
		            </td>
		        </tr>
		        <?php endforeach ?>
		    </tbody>
		</table>

		<?php else: ?>

		<?php echo display_alert('There are no tests currently added to this specimen.', 'danger'); ?>

		<?php endif ?>

	</div>
</div>
<!-- END: TESTS -->