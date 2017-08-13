<div class="page-header">
	<h1>Update Patient</h1>
	<p>Update an existing patient's details by filling the form below with the updated details.</p>
</div>

<?php echo display_alerts('patient'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="name" placeholder="Enter patient's name" value="<?php echo $patient->name; ?>">
            <?php echo display_form_error('name'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="gender" class="col-sm-2 control-label">Gender</label>
        <div class="col-sm-3">
        <?php echo form_dropdown('gender', array('M' => 'Male', 'F' => 'Female'), $patient->gender, array('class' => 'form-control')); ?>
        <?php echo display_form_error('gender'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
        <div class="col-sm-3">
            <div class="input-group date" id="dob">
                <input type="text" class="form-control" name="dob" value="<?php echo $patient->dob; ?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <?php echo display_form_error('dob'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-3">
            <select id="countries_phone" name="country" class="form-control bfh-countries" data-country="<?php echo $patient->country; ?>"></select>
            <br>
            <input type="text" class="form-control bfh-phone" name="phone" data-country="countries_phone" value="<?php echo $patient->phone; ?>">
            <?php echo display_form_error('phone'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email Address</label>
        <div class="col-sm-3">
            <input type="email" class="form-control" name="email" placeholder="Enter patient's email" value="<?php echo $patient->email; ?>">
            <?php echo display_form_error('email'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="passcode" class="col-sm-2 control-label">Passcode</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="passcode" placeholder="Set patient's passcode" value="<?php echo $patient->passcode ?>">
            <?php echo display_form_error('passcode'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="medications" class="col-sm-2 control-label">Medications</label>
        <div class="col-sm-3">
            <textarea class="form-control" name="medications" placeholder="Enter any medications the patient is currently on"><?php echo $patient->medications ?></textarea>
            <?php echo display_form_error('medications'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Update</button>
        </div>
    </div>
</form>