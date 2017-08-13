<div class="page-header">
	<h1>Add Result to Test #<?php echo $test->id; ?></h1>
	<p>Add a new result to an existing test by filling the form below.</p>
</div>

<?php echo display_alerts('test'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="test_id" class="col-sm-2 control-label">Test ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="test_id" value="<?php echo $test->id; ?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter result's name" value="<?php echo set_value('name'); ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="type" class="col-sm-2 control-label">Result</label>
        <div class="col-sm-3">
            <?php echo form_dropdown('type', array('P' => 'Positive', 'N' => 'Negative', 'V' => 'Value'), set_value('type'), array('class' => 'form-control', 'id' => 'type')); ?>
            <?php echo display_form_error('type'); ?>
        </div>
    </div>

    <div id="result-value" style="display:none">
        <div class="form-group">
            <label for="units" class="col-sm-2 control-label">Units</label>
            <div class="col-sm-3">
                <?php echo form_dropdown('units', display_units(), set_value('units'), array('class' => 'form-control', 'id' => 'units', 'disabled' => 'true')); ?>
                <?php echo display_form_error('units'); ?>
            </div>
        </div>
            
        <div class="form-group">
            <label for="normal" class="col-sm-2 control-label">Normal</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="normal" name="normal" placeholder="Enter value if normal" value="<?php echo set_value('normal'); ?>" disabled="true">
                <?php echo display_form_error('normal'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="abnormal" class="col-sm-2 control-label">Abnormal</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="abnormal" name="abnormal" placeholder="Enter value if abnormal" value="<?php echo set_value('abnormal'); ?>" disabled="true">
                <?php echo display_form_error('abnormal'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="flag" class="col-sm-2 control-label">Flag</label>
            <div class="col-sm-3">
                <?php echo form_dropdown('flag', display_flags(), set_value('flag'), array('class' => 'form-control', 'id' => 'flag', 'disabled' => 'true')); ?>
                <?php echo display_form_error('flag'); ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Add</button>
        </div>
    </div>
</form>