<!-- START: TEST -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Test #<?php echo $test->id; ?> for Specimen #<?php echo $test->specimen->id; ?></strong></h3>

		<div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/specimens/show/'.$test->specimen->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Back to Specimen'); ?>
			</div>
			<div class="btn btn-default">
			  	<?php echo anchor('admin/tests/update//'.$test->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
			</div>

			<div class="btn btn-default">
			  	<?php echo anchor('admin/tests/delete/'.$test->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
			</div>
		</div>
        <div class="clearfix"></div>
	</div>
	<div class="panel-body">
		<div class="row">
            <div class="col-xs-12 col-sm-4">
                <p><strong>Test:</strong> <?php echo $test->name; ?></p>
            </div>
            <div class="col-xs-12 col-sm-4">
                <p><strong>Comments:</strong> <?php echo $test->comments; ?></p>
            </div>
        </div>
	</div>
</div>
<!-- END: SPECIMEN -->

<!-- START: RESULTS -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title pull-left"><strong>Results</strong></h3>

	    <div class="pull-right">
			<div class="btn btn-default">
			  	<?php echo anchor('admin/results/add/'.$test->id, '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>'); ?>
			</div>
		</div>
	    <div class="clearfix"></div>
	</div>

	<div class="panel-body">

		<?php echo display_alerts('result'); ?>

		<?php if (count($test->results) > 0): ?>

		<table class="table table-bordered">
		  <thead>
		        <tr>
		            <th>#</th>
		            <th>Name</th>
		            <th class="text-center">Result</th>
		            <th class="text-center">Normal</th>
		            <th class="text-center">Abnormal</th>
		            <th class="text-center">Units</th>
		            <th class="text-center">Flag</th>
		            <th class="options">Options</th>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach ($test->results as $result): ?>
		        <tr>
		            <th scope="row"><?php echo $result->id; ?></th>
		            <td><?php echo $result->name; ?></td>
		            <td class="text-center"><?php echo format_result($result->type); ?></td>
		            <td class="text-center"><?php echo $result->normal; ?></td>
		            <td class="text-center"><?php echo $result->abnormal; ?></td>
		            <td class="text-center"><?php echo $result->units; ?></td>
		            <td class="text-center"><?php echo format_flag($result->flag); ?></td>
		            <td class="options">
		                <?php echo anchor('admin/results/update/'.$result->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
		                <?php echo anchor('admin/results/delete/'.$result->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
		            </td>
		        </tr>
		        <?php endforeach ?>
		    </tbody>
		</table>

		<?php else: ?>

		<?php echo display_alert('There are no results currently added to this test.', 'danger'); ?>

		<?php endif ?>

	</div>
</div>
<!-- END: RESULTS -->