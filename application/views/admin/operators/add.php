<div class="page-header">
	<h1>Add Operator</h1>
	<p>Add a new operator to the system by filling the form below with the operator's details.</p>
</div>

<?php echo display_alert($this->session->flashdata('operator_error')); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
        <label for="level" class="col-sm-2 control-label">Level</label>
        <div class="col-sm-3">
        <?php echo form_dropdown('level', array(2 => 'Operator', 1 => 'Administrator'), set_value('level'), array('class' => 'form-control')); ?>
        <?php echo display_form_error('level'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter operator's name" value="<?php echo set_value('name'); ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>


    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="username" placeholder="Enter operator's name" value="<?php echo set_value('username'); ?>">
            <?php echo display_form_error('username'); ?>
        </div>
    </div>


    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="password" placeholder="Set operator's password">
            <?php echo display_form_error('password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Add</button>
        </div>
    </div>
</form>