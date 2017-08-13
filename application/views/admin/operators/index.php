<div class="page-header">
	<div class="pull-left">
		<h1>Operators</h1>
		<p>List of operators currently registered to the system.</p>
	</div>
	<div class="pull-right">
		<div class="btn-group">
		  	<div class="btn btn-default">
		  		<?php echo anchor('admin/operators/add', '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Operator</a>'); ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<?php echo display_alert($this->session->flashdata('operator_message'), 'success'); ?>
<?php echo display_alert($this->session->flashdata('operator_error'), 'danger'); ?>

<?php if (count($operators) > 0): ?>

<table class="table table-bordered">
  <thead>
        <tr>
            <th>#</th>
            <th>Level</th>
            <th>Name</th>
            <th>Username</th>
            <th class="options">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($operators as $operator): ?>
        <tr>
            <th scope="row"><?php echo $operator->id; ?></th>
            <td><?php echo display_level($operator->level); ?></td>
            <td><?php echo $operator->name; ?></td>
            <td><?php echo $operator->username; ?></td>
            <td class="options">
                <?php echo anchor('admin/operators/update/'.$operator->id, '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('title' => 'Update Details')); ?>
                <?php echo anchor('admin/operators/delete/'.$operator->id, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('title' => 'Delete')); ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php else: ?>

<?php echo display_alert('There are no operators currently added to the system.', 'danger'); ?>

<?php endif ?>