<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	#container #authWrap .login label.uid,
	#container #authWrap .login label.pwd{
		width: 120px;
		display: inline-block;
	}
	#container #authWrap .login input[type="submit"]{
		margin-left: 230px;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 style="font-size: 30px; color: green;"><?php //for($i=0;$i<count($w_m); $i++) echo $w_m[$i]; echo "<br />"; for($i=0;$i<count($w_m2); $i++) echo $w_m2[$i]; ?></h1>
	<h1>R&D on CodeIgniter,Slim and Doctrine</h1>

	<div id="body">
		<div id="authWrap">
			<div class="login">
				<form method="post" action="<?php echo base_url()."index.php/welcome/addUserInfo";?>">
					<label class="uid">User Id: </label><label><input type="text" name="userId" value="" /></label><br />
					<label class="pwd">Password: </label><label><input type="password" name="userPwd" value="" /></label>
					<br />
					<input type="submit" value="Login" />
				</form>
			</div>
		</div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>