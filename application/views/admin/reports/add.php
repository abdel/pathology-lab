<div class="page-header">
	<h1>Add Report <?php if ($patient_id != null): ?>for Patient #<?php echo $patient_id; endif; ?></h1>
	<p>Attach a new report to an existing patient by filling the form below.</p>
</div>

<?php echo display_alerts('report'); ?>

<?php echo form_open('admin/reports/add', array('class' => 'form-horizontal')); ?>
    <?php if ($patient_id != null): ?>
    <input type="hidden" class="form-control" name="patient_id" placeholder="Enter patient's ID" value="<?php echo $patient_id; ?>">
    <?php else: ?>
    <div class="form-group">
        <label for="patient_id" class="col-sm-2 control-label">Patient ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="patient_id" placeholder="Enter patient's ID" value="<?php echo set_value('patient_id'); ?>">
            <?php echo display_form_error('patient_id'); ?>
        </div>
    </div>
    <?php endif ?>

    <div class="form-group">
        <label for="status" class="col-sm-2 control-label">Status</label>
        <div class="col-sm-3">
        <?php echo form_dropdown('status', array('R' => 'Routine', 'S' => 'STAT'), set_value('status'), array('class' => 'form-control')); ?>
        <?php echo display_form_error('status'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="ordering_dr" class="col-sm-2 control-label">Ordering Dr</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="ordering_dr" placeholder="Enter ordering doctor's name" value="<?php echo set_value('ordering_dr'); ?>">
            <?php echo display_form_error('ordering_dr'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="copy_for" class="col-sm-2 control-label">Physician Copy for</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="copy_for" placeholder="Enter physician's name for copy" value="<?php echo set_value('copy_for'); ?>">
            <?php echo display_form_error('copy_for'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Add</button>
        </div>
    </div>
</form>