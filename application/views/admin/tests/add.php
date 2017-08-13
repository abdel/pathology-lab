<div class="page-header">
	<h1>Add Test to Specimen #<?php echo $specimen->id; ?></h1>
	<p>Add a new test to an existing specimen by filling the form below.</p>
</div>

<?php echo display_alerts('test'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="specimen_id" class="col-sm-2 control-label">Specimen ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="specimen_id" value="<?php echo $specimen->id; ?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter test's name" value="<?php echo set_value('name'); ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label">Comments</label>
        <div class="col-sm-3">
            <textarea class="form-control" name="comments" placeholder="Enter any comments about this test"><?php echo set_value('comments'); ?></textarea>
            <?php echo display_form_error('comments'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Add</button>
        </div>
    </div>
</form>