<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/global.css" media="screen" />
		<title>Welcome to CodeIgniter</title>
	</head>
	<body>
		<div id="container">
			<div id="body">
				<h1>Add New Member</h1>
				<div class="logout"><a href="<?php echo base_url();?>">Logout</a></div>
				<div id="content">
					<div class="info">User Name</div>
					<div class="colon">:</div>
					<input type="text" name="user_name" />
					<div style="clear: both"></div>
					<div class="info">Password</div>
					<div class="colon">:</div>
					<input type="password" name="pwd" />
					<div style="clear: both"></div>
					<div class="info">Re-Password</div>
					<div class="colon">:</div>
					<input type="password" name="re_pwd" />
					<div style="clear: both"></div>
					<input type="submit" value="Add" style="margin: 10px 0 0 236px !important;" />
				</div>
				<div class="log" style="display: none;">
					Member Add Successfull.
				</div>
			</div>
		
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</body>
</html>