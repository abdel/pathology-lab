<div class="page-header">
	<h1>Operators</h1>
	<p>Login to the operators area using your username and password to manage reports and patients.</p>
</div>

<?php echo display_alerts('login'); ?>

<?php echo form_open('', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="username" placeholder="Enter your username" value="<?php echo set_value('username'); ?>">
            <?php echo display_form_error('username'); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" name="password" placeholder="Enter your password">
            <?php echo display_form_error('password'); ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </div>
</form>