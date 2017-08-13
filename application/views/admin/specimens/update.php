<div class="page-header">
	<h1>Update Specimen for Report #<?php echo $specimen->report->id; ?></h1>
	<p>Add a new specimen to an existing report by filling the form below.</p>
</div>

<?php echo display_alerts('specimen'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="report_id" class="col-sm-2 control-label">Report ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="report_id" value="<?php echo $specimen->report->id; ?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter specimen's name" value="<?php echo $specimen->name; ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="collected_at" class="col-sm-2 control-label">Collection Date</label>
        <div class="col-sm-3">
            <div class="input-group date" id="collected_at">
                <input type="text" class="form-control" name="collected_at" value="<?php echo $specimen->collected_at; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php echo display_form_error('collected_at'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="received_at" class="col-sm-2 control-label">Received Date</label>
        <div class="col-sm-3">
            <div class="input-group date" id="received_at">
                <input type="text" class="form-control" name="received_at" value="<?php echo $specimen->received_at ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php echo display_form_error('received_at'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label">Comments</label>
        <div class="col-sm-3">
            <textarea class="form-control" name="comments" placeholder="Enter any comments about this specimen"><?php echo $specimen->comments; ?></textarea>
            <?php echo display_form_error('comments'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
    </div>
</form>