<div class="page-header">
	<h1>Update Operator</h1>
	<p>Update an existing operator's details by filling the form below with the updated details.</p>
</div>

<?php echo display_alert($this->session->flashdata('operator_error')); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
	<div class="form-group">
        <label for="level" class="col-sm-2 control-label">Level</label>
        <div class="col-sm-3">
        <?php echo form_dropdown('level', array(2 => 'Operator', 1 => 'Administrator'), $operator->level, array('class' => 'form-control')); ?>
        <?php echo display_form_error('level'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter operator's name" value="<?php echo $operator->name; ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>


    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="username" placeholder="Enter operator's name" value="<?php echo $operator->username; ?>">
            <?php echo display_form_error('username'); ?>
        </div>
    </div>


    <div class="form-group">
        <label for="new_password" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="new_password" placeholder="Leave blank to keep password">
            <?php echo display_form_error('new_password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
    </div>
</form>