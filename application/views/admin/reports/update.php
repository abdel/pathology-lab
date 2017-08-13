<div class="page-header">
	<h1>Update Report</h1>
	<p>Update an existing report for an existing patient by filling the form below.</p>
</div>

<?php echo display_alerts('report'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="patient_id" class="col-sm-2 control-label">Patient ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="patient_id" placeholder="Enter patient's ID" value="<?php echo $report->patient_id; ?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-3">
        <?php echo form_dropdown('status', array('R' => 'Routine', 'S' => 'STAT'), $report->status, array('class' => 'form-control')); ?>
        <?php echo display_form_error('status'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="ordering_dr" class="col-sm-2 control-label">Ordering Dr</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="ordering_dr" placeholder="Enter ordering doctor's name" value="<?php echo $report->ordering_dr; ?>">
            <?php echo display_form_error('ordering_dr'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="copy_for" class="col-sm-2 control-label">Physician Copy for</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="copy_for" placeholder="Enter physician's name for copy" value="<?php echo $report->copy_for; ?>">
            <?php echo display_form_error('copy_for'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
    </div>
</form>