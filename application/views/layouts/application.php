
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Pathology Lab</title>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<?php echo link_tag('css/screen.css'); ?>
		<?php echo link_tag('css/bootstrap-datetimepicker.css'); ?>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
  	<body>
	    <nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
				  	<a class="navbar-brand" href="/">Pathology Lab</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					
					<ul class="nav navbar-nav">
						<?php if (isLoggedIn() && isOperator()): ?>
						<?php echo nav_item('admin/reports', 'Reports', 'list'); ?>
						<?php echo nav_item('admin/patients', 'Patients', 'user'); ?>
						<?php if (isAdminOperator()): ?>
						<?php echo nav_item('admin/operators', 'Operators', 'cog'); ?>
						<?php endif ?>
						<?php elseif (isLoggedIn() && isPatient()):?>
						<?php echo nav_item('reports', 'My Reports', 'list'); ?>
						<?php endif ?>
					</ul>
					

					<ul class="nav navbar-nav navbar-right">
						<?php if (isLoggedIn()): ?>
						<?php echo nav_item('#', display_name(), 'user'); ?>
						<?php echo nav_item('auth/logout', 'Logout', 'log-out'); ?>
						<?php else: ?>
						<?php echo nav_item('auth/patient', 'Patients', 'log-in'); ?>
						<?php echo nav_item('auth/operator', 'Operators', 'log-in'); ?>
						<?php endif ?>
					</ul>
				</div>
	      	</div>
	    </nav>
	    
	    <div class="container">
	    	<?= $yield ?>
	    </div>

	    <script type="text/javascript">
		/* <![CDATA[ */
		var baseUrl = '<?= base_url(); ?>';
		/* ]]> */
		</script>
	   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url().'js/moment.js'; ?>"></script>
		<script src="<?php echo base_url().'js/bootstrap-datetimepicker.js'; ?>"></script>
		<script src="<?php echo base_url().'js/bootstrap-formhelpers.min.js'; ?>"></script>
		<script src="<?php echo base_url().'js/main.js'; ?>"></script>
	</body>
</html>