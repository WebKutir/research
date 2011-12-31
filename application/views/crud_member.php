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
						'file'				=> 'member_list'
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
					<form id="frm_data">
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
						<input type="password" name="re_pwd" id="re_pwd" />
						<div style="clear: both"></div>
					</form>
					<input type="submit" id="add" value="Add" style="margin: 10px 0 0 236px !important;" />
          <input type="submit" id="update" value="Update" style="display: none;" />
          <input type="button" id="cancel" value="Cancel" style="display: none;" />
				</div>
				<div class="log" style="display: none;"></div>
			</div>
<script language="javascript">
$(function(){  
  $("html").bind("ajaxStart", function(){  
     $(this).addClass('busy');  
   }).bind("ajaxStop", function(){  
     $(this).removeClass('busy');  
   });  
});

function clickFunction(_this, e){
	var self = $(document);
	var answer = confirm("Are you sure, you want to Delete this member?");
	if(answer==true){
		deleteMember(_this);
	}else{
		self.find("#user_name").val(_this.html());
		self.find("#down_header").html("Update this Member");
		self.find("#pwd").focus();
		self.find("#add").hide(0);
		self.find("#cancel").show(0);
		self.find("#update").show(0);
		_this.hide("slow");
	}
}

function deleteMember(_this){
	$.ajax({
		url: "<?php echo base_url();?>deletemember",
		dataType: "json",
		type: "POST",
		data: "user_name="+_this.html(),
		success: function(data){
			var self = $(document);
			if(data.result=="success"){
				self.find("#user_name").val("");
				self.find("#pwd").val("");
				self.find("#re_pwd").val("");
				self.find("#user_name").focus();
				self.find("#down_header").html("Add New Member");
				self.find("#add").show(0);
				self.find("#cancel").hide(0);
				self.find("#update").hide(0);
				self.find('.log').addClass('success_log').html('Data is Deleted Successfully.').slideDown(300).delay(3200).slideUp(300);
				_this.hide("slow");
			}else{
				self.find('.log').removeClass('success_log').html('Data is not Deleted. Please try later.').slideDown(300).delay(3200).slideUp(300);
			}
			self.find("#user_name").val("");
			self.find("#pwd").val("");
			self.find("#re_pwd").val("");
			self.find("#user_name").focus();
		},
		error: function(jqXHR, textStatus, errorThrown){
			alert(errorThrown);
		}
	});
}

$(document).ready(function(){
	var self = $(this);
	self.find("#user_name").focus();

	self.find(".members").click(function(e){
		clickFunction($(this), e);
	});

	self.find("#cancel").click(function(e){
		var existing_data = $("#member_list").html();
		self.find("#member_list").html("<div class='members'>"+self.find("#user_name").val()+"</div>"+existing_data);
		self.find(".members").bind('click',function(e){clickFunction($(this), e);});
		self.find("#user_name").val("");
		self.find("#pwd").val("");
		self.find("#re_pwd").val("");
		self.find("#user_name").focus();
		self.find("#down_header").html("Add New Member");
		self.find("#add").show(0);
		self.find("#cancel").hide(0);
		self.find("#update").hide(0);
	});

	self.find("#add").click(function(e){
		$.ajax({
			url: "<?php echo base_url();?>addmember",
			dataType: "json",
			type: "POST",
			data: self.find("#frm_data").serialize(),
			success: function(data){
				if(data.result=="success"){
					var existing_data = $("#member_list").html();
					self.find("#member_list").html("<div class='members'>"+self.find("#user_name").val()+"</div>"+existing_data);
					self.find(".members").bind('click',function(e){clickFunction($(this), e);});
					self.find('.log').addClass('success_log').html('Member Add Successfull.').slideDown(300).delay(3200).slideUp(300);
				}else{
					self.find('.log').removeClass('success_log').html('Data is not Added. Please try later.').slideDown(300).delay(3200).slideUp(300);
				}
				self.find("#user_name").val("");
				self.find("#pwd").val("");
				self.find("#re_pwd").val("");
				self.find("#user_name").focus();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(textStatus);
			}
		});
	});

	self.find("#update").click(function(e){
		$.ajax({
			url: "<?php echo base_url();?>editmember",
			dataType: "json",
			type: "POST",
			data: self.find("#frm_data").serialize(),
			success: function(data){
				if(data.result=="success"){
					var existing_data = $("#member_list").html();
					self.find("#member_list").html("<div class='members'>"+self.find("#user_name").val()+"</div>"+existing_data);
					self.find(".members").bind('click',function(e){clickFunction($(this), e);});
					self.find('.log').addClass('success_log').html('Member Edit Successfull.').slideDown(300).delay(3200).slideUp(300);
				}else{
					self.find('.log').removeClass('success_log').html('Data is not Edited. Please try later.').slideDown(300).delay(3200).slideUp(300);
				}
				self.find("#user_name").val("");
				self.find("#pwd").val("");
				self.find("#re_pwd").val("");
				self.find("#user_name").focus();
				self.find("#down_header").html("Add New Member");
				self.find("#add").show(0);
				self.find("#cancel").hide(0);
				self.find("#update").hide(0);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(textStatus);
			}
		});
	});
});
</script>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</body>
</html>