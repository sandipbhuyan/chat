<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>chat box</title>
	<link rel="stylesheet" type="text/css" href="chat.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		
		function htmlEntities(str) {
		    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
		}
		function submitChat()
		{
			if (form1.uname.value == '' || form1.msg.value == '') 
			{
				alert("all fields are mandatory!!!");
				return;
			}
			form1.uname.readyOnly = true;
			form1.uname.style.border = 'none';
			var uname = htmlEntities(form1.uname.value);
			var msg = htmlEntities(form1.msg.value);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readyState == 4 && xmlhttp.status ==200)
				{
					document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
			xmlhttp.send();
			form1.msg.value='';
			$("#uname").attr("disabled",true);

		}
			$(document).ready(function(e){
			$.ajaxSetup({cache:false});
			

			setInterval(function(){$('#chatlogs').load('logs.php');},500);
		});

		
	</script>


</head>
<body>
<img src="Joker-Wallpaper-35.jpg" style="height:100%;width:100%">
<div style="border:1px solid black">
	<form name="form1" class="chat">
		Enter your name:<br/><input type="text" name="uname" id="uname" style="width:200px;height:10px"/><br/>
		your message:<br/>
		<textarea name="msg" style="width:200px;height:50px"></textarea><br/>
		<input type="button" value="send" onclick="submitChat()" ><br/><br/>
		
			<div id="chatlogs" style="height:200px;width:500px;overflow-y:scroll;">
			loading chatlogs please wait......
			
			</div>

		
		
		
	</form>
</div>
</img>
</body>
</html>