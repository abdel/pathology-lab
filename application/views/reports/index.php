<div class="page-header">
	<h1>My Reports</h1>
	<p>List of all your medical reports currently available.</p>
</div>

<?php echo display_alerts('report'); ?>

<?php if (count($reports) > 0): ?>

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
        <?php foreach ($reports as $report): ?>
        <tr>
            <th scope="row"><?php echo $report->id; ?></th>
            <td><?php echo $report->ordering_dr; ?></td>
            <td><?php echo display_status($report->status); ?></td>
            <td class="options" width="15%">
                <?php echo anchor('reports/show/'.$report->id, '<span class="glyphicon glyphicon-search" aria-hidden="true"></span> View Report'); ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php else: ?>

<?php echo display_alert('There are no reports available for you at the moment.', 'danger'); ?>

<?php endif ?>