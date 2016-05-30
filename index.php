<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>chat box</title>
	<link rel="stylesheet" type="text/css" href="chat.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
		function submitChat()
		{
			if (form1.uname.value == '' || form1.msg.value == '') 
			{
				alert("all fields are mandatory!!!");
				return;
			}
			form1.uname.readyOnly = true;
			form1.uname.style.border = 'none';
			var uname = form1.uname.value;
			var msg = form1.msg.value;
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

		}
			$(document).ready(function(e){
			$.ajaxSetup({cache:false});
			

			setInterval(function(){$('#chatlogs').load('logs.php');},500);
		});

		
	</script>

</head>
<body>
<form name="form1">
	Enter your name:<input type="text" name="uname" style="width:200px;height:50px"/><br/>
	your message:<br/>
	<textarea name="msg" style="width:200px;height:100px"></textarea><br/>
	<input type="button" value="send" onclick="submitChat()"><br/><br/>
	<div id="chatlogs">
	loading chatlogs please wait......
		
	</div>
	
</form>
</body>
</html>