<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/global.css" media="screen" />
        <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.6.4.min.js"></script>
		<title>Welcome to CodeIgniter</title>
	</head>
	<body>
		<div id="container">
			<div id="body">
				<h1>Authenticate Please</h1>
				<div id="content">
					<form method="post" action="<?php echo base_url();?>auth">
						<div class="info">User Name</div>
						<div class="colon">:</div>
						<input type="text" name="user_name" id="user_name" />
						<div style="clear: both"></div>
						<div class="info">Password</div>
						<div class="colon">:</div>
						<input type="password" name="pwd" />
						<div style="clear: both"></div>
						<input type="submit" value="Submit" />
					</form>
				</div>
			</div>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
<script language="javascript">
$(document).ready(function(){
	$("#user_name").focus();
});
</script>
	</body>
</html>