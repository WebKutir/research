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
				<h1>Member List</h1>
				<div class="logout"><a href="<?php echo base_url();?>">Logout</a></div>
				<div id="member_list">
                	<?php 
					$data = array(
						'folder'			=> 'member',
						'file'				=> 'list'
					);
					foreach($this->data_model->getItem($data) as $member_name){ ?>
						<div class="members"><?=$member_name;?></div>
                    <?php } ?>
				</div>
			</div>
            <div style="clear: both"></div>
			<div id="body">
				<h1 id="down_header">Add New Member</h1>
				<div id="content">
					<div class="info">User Name</div>
					<div class="colon">:</div>
					<input type="text" name="user_name" id="user_name" />
					<div style="clear: both"></div>
					<div class="info">Password</div>
					<div class="colon">:</div>
					<input type="password" name="pwd" id="pwd" />
					<div style="clear: both"></div>
					<div class="info">Re-Password</div>
					<div class="colon">:</div>
					<input type="password" name="re_pwd" />
					<div style="clear: both"></div>
					<input type="submit" id="add" value="Add" style="margin: 10px 0 0 236px !important;" />
                    <input type="submit" id="update" value="Update" style="display: none;" />
				</div>
				<div class="log" style="display: none;">
					Member Add Successfull.
				</div>
			</div>
<script language="javascript">
$(document).ready(function(){
	$("#user_name").focus();
	$(".members").click(function(e){
		var answer = confirm("Are you sure, you want to Delete this member?");
		if(answer==true){
			$(this).hide("slow");
		}else{
			$("#user_name").val($(this).html());
			$("#down_header").html("Update this Member");
			$("#pwd").focus();
			$("#add").hide(0);
			$("#update").show(0);
		}
	});
});
</script>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</body>
</html>