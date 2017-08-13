<div class="page-header">
	<h1>Patients</h1>
	<p>Login using your name and passcode (received via SMS) to view your medical reports and results.</p>
</div>

<?php echo display_alerts('login'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group has-feedback">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Start typing your name..." value="<?php echo set_value('name'); ?>">
            <span class="form-control-feedback loading">
    			<?= img('img/loading.gif'); ?>
    		</span>
    		<div class="names"></div>
            <?php echo display_form_error('name'); ?>
        </div>
    </div>

    <div class="form-group">
        <label for="passcode" class="col-sm-2 control-label">Passcode</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="passcode" placeholder="Enter your passcode" value="<?php echo set_value('passcode'); ?>">
            <?php echo display_form_error('passcode'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </div>
</form>