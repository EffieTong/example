// JavaScript Document
var test = {
	newtest : function(){
		$ajax({
			type: 'POST',
			url : 'lib/usr_appr.php',
			data: {"msgId":temp, "message":msg} ,
			success: function(data){
				
			document.getElementById("myDiv").innerHTML=data;
			$("#myDiv").slideDown(1000, function(){
				$("#myDiv").fadeOut(5000);
			});
			}
		})
	}
	
	}